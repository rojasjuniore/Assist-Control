<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
/** Paypal Details classes **/
use PayPal\Rest\ApiContext;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\RedirectUrls;
use PayPal\Api\PaymentExecution;
use PayPal\Api\Transaction;
use PayPal\Exception\PayPalConnectionException;
use Stripe\Stripe;
use Stripe\Customer;
use Stripe\Charge;
use App\Transaccion;
use Auth;
use App\Pagodhl;
use App\PagoPromocion;
use App\Order;
use App\PromocionVar;


class PaymentController extends Controller
{
    private $api_context;
/** 
    ** We declare the Api context as above and initialize it in the contructor
    **/
    public function __construct()
    {
        $this->api_context = new ApiContext(
            new OAuthTokenCredential(config('paypal.client_id'), config('paypal.secret'))
        );
        $this->api_context->setConfig(config('paypal.settings'));
    }
/**
    ** This method sets up the paypal payment.
    **/
  
    public function createPayment(Request $request)
    {
        // Amount received as request is validated here.
        $request->validate(['amount' => 'required|numeric']);
        $pay_amount = $request->amount;
// We create the payer and set payment method, could be any of "credit_card", "bank", "paypal", "pay_upon_invoice", "carrier", "alternate_payment". 
        $payer = new Payer();
        $payer->setPaymentMethod('paypal');
// Create and setup items being paid for.. Could multiple items like: 'item1, item2 etc'.
        $item = new Item();
        $item->setName('Paypal Payment')->setCurrency('USD')->setQuantity(1)->setPrice($pay_amount);
// Create item list and set array of items for the item list.
        $itemList = new ItemList();
        $itemList->setItems(array($item));
// Create and setup the total amount.
        $amount = new Amount();
        $amount->setCurrency('USD')->setTotal($pay_amount);
// Create a transaction and amount and description.
        $transaction = new Transaction();
        $transaction->setAmount($amount)->setItemList($itemList)
        ->setDescription('Dhl paymente efecty');
        //You can set custom data with '->setCustom($data)' or put it in a session.
// Create a redirect urls, cancel url brings us back to current page, return url takes us to confirm payment.
        $redirect_urls = new RedirectUrls();
        $redirect_urls->setReturnUrl(route('confirm-payment'))
        ->setCancelUrl(url()->current());
// We set up the payment with the payer, urls and transactions.
        // Note: you can have different itemLists, then different transactions for it.
        $payment = new Payment();
        $payment->setIntent('Sale')->setPayer($payer)->setRedirectUrls($redirect_urls)
        ->setTransactions(array($transaction));
// Put the payment creation in try and catch in case of exceptions.
        try {
            $payment->create($this->api_context);
        } catch (PayPalConnectionException $ex){
            return back()->withError('Lo lamentamos, ocurrio un error.');
        } catch (Exception $ex) {
            return back()->withError('Lo lamentamos, ocurrio un error.');
        }
// We get 'approval_url' a paypal url to go to for payments.
        foreach($payment->getLinks() as $link) {
            if($link->getRel() == 'approval_url') {
                $redirect_url = $link->getHref();
                break;
            }
        }
// You can set a custom data in a session
        // $request->session()->put('key', 'value');;
// We redirect to paypal tp make payment
        if(isset($redirect_url)) {
            return redirect($redirect_url);
        }
// If we don't have redirect url, we have unknown error.
        return redirect()->back()->withError('Error inesperado');
    }

