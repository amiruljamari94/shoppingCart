<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'user_id',
        'product_id',
        'product_name',
        'product_price',
        'status',
        'batch',
        'name', 
        'email',
        'address',
        'country',
        'state',
        'postcode'
    ];

    public function userFK()
    {
        return $this->belongsTo('App\User', 'user_id');    
    }

    public function productFK()
    {
        return $this->belongsTo('App\Product', 'product_id');    
    }
}
