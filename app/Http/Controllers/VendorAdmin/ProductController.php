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
use Illuminate\Support\Str;

class ProductController extends Controller
{
    //
    public function index()
    {
      $products = Product::get();
      //get all products images


        return view('pages.vendoradmin.products.index', compact('products'));
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
    //  $generated_file_name = time() . '.' . $request->images->getClientOriginalExtension();
      if($request->file('images')){
       // dd($request->file('images'));

        foreach($request->file('images') as $image){
          $image_name = Str::lower(
            pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME) . '-' . uniqid() . '.' . $image->getClientOriginalExtension()
            );
          $image->move(public_path('images/products'), $image_name);
          $path = public_path('images/products/' . $image_name);
          $image = Image::create([
            'product_id' => $product->product_id,
            'image_url' => $path,
            'status' => 1,
          ]);
          $image->save();
        }

      }



        return redirect()->route('vendor.products.index');
    }

    public function show($id)
    {
      $product_id = $id;
      $product = Product::with('image')->find($product_id);
     // dd($product);
      $image = Image::where('product_id', $product_id)->get();
     // dd($image);
      return view('pages.vendoradmin.products.show', compact('product', 'image'));
    }
    public function edit($id)
    {
        $product = Product::find($id);
        return view('pages.vendoradmin.products.edit', compact('product'));
    }


    //soft delete
    public function destroy($id)
    {
        $product = Product::find($id);
       $product->delete();
       //delete all images related to product
        $images = Image::where('product_id', $id)->get();
        foreach($images as $image){
          $image->delete();
        }
        return redirect()->route('vendor.products.index');
    }

  }


