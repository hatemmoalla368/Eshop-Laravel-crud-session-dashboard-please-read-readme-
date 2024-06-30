<?php

namespace App\Models;

use App\Models\Order;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Orderline extends Model
{
    use HasFactory;

    protected $fillable=["qte", "price", "product_id", "order_id", "product_name"];
    public function Order(){
        return $this->belongsTo(Order::class);
    }
}
