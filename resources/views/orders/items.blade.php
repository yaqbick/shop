@extends('layouts.app')
@section('content')
    <br />
    @if (\Session::has('success'))
      <div class="alert alert-success">
        <p>{{ \Session::get('success') }}</p>
      </div><br />
     @endif
     <h1>Zamówienie nr {{$order}}</h1>
    <table class="table table-striped">
    <thead>
      <tr>
        <th></th>
        <th>Tytuł</th>
        <th>Cena</th>
        <th>Ilość</th>
        <th>Suma</th>
      </tr>
    </thead>
    <tbody>
      @foreach($items as $item)
      <tr>
        <td><img scr="{{$item['book']['cover']}}"></td>
        <td>{{$item['book']['title']}}</td>
        <td>{{$item['book']['price']}} zł</td>
        <td>{{$item['amount']}}</td>
        <td>{{$item['totals']}} zł</td>
      </tr>
      @endforeach
    </tbody>
  </table>
  @endsection