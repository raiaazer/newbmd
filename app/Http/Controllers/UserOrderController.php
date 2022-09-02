<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserOrder;
use App\Models\RegistryOffice;
use App\Models\UserCart;
use Auth;



class UserOrderController extends Controller
{
    public function checkout(){
        $data = RegistryOffice::all();
        return view('theme.checkout', compact('data'));
    }

    // public function submit_details(Request $request)
    // {
    //     $request->validate([
    //         'bill_first_name' => 'required|max:100',
    //     ]);

    //     $cart = UserCart::where('user_id', Auth::id())->first();
    //     $det = new UserOrder();

    //     $det->certificate_orders_id = $cart->user_certificate_orders_id;
    //     $det->user_id = Auth::id();
    //     // $cer->transaction_id = $request->transaction_id;
    //     // $cer->payment_status = $request->payment_status;

    //     $det->bill_first_name = $request->bill_first_name;
    //     $det->bill_last_name = $request->bill_last_name;
    //     $det->bill_company = $request->bill_company;
    //     $det->bill_country = $request->bill_country;
    //     $det->bill_address = $request->bill_address;
    //     $det->bill_city = $request->bill_city;
    //     $det->bill_postcode = $request->bill_postcode;
    //     $det->bill_state = $request->bill_state;
    //     $det->bill_email = $request->bill_email;
    //     $det->bill_phone = $request->bill_phone;

    //     $det->ship_first_name = $request->ship_first_name;
    //     $det->ship_last_name = $request->ship_last_name;
    //     $det->ship_company = $request->ship_company;
    //     $det->ship_country = $request->ship_country;
    //     $det->ship_address = $request->ship_address;
    //     $det->ship_city = $request->ship_city;
    //     $det->ship_state = $request->ship_state;
    //     $det->ship_postcode = $request->ship_postcode;
    //     $det->ship_order_notes = $request->ship_order_notes;

    //     $det->save();
    //     return redirect()->back();
    // }
}
