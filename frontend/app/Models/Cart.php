<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    public function user() {
        return $this->hasOne('App\Models\User', 'id', 'user_id');
    }
    public function costume() {
        return $this->hasOne('App\Models\Costume', 'id', 'costume_id');
    }
    public function shop() {
        return $this->hasOne('App\Models\Shop', 'id', 'shop_id');
    }
}
