@extends('layouts.app')
@section('content')

<!-- <div class="container"> -->
<?php
    // $products = ['a','b','c','d','e','f','g','h','i','j','k','l','m'];
    $row_length = 6;
?>

@foreach($products as $key => $val)
@if($key % $row_length==0)
<?php $new_row = $key; ?>
<div class="row justify-content-md-center pt-4">
@else
<?php $new_row = 0; ?>
@endif
    <div class="col-md-2">
        <div class="card">
            <img class="card-img-top" src="{{$val['cover']}}" alt="Card image cap">
            <div class="card-body">
              
                    <p class="card-text">{{$val['title']}}</p><b>{{$val['price']}} zł</b>
            </div>
            <div class="card-footer">
                <form action="/" method="POST">
                @csrf
                <input type="hidden" name="productID" value="{{$val['id']}}">
                <small class="text-muted"><button class="btn btn-light" type="submit">add to cart <i class="fas fa-shopping-cart"></i></button></small>
                </form>
            </div>
        </div>
    </div>
@if($key == $new_row + $row_length -1 )
</div>
@endif
@endforeach
</div>
@endsection
 