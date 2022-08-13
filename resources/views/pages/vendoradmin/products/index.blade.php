@extends('layouts/contentNavbarLayout')

@section('title', 'Tables - Basic Tables')

@section('content')
<div class="container" >




  <div class="row">
    <div class="col-10">
      <h4 class="fw-bold py-3 mb-4">
        <span class="text-muted fw-light">Products /</span> My Products<!--change my products to categorie bane-->
      </h4>
    </div>
    <div class="col-2">
      <a href="{{ route('vendor.products.create') }}" class="btn btn-primary " tabindex="-1" role="button" aria-disabled="true">Add Product</a>

    </div>
  </div>

</div>


<!-- Basic Bootstrap Table -->
<div class="card">
  <h5 class="card-header">All Products</h5>
  <div class="table-responsive text-nowrap">
    <table class="table">
      <thead>
        <tr>
          <th>Name</th>
          <th>Price</th>
          <th>Color</th>
          <th>Status</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody class="table-border-bottom-0">

        @foreach($products as $product)
        <tr>
          <td>{{ $product->product_name }}</td>
          <td>{{ $product->product_price }}</td>
          <td>{{ $product->product_price}}</td>
          <td>{{ $product->product_color}}</td>
          <td>{{ $product->status }}</td>
          <td>
            <a href="{{ route('vendor.products.show', $product->product_id) }}" class="btn btn-primary btn-sm">Show</a>
            <form action="{{ route('vendor.products.destroy', $product->product_id) }}" method="POST" class="d-inline">
              @csrf
              @method('DELETE')
              <button type="submit" class="btn btn-danger btn-sm">Delete</button>
            </form>
          </td>
        </tr>
        @endforeach


       <!-- <tr>
          <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>Angular Project</strong></td>
          <td>Albert Cook</td>
          <td>
            <ul class="list-unstyled users-list m-0 avatar-group d-flex align-items-center">
              <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" class="avatar avatar-xs pull-up" title="Lilian Fuller">
                <img src="{{asset('assets/img/avatars/5.png')}}" alt="Avatar" class="rounded-circle">
              </li>
              <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" class="avatar avatar-xs pull-up" title="Sophia Wilkerson">
                <img src="{{asset('assets/img/avatars/6.png')}}" alt="Avatar" class="rounded-circle">
              </li>
              <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" class="avatar avatar-xs pull-up" title="Christina Parker">
                <img src="{{asset('assets/img/avatars/7.png')}}" alt="Avatar" class="rounded-circle">
              </li>
            </ul>
          </td>
          <td><span class="badge bg-label-primary me-1">Active</span></td>
          <td>
            <div class="dropdown">
              <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
              <div class="dropdown-menu">
                <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-edit-alt me-1"></i> Edit</a>
                <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-trash me-1"></i> Delete</a>
              </div>
            </div>
          </td>
        </tr>-->

      </tbody>
    </table>
  </div>
</div>
<!--/ Basic Bootstrap Table -->
@endsection
