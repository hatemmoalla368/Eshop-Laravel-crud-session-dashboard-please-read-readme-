<?php

namespace App\Models;

use App\Models\Orderline;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;

    protected $fillable=["date", "user_id", "validated", "user_name", "user_email", "user_tel", "user_adresse"];
    public function Orderline(){
        return $this->hasMany(Orderline::class);
    }
}
