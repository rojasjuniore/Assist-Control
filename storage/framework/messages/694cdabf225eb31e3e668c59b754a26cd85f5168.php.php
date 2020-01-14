<?php

namespace App\Http\Controllers;

use App\Creditos;
use App\Pricing;
use Illuminate\Foundation\Bus\DispatchesCommands;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Auth;

use PayPal\Rest\ApiContext;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\RedirectUrls;
use PayPal\Api\ExecutePayment;
use PayPal\Api\PaymentExecution;
use PayPal\Api\Transaction;

use App\Order;
use App\OrderItem;

class PaypalController extends BaseController
{
    private $_api_context;

    public function __construct()
    {
        // setup PayPal api context
        $paypal_conf = \Config::get('paypal');
        $this->_api_context = new ApiContext(new OAuthTokenCredential($paypal_conf['client_id'], $paypal_conf['secret']));
        $this->_api_context->setConfig($paypal_conf['settings']);
    }

    public function postPayment($pricing_id)
    {

        $pricing = Pricing::where('id','=',$pricing_id)->first();

        $payer = new Payer();
        $payer->setPaymentMethod('paypal');

        $quantity = 1;
        $price = $pricing->costo;
        $descripcion = $pricing->creditos.' Creditos';

        $items = array();
        $subtotal = 0;
        //$cart = \Session::get('cart');
        $currency = 'USD';

        $item = new Item();
        $item->setName($descripcion)
            ->setCurrency($currency)
            ->setDescription($descripcion)
            ->setQuantity($quantity)
            ->setPrice($price);

        $items[] = $item;
        $subtotal += $quantity * $price;

        $item_list = new ItemList();
        $item_list->setItems($items);

        $details = new Details();
        $details->setSubtotal($subtotal)
                ->setShipping(0);

        $total = $subtotal + 0;

        $amount = new Amount();
        $amount->setCurrency($currency)
                ->setTotal($total)
                ->setDetails($details);

        $transaction = new Transaction();
        $transaction->setAmount($amount)
            ->setItemList($item_list)
            ->setDescription($descripcion);

        $redirect_urls = new RedirectUrls();
        $redirect_urls->setReturnUrl(\URL::route('payment.status', $pricing_id))
                      ->setCancelUrl(\URL::route('payment.status', $pricing_id));

        $payment = new Payment();
        $payment->setIntent('Sale')
            ->setPayer($payer)
            ->setRedirectUrls($redirect_urls)
            ->setTransactions(array($transaction));

        try {
            $payment->create($this->_api_context);
        } catch (\PayPal\Exception\PPConnectionException $ex) {
            if (\Config::get('app.debug')) {
                echo "Exception: " . $ex->getMessage() . PHP_EOL;
                $err_data = json_decode($ex->getData(), true);
                exit;
            } else {
                die('Ups! Algo salió mal');
            }
        }

        foreach($payment->getLinks() as $link) {
            if($link->getRel() == 'approval_url') {
                $redirect_url = $link->getHref();
                break;
            }
        }

        // add payment ID to session
        \Session::put('paypal_payment_id', $payment->getId());

        if(isset($redirect_url)) {
            // redirect to paypal
            return \Redirect::away($redirect_url);
        }

        return \Redirect::route('creditos/create')
            ->with('message', 'Ups! Error desconocido.');

    }

    public function getPaymentStatus($pricing_id)
    {

        // Get the payment ID before session clear
        $payment_id = \Session::get('paypal_payment_id');

        // clear the session payment ID
        \Session::forget('paypal_payment_id');

        //$payerId = \Input::get('PayerID');
        $payerId = request()->PayerID;
        $token = request()->token;

        if (empty($payerId) || empty($token)) {
            return \Redirect::route('creditos/create')
                ->with('message', 'Hubo un problema al intentar pagar con Paypal');
        }

        $payment = Payment::get($payment_id, $this->_api_context);

        $execution = new PaymentExecution();
        $execution->setPayerId(request()->PayerID);

        $result = $payment->execute($execution, $this->_api_context);

        if ($result->getState() == 'approved') {

            $credito = Creditos::create([
                'cliente_id' => Auth::user()->id_cliente,
                'pricing_id' => $pricing_id,
                'cantidad' => intval($result->transactions[0]->description),
                'tipo' => 'Credito',
                'costo' => $result->transactions[0]->amount->total,
                'fecha' => date("Y-m-d"),
                'operacion' => $result->id,
                'json' => $result
            ]);

            return \Redirect::route('pagado', $credito->id)
                ->with('message', 'Compra realizada de forma correcta');
        }
        return \Redirect::route('pagado')
            ->with('message', 'La compra fue cancelada');
    }

    public function pagado($credito_id)
    {
        $credito = Creditos::where('id','=', $credito_id)->first();

        return view('creditos.pagado', compact('credito'));
    }
}