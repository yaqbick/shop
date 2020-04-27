@extends('layouts.app')
@section('content')

@foreach(Session::all() as $key => $obj)
<?php var_dump($obj) ?>
@endforeach;