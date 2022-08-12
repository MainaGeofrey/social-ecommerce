<?php

namespace App\Models\Products;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'image_url',
        'status',
        //'image_name',

        //'image_alt',
      //  'image_title',
       // 'image_description',
        //'image_keywords',
        //'image_status',

    ];

    public function Product()
    {
        return $this->belongsTo('App\Models\Products\Product', 'product_id');
    }
}
