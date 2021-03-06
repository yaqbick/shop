@extends('layouts.panel')
@section('content')

@if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
@endif

@if (\Session::has('success'))
      <div class="alert alert-success">
          <p>{{ \Session::get('success') }}</p>
      </div><br />
@endif

<div class="container">
<div class="row">
    <h2> Edit Product</h2>
</div>
<form method="post" action="{{ route('products.update', $product->id) }}"  enctype="multipart/form-data">
@method('PUT')
{{csrf_field()}}
    <div class="row">
        <div class="col-6 col-md-4">
            <div class="form-group">
                <label for="title">Name:</label>
                <input type="text" class="form-control" id="product_name" name="product_name" value="{{$product->name}}">
            </div>
        </div>
        <div class="col-6 col-md-4">                
            <label for="title">SKU:</label>
            <input type="text" class="form-control" id="product_sku" name="product_sku"  value="{{$product->SKU}}">
        </div>
        <div class="col-6 col-md-4">
            <label for="title">Image:</label>
            <input type="file" name="product_image" class="form-control"  value="{{$product->image}}">
        </div>
    </div>
    <div class="row">
        <div class="col-6 col-md-4">                
            <label for="body">Short description:</label>
            <textarea name="product_short_description" id="product_short_description" class="form-control" rows="8"  value="{{$product->short_description}}"></textarea>
        </div>
        <div class="col-6 col-md-4">
            <label for="title">Price:</label>
            <input type="text" class="form-control" id="product_price" name="product_price"  value="{{$product->price}}">
            <label for="title">Discount price:</label>
            <input type="text" class="form-control" id="product_discount_price" name="product_discount_price"  value="{{$product->discount_price}}">
            <label for="title">Weight:</label>
            <input type="text" class="form-control" id="product_weight" name="product_weight"  value="{{$product->weight}}">
        </div>
        <div class="col-6 col-md-4">
            <label for="exampleFormControlSelect1">Tax</label>
            <select class="form-control" id="product_tax" name="product_tax" >
                <option>no tax</option>
                <option>8% VAT</option>
                <option>23% VAT</option>
            </select>
            <label for="title">QTY:</label>
            <input type="text" class="form-control" id="product_qty" name="product_qty"  value="{{$product->qty}}">
            <div class="form-check pt-5">
                <input class="form-check-input" type="checkbox" value="" id="is_product_purchasable" name="is_product_purchasable">
                <label class="form-check-label" for="is_product_purchasable">Is product purchasable?</label>
            </div>
           
        
        </div>
    </div>
    <div class="row">
        <div class="col-6 col-md-4">
            <label for="body">Description:</label>
            <textarea name="product_description" id="product_description" class="form-control" rows="8"  value="{{$product->description}}"></textarea>
        </div>
        <div class="col-6 col-md-4">
            <label for="title">Height:</label>
            <input type="text" class="form-control" id="product_height" name="product_height"  value="{{$product->height}}">
            <label for="title">Length:</label>
            <input type="text" class="form-control" id="product_lenght" name="product_length"  value="{{$product->length}}">
            <label for="title">Width:</label>
            <input type="text" class="form-control" id="product_width" name="product_width"  value="{{$product->width}}"> 
        </div>
        <div class="col-6 col-md-4">Categories
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="defaultCheck2" >
                <label class="form-check-label" for="defaultCheck2">   Fantasy</lavel>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="defaultCheck2" >
                <label class="form-check-label" for="defaultCheck2">   Criminal</lavel>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="defaultCheck2" >
                <label class="form-check-label" for="defaultCheck2">   Adventure</lavel>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-6 col-md-4">
            <button type="submit" class="btn btn-success">update</button>
        </div>
    </div>
    </form>
  </div>

@endsection