@extends('layouts.app')
@section('content')
<div class="container">
    <br />
    @if (\Session::has('success'))
      <div class="alert alert-success">
        <p>{{ \Session::get('success') }}</p>
      </div><br />
     @endif
     <h1>Moje zamówienia</h1>
    <table class="table table-striped">
    <thead>
      <tr>
        <th>ID</th>
        <th>Totals</th>
        <th>Date</th>
        <th colspan="2">Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach($orders as $order)
      <tr>
        <td><a href='/orders/'.{{$order['id']}}.'/odrerItems'.> {{$order['id']}}</td>
        <td>{{$order['totals']}}</td>
        <td>{{$order['created_at']}}</td>
        <td><a href="{{action('OrderController@edit', $order['id'])}}" class="btn btn-warning">Edit</a></td>
        <td>
          <form action="{{action('OrderController@destroy', $order['id'])}}" method="post">
            {{csrf_field()}}
            <input name="_method" type="hidden" value="DELETE">
            <button class="btn btn-danger" type="submit">Delete</button>
          </form>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
  </div>
  @endsection