<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order_item extends Model
{    protected $table='order_item';

    protected $fillable=[
        'orders_id',
        'product_id',
        'qty'
    ];
    use HasFactory;
    public function product(){
        return $this->belongsTo(Product::class);
    }

}
