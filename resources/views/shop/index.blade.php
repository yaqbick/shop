@extends('layouts.app')
@section('content')

<div class="container">
<?php
    // $products = ['a','b','c','d','e','f','g','h','i','j','k','l','m'];
    $row_length = 6;
?>
@foreach($products as $key => $val)
@if($key % $row_length==0)
<?php $new_row=$key ?>
<div class="row justify-content-md-center pt-4">
@endif
    <div class="col-md-2">
        <div class="card">
            <img class="card-img-top" src="{{$val['image']}}" alt="Card image cap">
            <!-- <div class="card-body">
                <h5 style="text-align:center" class="card-title">{{$val['name']}}</h5>
                    <p class="card-text"></p> 
            </div> -->
            <div class="card-footer">
                <small class="text-muted"><button class="btn btn-light">add to cart <i class="fas fa-shopping-cart"></i></button></small>
            </div>
        </div>
    </div>
@if($key == $new_row + $row_length -1 )
</div>
@endif
@endforeach
</div>
 