<?php

namespace App\Models\Products;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Products\Image;
use App\Models\User;

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
        'image_id'
    ];


    public function image()
    {
        return $this->hasMany(Image::class, 'product_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
