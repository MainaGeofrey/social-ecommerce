<?php
namespace App\Services;


use App\Models\Products\Image;


class ImageService
{
    public function createImage($image, $product)
    {

      $generated_file_name = time() . '.' . $image->getClientOriginalExtension();
        $image = Image::create([
            'image_name' => $image->getClientOriginalName(),
           // 'generated_file_name' => time() . '.' . $image->getClientOriginalExtension(),
            'image_url' => $image->store('public/products',$generated_file_name),
            'product_id' => $product->id,
        ]);

        return $image;
    }
}



