<?php

namespace App\Models\Products;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'products';
    protected $primaryKey = 'product_id';
    protected $fillable = [
        'product_name',
        'category_id',
        'product_short_description',
        'product_price',
        'product_discount',
        'product_color',
        'status',
    ];


    public function image()
    {
        return $this->hasMany('App\Models\Products\Image', 'product_id');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'id');
    }
}
