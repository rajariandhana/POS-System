<?php

namespace App\Models;

use App\Models\Product;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = [
        'id','cost','user_id'
    ];
    protected static function boot(){
        parent::boot();

        static::creating(function ($model) {
            if (empty($model->id)) {
                $model->id = (string) Str::uuid();
            }
        });
    }
    // public function products(){
    //     return $this->belongsToMany(Product::class, 'order_product', 'order_id', 'product_id')
    //                 ->withPivot('name','qty', 'price')
    //                 ->withTimestamps();
    // }
    public function orderProducts(){
        return $this->hasMany(OrderProduct::class, 'order_id');
    }
}
