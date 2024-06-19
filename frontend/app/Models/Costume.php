<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Costume extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'price',
        'category',
        'size',
        'available',
        'rating',
        'image',
    ];

    public function shop() {
        return $this->hasOne('App\Models\Shop', 'id', 'shop_id');
    }
}
