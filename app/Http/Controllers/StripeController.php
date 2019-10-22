<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\Customer;
use Stripe\Charge;
use App\User;
use Auth;
use App\FacturacionHistorial;


class StripeController extends Controller
{
    public function pago(Request $request)  //Se implementa para el primer pago, el cual es de "prueba" y se utiliza unicamente para obtener la información de usuario
    {
        try{
            Stripe::setApiKey(config('services.stripe.secret')); 
            $customer = Customer::create(array(
                'email' => $request->stripeEmail,
                'source' => $request->stripeToken
            ));
            $charge = Charge::create(array(
                    'customer' => $customer->id,
                    'amount' => 500, 
                    'currency' => 'usd'
                )); 
        
           $user = User::where('code_cliente',Auth::user()->code_cliente)->first();
           $user->fill([
               'customer_stripe' => $customer->id,
           ]);
           $user->save();

          $historial = FacturacionHistorial::create([
              'code_cliente' => Auth::user()->code_cliente,
              'metodo' => 'Stripe',
              'monto' => '0,50', 
              'fecha' => date("Y-m-d H:i:s"),
              'descripcion' => 'Configuración de pago', 
          ]);
   
            return 'Configuración realizada con exito';
        }catch(\Exception $ex){
            return $ex->getMessage();
        }

    }
    public function cobro(){
        try{   //Se carga toda la información del usuario y el monto que se cobrara en la factura
                Stripe::setApiKey(config('services.stripe.secret'));
                \Stripe\InvoiceItem::create([
                    'customer' =>Auth::user()->customer_stripe,
                    'amount' => 1,
                    'currency' => 'usd',
                    'description' => 'prueba cobros',
                ]);
                //factura o cobro automatico, este es el metodo que debe ser configurado para los cobros automaticos, luego de tener la información del cliente almacenada
                $invoice = \Stripe\Invoice::create([
                    'customer' => Auth::user()->customer_stripe,
                    'billing' => 'send_invoice',
                    'days_until_due' => 30,
                    'auto_advance' => true, 
                ]);
                $invoice->sendInvoice(); 
                    //Historial de cobros que se guarda en la bd local
                $historial = FacturacionHistorial::create([
                    'code_cliente' => Auth::user()->code_cliente,
                    'metodo' => 'Stripe',
                    'monto' => '0,50', // Aqui se debe insertar el valor de la factura.
                    'fecha' => date("Y-m-d H:i:s"),
                    'descripcion' => 'Pago factura', // Aqui se debe insertar la descripción del pago.
                ]);
                return 'Cobro exitoso';
            }catch(\Exception $ex){
                return $ex->getMessage();
            }

    }

    public function cobroEfecty(Request $request){

        /*
         * $request = array(
         *      'customer'=>'value',
         *      '""'=>'code',
         *      'amount'=>decimal(10,2),
         *      'description'=>varchar(250)
         *      'source'=>'efecty'
         * )
         */

        // Se hardcodeo el token, ya que se desconoce si existe un middleware o un auth2 algo parecido,
        // De no existir podemos trabajar en ellos
        // Validation TOKEN: 380dd575c399a491c78dc1704f03cc9b55c4b353 (sha1(efectyyii))

        $TOKEN = "380dd575c399a491c78dc1704f03cc9b55c4b353";
        if($TOKEN != $request->header('Token')){
            return response('Unauthenticated.', 401);
        }

        try{
            Stripe::setApiKey(config('services.stripe.secret'));
            \Stripe\InvoiceItem::create([
                'customer' =>$request->customer,
                'amount' =>$request->amount,
                'currency' => 'usd',
                'description' => $request->description,
            ]);

            $invoice = \Stripe\Invoice::create([
                'customer' => $request->customer,
                'billing' => 'send_invoice',
                'days_until_due' => 30,
                'auto_advance' => true,
            ]);
            $invoice->sendInvoice();

            $historial = FacturacionHistorial::create([
                'code_cliente' => $request->code_cliente,
                'metodo' => 'Stripe',
                'monto' => $request->amount, // Aqui se debe insertar el valor de la factura.
                'fecha' => date("Y-m-d H:i:s"),
                'descripcion' => $request->description, // Aqui se debe insertar la descripción del pago.
                'source' => $request->source, // Aqui se debe insertar la descripción del pago.
            ]);
            return response('ok', 200);
        }catch(\Exception $ex){
            return response($ex->getMessage(), 400);
        }

    }
}
