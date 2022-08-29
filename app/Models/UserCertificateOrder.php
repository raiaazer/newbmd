<?php

namespace App\Models;
use App\Models\DivorceDecreeOptional;
use App\Models\RegistryOffice;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserCertificateOrder extends Model
{
    use HasFactory;
    public function decree_optional()
    {
        return $this->hasOne(DivorceDecreeOptional::class,'user_certificate_order_id');
    }
    public function reg_office()
    {
        return $this->hasOne(RegistryOffice::class,'id','registry_offices_id');
    }
}
