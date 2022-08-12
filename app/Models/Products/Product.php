<?php

namespace App\Models\Products;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';
    protected $fillable = [
        'product_name',
        'category_id',
        'product_short_description',
        'product_price',
        'product_discount',
        'product_color',
        'status',
    ];


    public function Image()
    {
        return $this->hasMany('App\Models\Products\Image', 'product_id');
    }

    public function User()
    {
        return $this->belongsTo('App\Models\Users\User', 'user_id');
    }
}
