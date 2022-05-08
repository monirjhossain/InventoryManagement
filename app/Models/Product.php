<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'category_id',
        'brand_id',
        'name',
        'sku',
        'image',
        'cost_price',
        'retail_price',
        'year',
        'description',
    ];
    //Const
    public const STATUS_ACTIVE = 1;
    public const STATUS_INACTIVE = 2;

    public function user(){
        return $this->belongsTo(User::class, 'user_id','id'); //user_id
    }

    public function category()
    {
        return $this->belongsTo(Category::class,'category_id','id'); //category_id
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class, 'brand_id','id'); //brand_id
    }
}