    public function createPaymentPromo(Request $request)
    {
       $pago = PagoPromocion::create([
                        'code_cliente' => Auth::user()->code_cliente,
                        'codigo' =>  $request->paymentID,
                        'monto' => $request->pMonto,
                        'metodo' => 'Paypal',
                        'promocion' => $request->ppromoId,
                        'estatus' => '0',
                ]);
               return redirect('/checkoutfinish')->withSuccess('Pago procesado exitosamente');
                        return $request;
    }
    public function pagoEnvioPromo(Request $request){

        $pago = Transaccion::create([
                'code_cliente' => Auth::user()->code_cliente,
                'codigo' =>  'PAGOPROMO-'.$request->promo,
                'monto' => $request->monto,
                'metodo' => 'Pago con Promoción',
        ]);
        $pago->save();
        $tr = $request->transaccion;
        $pagodhl = Pagodhl::where('id_transaccion', $tr)->get();
        foreach($pagodhl as $p){
                $p = Pagodhl::where('id', $p->id)->first();
                $p->fill([
                        'estatus' => 'aprobado',
                        'codigo' => 'PAGOPROMO-'.$request->promo,
                ]);
                $p->save();
        }

        $pagopromo = PagoPromocion::where('id', $request->promo)->first();
        $pagopromo->fill([
                'estatus' => '1',
            ]);
        $pagopromo->save();
        return redirect('/checkoutfinish')->withSuccess('Pago procesado exitosamente');    }
/**
    ** This method confirms if payment with paypal was processed successful and then execute the payment, 
    ** we have 'paymentId, PayerID and token' in query string.
    **/
    public function confirmPayment(Request $request)
    {
        // If query data not available... no payments was made.
        if (empty($request->query('paymentId')) || empty($request->query('PayerID')) || empty($request->query('token')))
            return redirect('/checkout')->withError('Pago no procesado.');
// We retrieve the payment from the paymentId.
        $payment = Payment::get($request->query('paymentId'), $this->api_context);
// We create a payment execution with the PayerId
        $execution = new PaymentExecution();
        $execution->setPayerId($request->query('PayerID'));
// Then we execute the payment.
        $result = $payment->execute($execution, $this->api_context);
// Get value store in array and verified data integrity
        // $value = $request->session()->pull('key', 'default');
// Check if payment is approved
        if ($result->getState() != 'approved'){
                return redirect('/checkoutfinish')->withError('Pago no procesado.');
        }else{
              
                $pago = Transaccion::create([
                        'code_cliente' => Auth::user()->code_cliente,
                        'codigo' =>  $result->id,
                        'monto' => $result->transactions[0]->amount->total,
                        'metodo' => 'Paypal',
                ]);
                $pago->save();
                $tr = session('transaccion');
                $pagodhl = Pagodhl::where('code_cliente', Auth::user()->code_cliente)->where('estatus', 'pendiente')->where('id_transaccion', $tr)->get();
                foreach($pagodhl as $p){
                        $p = Pagodhl::where('id', $p->id)->first();
                        $p->fill([
                                'estatus' => 'aprobado',
                                'codigo' => $result->id,
                        ]);
                        $p->save();
                }
                       
               
                return redirect('/checkoutfinish')->withSuccess('Pago procesado exitosamente');
        }
        
        }
        public function confirmPaymentPromo(Request $request)
    {
        
         $pago = PagoPromocion::create([
                        'code_cliente' => Auth::user()->code_cliente,
                        'codigo' =>  'temporal',
                        'monto' => $request->pMonto,
                        'metodo' => 'Paypal',
                        'promocion' => $request->ppromoId,
                ]);
                // return redirect('/checkoutfinish')->withSuccess('Pago procesado exitosamente');
                        return $request;
        
        }
        public function checkout($id){
                session(['transaccion' => $id]);
                $code = Auth::user()->code_cliente;
                $guias = '';
                $pagodhl = Pagodhl::where('code_cliente',Auth::user()->code_cliente)->where('id_transaccion', $id)->first();
                $lista = Pagodhl::where('code_cliente',Auth::user()->code_cliente)->where('id_transaccion', $pagodhl->id_transaccion)->get();     
                foreach ($lista as $key => $value) {
                    $guias = $guias.$value->id_orden.',';
                }
                $guias = substr($guias, 0, -1);
                $guias = explode(",", $guias);
                $promo = PagoPromocion::where('code_cliente',Auth::user()->code_cliente)->where('estatus', '0')->get();
                $guias = Order::whereIn('ware_reciept',$guias)->get();
                  
                return view('checkout-page', compact('pagodhl','guias','promo')); 
        }
        public function epayco(Request $request){
        $pago = Transaccion::create([
                'code_cliente' => $request->cliente,
                'codigo' =>  $request->referencia,
                'monto' => $request->monto,
                'metodo' => 'Epayco',
        ]);
        $pago->save();
        $tr = $request->transaccion;
        $pagodhl = Pagodhl::where('id_transaccion', $tr)->get();
        foreach($pagodhl as $p){
                $p = Pagodhl::where('id', $p->id)->first();
                $p->fill([
                        'estatus' => 'aprobado',
                        'codigo' => $request->referencia,
                ]);
                $p->save();
        }
               
        return response()->json($pagodhl);
        }
        public function epaycoPromo(Request $request){
                $pago = PagoPromocion::create([
                        'code_cliente' => $request->cliente,
                        'codigo' =>  $request->referencia,
                        'monto' => $request->monto,
                        'metodo' => 'Epayco',
                        'codigo' => $request->referencia,
                        'promocion' => $request->idpromo,
                        'estatus' => '0',
                ]);
        
                return response()->json($pago);
                }
        public function pagoStripe(Request $request , $amount){
                try{
                        $pago = Transaccion::create([
                                'code_cliente' => Auth::user()->code_cliente,
                                'codigo' =>  $_POST['stripeToken'],
                                'monto' => $request->amount,
                                'metodo' => 'Stripe',
                        ]);
                        Stripe::setApiKey(config('services.stripe.secret')); 
                        $customer = Customer::create(array(
                            'email' => $request->stripeEmail,
                            'source' => $request->stripeToken
                        ));
                        $charge = Charge::create(array(
                                'customer' => $customer->id,
                                'amount' => $amount, 
                                'currency' => 'usd'
                            ));
                        $tr = session('transaccion');
                        $pagodhl = Pagodhl::where('code_cliente', Auth::user()->code_cliente)->where('estatus', 'pendiente')->where('id_transaccion', $tr)->get();
                        foreach($pagodhl as $p){
                                $p = Pagodhl::where('id', $p->id)->first();
                                $p->fill([
                                        'estatus' => 'aprobado',
                                        'codigo' => $_POST['stripeToken'],
                                ]);
                                $p->save();
                        }
                            return redirect('/checkoutfinish');
                    }catch(\Exception $ex){
                        return $ex->getMessage();
                    }
        }
        public function pagoStripePromo(Request $request , $amount){
                try{    
                        $pago = Transaccion::create([
                                'code_cliente' => Auth::user()->code_cliente,
                                'codigo' =>  $_POST['stripeToken'],
                                'monto' => $request->amount,
                                'metodo' => 'Stripe',
                        ]);
                        $pago = PagoPromocion::create([
                                'code_cliente' => Auth::user()->code_cliente,
                                'codigo' =>  $_POST['stripeToken'],
                                'monto' => $request->sMonto,
                                'metodo' => 'Stripe',
                                'promocion' => $request->promoId,
                                'estatus' => '0',
                        ]);
                        Stripe::setApiKey(config('services.stripe.secret')); 
                        $customer = Customer::create(array(
                            'email' => $request->stripeEmail,
                            'source' => $request->stripeToken
                        ));
                        $charge = Charge::create(array(
                            'customer' => $customer->id,
                            'amount' => $amount, 
                            'currency' => 'usd'
                        )); 
                        return redirect('/checkoutfinish');
                        return $request;
                    }catch(\Exception $ex){
                        return $ex->getMessage();
                    }
        }
        
}