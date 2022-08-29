<?php

namespace App\Models;

use App\Models\UserCertificateOrder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserCart extends Model
{
    use HasFactory;

    public function usercart()
    {
        return $this->belongsTo(\App\UserCertificateOrders::class, 'user_certificate_orders_id', 'id');
    }
}
