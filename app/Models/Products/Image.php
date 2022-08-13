<?php

namespace App\Models\Products;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Image extends Model
{
    use HasFactory, SoftDeletes;

    protected $casts = ['imageColumnName' => 'array'];
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

    public function product()
    {
        return $this->belongsTo('App\Models\Products\Product', 'product_id');
    }
}
