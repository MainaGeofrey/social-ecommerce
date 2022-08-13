@php
$isNavbar = false;
@endphp


@extends('layouts/contentNavbarLayout')

@section('title', ' Vertical Layouts - Forms')

@section('page-style')
<!-- Page -->
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
 <link rel="stylesheet"  href="{{ asset('assets/css/style.css') }}" />

@endsection

@section('content')
<h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Products/</span> New Product</h4>

<!-- Basic Layout -->
<form action="{{ route('vendor.products.store') }}" method="POST" enctype="multipart/form-data">
  @csrf

<div class="row">
  <div class="col-xl  ">

    <!--   <div class="card mb-4 ">-->
    <div class="mb-4 ">
      <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Product Details</h5> <small class="text-muted float-end">Default label</small>
      </div>


      <div class="card-body">
          <div class="mb-3">
            <label class="form-label" for="basic-default-fullname">Product Name</label>
            <input type="text" class="form-control" id="basic-default-fullname" name="product_name" placeholder="" required />
          </div>
          <div class="mb-3">
            <label class="form-label" for="basic-default-company">Categories </label>
            <input type="text" class="form-control" id="basic-default-company" placeholder=""  required/>
            <div class="form-text"> Select all categories that yor product fits </div>
          </div>


          <div class="mb-3 row">
            <label for="html5-number-input" class="col-md-2 col-form-label">Price</label>
            <div class="col-md-10">
              <input class="form-control" type="number" value="" id="html5-number-input"min="0.00"  name="product_price" step="0.01" required />
            </div>
          </div>

          <div class="mb-3">
            <label class="form-label" for="basic-default-description">Short Description</label>
            <textarea id="product_short_description" name="product_short_description" required class="form-control" placeholder="Give the best description about yor product"></textarea>
          </div>

          <div class="mb-3">
            <label for="formFileMultiple" class="form-label">Upload Images</label>
            <input class="form-control" type="file" name="images[]" id="formFileMultiple" multiple>
          </div>

      </div>

    </div>

  </div>
  <div class="col-xl">

        <!--   <div class="card mb-4 ">-->
    <div class=" mb-4">
      <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Product Images </h5>
        <small class="text-muted float-end">Preview Uploaded Images</small>
      </div>
      <div class="card-body">

        <br><div class="container">
          <div class="row">
          <div class=" imgUp">
            <div class="imagePreview"></div>
              <label class="btn btn-primary">
                Upload<input type="file"  class="uploadFile img" value="Upload Photo" style="width: 0px;height: 0px;overflow: hidden;">
              </label>
          </div><!-- col-2 -->
          <i class="fa fa-plus imgAdd"></i>
         </div><!-- row -->
        </div><!-- container -->



      </div>
    </div>
  </div>
</div>
<button type="submit" class="btn btn-primary">Send</button>
</form>





@endsection
