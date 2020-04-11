<<<<<<< HEAD
@extends('layouts.panel')
=======
@extends('layouts.app')
>>>>>>> e7baf3319b9d1d2c073438c93aa31b3dab27650f
@section('content')
    <table class="table table-striped">
    <thead>
      <tr>
        <th>SKU</th>
        <th>Name</th>
        <th colspan="2">Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach($products as $product)
      <tr>
        <td>{{$product['SKU']}}</td>
        <td>{{$product['name']}}</td>
        <td><a href="{{action('ProductController@edit', $product['id'])}}" class="btn btn-warning">Edit</a></td>
        <td>
          <product action="{{action('ProductController@destroy', $product['id'])}}" method="post">
            {{csrf_field()}}
            <input name="_method" type="hidden" value="DELETE">
            <button class="btn btn-danger" type="submit">Delete</button>
          </product>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
  @endsection