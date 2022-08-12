<?php

namespace App\Http\Controllers\VendorAdmin;

use App\Http\Controllers\Controller;
use App\Services\ProductService;
use App\Http\Requests\Products\StoreProductRequest;
use App\Services\ImageService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Products\Product;
use App\Models\Products\Image;

class ProductController extends Controller
{
    //
    public function index()
    {
        return view('pages.vendoradmin.products.index');
    }

    public function create()
    {

        return view('pages.vendoradmin.products.create');
    }

    public function store(Request $request)
    {
     // dd($request);

      Validator::make($request->all(), [
        'product_name' => 'required',
        'category_id' => 'required',
        'product_short_description' => 'required',
        'product_price' => 'required',
        //'product_discount' => 'required',
        //'product_color' => 'required',
        //'status' => 'required',
        'images' => 'required',
      ]);
     // dd($request->all());

      $product = Product::create([
        'product_name' => $request->product_name,
        'category_id' => 11,
        'product_short_description' => $request->product_short_description,
        'product_price' => $request->product_price,
        'product_discount' => 33,
        'product_color' => 'red',
        'status' => 111,
      ]);
      $product->save();
     // dd($product);
      $generated_file_name = time() . '.' . $request->images->getClientOriginalExtension();
      if($request->file('images')){
       // dd($request->file('images'));
       $request->images->move(public_path('images'), $generated_file_name);
       $path = public_path('images/' . $generated_file_name);
       $image = Image::create([
        'product_id' => $product->id,
        'image_url' =>$path,
        ]);

      }



        return redirect()->route('vendor.products.index');
    }
  }


