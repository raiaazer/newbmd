<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Validator;
use URL;
use Session;
use Redirect;
use Input;
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
use App\Models\UserCertificateOrder;
// use App\Http\Controllers\UserCart;
use App\Models\UserCart;
use Auth;


class PayPalPaymentController extends Controller
{
    private $_api_context;

    public function __construct()
    {

        $paypal_configuration = \Config::get('paypal');
        $this->_api_context = new ApiContext(new OAuthTokenCredential($paypal_configuration['client_id'], $paypal_configuration['secret']));
        $this->_api_context->setConfig($paypal_configuration['settings']);
    }

    public function payWithPaypal()
    {
        return view('paywithpaypal');
    }

    public function postPaymentWithpaypal(Request $request)
    {
        $payer = new Payer();
        $payer->setPaymentMethod('paypal');

    	// $item_1 = new Item();

     //    $item_1->setName('Product 1')
     //        ->setCurrency('USD')
     //        ->setQuantity(1)
     //        ->setPrice($request->get('amount'));

     //    $item_list = new ItemList();
     //    $item_list->setItems(array());

        // $certificate = UserCertificateOrder::all();

        $user_cart = UserCart::where('user_id',Auth::id())->first();
        $ids = explode(',',$user_cart->user_certificate_orders_id);
        foreach($ids as $id)
        {
            $order = UserCertificateOrder::find($id);
        }
            $order_ids = explode(',',$user_cart->user_certificate_orders_id);
            $total = 0;
            foreach($order_ids as $order_id)
            {
            $certificate = \App\Models\UserCertificateOrder::find($order_id);
            $total += ($certificate->document_price * $certificate->document_quantity);
            }
        // dd($total);

        $amount = new Amount();
        $amount->setCurrency('USD')
            ->setTotal($total);

        $transaction = new Transaction();
        $transaction->setAmount($amount)
            // ->setItemList($item_list)
            ->setDescription('Enter Your transaction description');

        $redirect_urls = new RedirectUrls();
        $redirect_urls->setReturnUrl(URL::route('getPaymentStatus'))
            ->setCancelUrl(URL::route('getPaymentStatus'));

        $payment = new Payment();
        $payment->setIntent('Sale')
            ->setPayer($payer)
            ->setRedirectUrls($redirect_urls)
            ->setTransactions(array($transaction));
        try {
            $payment->create($this->_api_context);
        } catch (\PayPal\Exception\PPConnectionException $ex) {
            if (\Config::get('app.debug')) {
                \Session::put('error','Connection timeout');
                return Redirect::route('checkout');
            } else {
                \Session::put('error','Some error occur, sorry for inconvenient');
                return Redirect::route('checkout');
            }
        }

        foreach($payment->getLinks() as $link) {
            if($link->getRel() == 'approval_url') {
                $redirect_url = $link->getHref();
                break;
            }
        }

        Session::put('paypal_payment_id', $payment->getId());

        if(isset($redirect_url)) {
            return Redirect::away($redirect_url);
        }

        \Session::put('error','Unknown error occurred');
    	return Redirect::route('checkout');
    }

    public function getPaymentStatus(Request $request)
    {
        $payment_id = Session::get('paypal_payment_id');

        Session::forget('paypal_payment_id');
        if (empty($request->input('PayerID')) || empty($request->input('token'))) {
            \Session::put('error','Payment failed');
            return Redirect::route('checkout');
        }
        $payment = Payment::get($payment_id, $this->_api_context);
        $execution = new PaymentExecution();
        $execution->setPayerId($request->input('PayerID'));
        $result = $payment->execute($execution, $this->_api_context);

        if ($result->getState() == 'approved') {
            \Session::put('success','Payment success !!');
            return Redirect::route('checkout');
        }

        \Session::put('error','Payment failed !!');
		return Redirect::route('checkout');
    }
}
