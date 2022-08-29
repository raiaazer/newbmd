<?php

namespace App\Http\Controllers;

use App\Models\DivorceDecreeOptional;
use DB;
use Auth;
use App\Models\RegistryOffice;
use App\Models\UserCart;
use App\Models\UserCertificateOrder;
use App\Models\User;
use Illuminate\Http\Request;



class CertificateController extends Controller
{
    public function type(){
        if(Auth::user()->certificate_type == 'birth') {
            return redirect('birth');
        }
        elseif (Auth::user()->certificate_type == 'marriage') {
            return redirect('marriage');
        }

        elseif (Auth::user()->certificate_type == 'death') {
            return redirect('death');
        }
        else{
            return redirect('divorce');
        }
    }

    public function detail(){
        $user_cart = UserCart::where('user_id',Auth::id())->first();
        $ids = explode(',',$user_cart->user_certificate_orders_id);
        foreach($ids as $id)
        {
            $order = UserCertificateOrder::find($id);
        }

        return view('theme.detail', compact('user_cart'));
    }

    public function birth(){
        $data = RegistryOffice::all();
        return view('theme.birth', compact('data'));
    }
    public function marriage(){
        $data = RegistryOffice::all();
        return view('theme.marriage', compact('data'));
    }
    public function death(){
        $data = RegistryOffice::all();
        return view('theme.death', compact('data'));
    }
    public function divorce(){
        return view('theme.divorce');
    }

    public function submit_form(Request $request)
    {

        $cer = new UserCertificateOrder();

        $cer->user_id = Auth::id();
        $cer->document_price = 79.00;
        $cer->registry_offices_id = $request->registry_offices_id;
        $cer->processing_speed = $request->processing_speed;
        $cer->digital_copy = $request->digital_copy;
        $cer->adopted_person = $request->adopted_person;
        $cer->document_legalize = $request->document_legalize;
        $cer->document_quantity = $request->document_quantity;
        $cer->age_at_death = $request->age_at_death;
        $cer->death_place = $request->death_place;
        $cer->deceased_occupation = $request->deceased_occupation;
        $cer->deceased_gender = $request->deceased_gender;
        $cer->d_o_death = $request->d_o_death;
        $cer->divorce_information = $request->divorce_information;
        $cer->court_name = $request->court_name;
        $cer->case_number = $request->case_number;
        $cer->certificate_type = $request->certificate_type;
        $cer->repondent_first_name = $request->repondent_first_name;
        $cer->repondent_last_name = $request->repondent_last_name;

        if($request->divorce_information != 'Court Name & Case Number')
            $cer->search_period = $request->search_period;

        $cer->birth_place = $request->birth_place;
        $cer->marital_status = $request->marital_status;

        $cer->d_o_b = $request->d_o_b;
        $cer->d_o_marriage = $request->d_o_marriage;
        $cer->marriage_place = $request->marriage_place;
        $cer->wife_first_name = $request->wife_first_name;
        $cer->wife_last_name = $request->wife_last_name;

        $cer->first_name = $request->first_name;
        $cer->last_name = $request->last_name;
        $cer->father_first_name = $request->father_first_name;
        $cer->father_last_name = $request->father_last_name;
        $cer->mother_first_name = $request->mother_first_name;
        $cer->mother_last_name = $request->mother_last_name;
        $cer->mother_maiden_name = $request->mother_maiden_name;
        $cer->save();

        if($request->certificate_type == 'divorce'){
            $dec = new DivorceDecreeOptional();
            $dec->user_certificate_order_id = $cer->id;
            $dec->court_filed = $request->court_filed;

            $dec->court_pronounced = $request->court_pronounced;
            $dec->d_o_marriage = $request->d_o_marriage;
            $dec->d_o_separation = $request->d_o_separation;
            $dec->d_o_decree_nisi = $request->d_o_decree_nisi;
            $dec->d_o_petition_filed = $request->d_o_petition_filed;
            $dec->save();
        }
        $cart = UserCart::where('user_id',Auth::id())->first();
        if($cart)
        {
            $cart->user_certificate_orders_id = $cart->user_certificate_orders_id.','.$cer->id;
            $cart->save();
        }else
        {
            $cart= new UserCart();
            $cart->user_id = Auth::id();
            $cart->user_certificate_orders_id = $cer->id;
            $cart->save();
        }
        return redirect()->route('detail');
        // dd($request->all());
    }

    public function delete_form($id)
    {
        $cart = UserCart::where('user_id',Auth::id())->whereRaw('FIND_IN_SET('.$id.',user_certificate_orders_id)')->first();
        if($cart)
        {
            $order_id = $cart->user_certificate_orders_id;
            $order_id = str_replace($id, '', $order_id);
            $order_id = explode(',', $order_id);
            $order_id = array_filter($order_id);
            $order_id = array_values($order_id);
            if(empty($order_id))
            {
                UserCart::where('id', $cart->id)->delete();
            }else{
                UserCart::where('id', $cart->id)->update(['user_certificate_orders_id'=>implode(',',$order_id)]);
            }
            return redirect()->back();
            // dd($order_id);
        }
    }

    public function account(){
        return view('theme.layouts.account-layout');
    }

    public function update_cart(Request $request){
        for($i = 0; $i < count($request->quantity); $i++)
        {
            // $update_cart = UserCertificateOrder::whereId('id',$request->id[$i])->update(array('document_quantity'=>$request->quantity[$i]));

            $update_cart = UserCertificateOrder::where('id',$request->id[$i])->update(['document_quantity'=>$request->quantity[$i]]);
            // dump($request->quantity[$i]);
            // dump($request->id[$i]);

        }
        return redirect()->back();






        // $request->document_quantity = $update_cart->document_quantity;
        // UserCertificateOrder::update($request->document_quantity);

    //     if($request->id && $request->document_quantity){
    //         $cart = session()->get('cart');
    //         $cart[$request->id]["document_quantity"] = $request->document_quantity;
    //         session()->put('cart', $cart);
    //         session()->flash('success', 'Cart updated successfully');
    //     }
    }

}
