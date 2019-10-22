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
    public function pago(Request $request)
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
        try{
                Stripe::setApiKey(config('services.stripe.secret'));
                \Stripe\InvoiceItem::create([
                    'customer' =>Auth::user()->customer_stripe,
                    'amount' => 1,
                    'currency' => 'usd',
                    'description' => 'prueba cobros',
                ]);
                
                $invoice = \Stripe\Invoice::create([
                    'customer' => Auth::user()->customer_stripe,
                    'billing' => 'send_invoice',
                    'days_until_due' => 30,
                    'auto_advance' => true, 
                ]);
                $invoice->sendInvoice(); 

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
}
