<?php

namespace App\Models;

use App\Models\Order;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    // protected $primaryKey = 'product_id';
    // public $incrementing = false;
    // protected $keyType = 'string';

    // protected $with = ['category_id'];
    protected $fillable = ['category_id','name','price'];

    public function category_id(): BelongsTo{
        return $this->belongsTo(Category::class);
    }
    public function orders(){
        return $this->belongsToMany(Order::class)
                    ->withPivot('name', 'price', 'qty')
                    ->withTimestamps();
    }

}
