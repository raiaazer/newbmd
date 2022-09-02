<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserOrder extends Model
{
    use HasFactory;

    public function reg_office()
    {
        return $this->hasOne(RegistryOffice::class,'id','registry_offices_id');
    }


    // public function shippingAddress(){
    //     return $this->belongsTo("App/Shipping", 'ShippingID', 'ShippingID');
    // }
}
