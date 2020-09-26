@extends('layouts.app')
@section('content')
@if($cartItems && $cart)
<table class="table table-striped">
    <thead>
      <tr>
        <th>Image</th>
        <th>Title</th>
        <th>Price</th>
        <th>Quantity</th>
        <th>Totals</th>
        <th colspan="2">Action</th>
      </tr>
    </thead>
    <tbody>

@foreach($cartItems as $key => $obj)
<tr>
<td><img src="{{$obj->getItem()->cover}}" width="70" height="100"></td>
<td>{{$obj->getItem()->title}}</td>
<td>{{$obj->getItem()->price}}</td>
<td>
    <div class="row">
        <div class="pr-2">
            <form action="{{action('CartController@remove')}}" method="post">
            @csrf
                <input type="hidden" name="productID" value="{{$obj->getID()}}">
                <button type="submit">-</button>
            </form>
        </div>
        {{ $obj->getAmount()}}
        <div class="pl-2"> 
            <form action="{{action('CartController@add')}}" method="post">
            @csrf
                <input type="hidden" name="productID" value="{{$obj->getID()}}">
                <button type="submit">+</button>
            </form>
        </div>
    </div>
</td>
<td>{{$obj->getTotals()}}</td>
<td>
<form action="{{action('CartController@destroy', $obj->getID())}}" method="post">
@csrf
<input name="_method" type="hidden" value="DELETE">
<button class="btn btn-danger" type="submit">Delete</button>
</form>
</td>
</tr>
@endforeach
</tbody>
</table>
<div class="row">
  <div class="col-6 col-md-4">
    <div class="form-group">
      <div class="card" style="width: 18rem;">
        <div class="card-body">
          <h5 class="card-title">TOTALS</h5>
          <p class="card-text">{{$cart->getTotals()}}</p>
        </div>
      </div>
    </div>
  </div>
  <div class="col-6 col-md-4">
    <div class="form-group">
      <form method="post" action="{{url('order')}}">
      {{csrf_field()}}
        <button type="submit" class="btn btn-success" style="margin-left:38px">Przejdź do płatności</button>
      </form>
    </div>
  </div>

    @else
    <p>Twój koszyk jest pusty</p>
    @endif
    </div>
    </div>

@endsection