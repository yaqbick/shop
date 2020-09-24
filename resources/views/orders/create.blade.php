@extends('layouts.panel')
@section('content')
      <h2>Złóż zamówienie</h2><br  />
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
      <form method="post" action="{{url('order')}}">
      {{csrf_field()}}
      <div class="row">
        <div class="col-6 col-md-4">
            <div class="form-group">
                <label for="title">Imię:</label>
                <input type="text" class="form-control"  name="firstname">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-6 col-md-4">
            <div class="form-group">
                <label for="title">Nazwisko:</label>
                <input type="text" class="form-control" name="lastname">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-6 col-md-4">
            <div class="form-group">
                <label for="title">Email:</label>
                <input type="text" class="form-control"  name="email">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-6 col-md-4">
            <div class="form-group">
                <label for="title">Telefon:</label>
                <input type="text" class="form-control" name="phone">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-6 col-md-4">
            <div class="form-group">
                <label for="title">Adres:</label>
                <input type="text" class="form-control"  name="address">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-6 col-md-4">
            <div class="form-group">
                <button type="submit" class="btn btn-success" style="margin-left:38px">Przejdź do płatności</button>
          </div>
            </div>
        </div>
    </div>
      </form>
    </div>
    @endsection