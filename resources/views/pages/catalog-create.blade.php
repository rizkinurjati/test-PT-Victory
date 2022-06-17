@extends('layout.content')
@section('container')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb ">
  <li class="breadcrumb-item"><a href="catalog">Catalogs</a></li>
    <li class="breadcrumb-item active " aria-current="page">Create</li>
  </ol>
</nav>
<div class="container">
<form action="{{route('catalog.store')}}" method="POST">
  @csrf
  <div class="form-group">
    <label for="exampleFormControlInput1">Name</label>
    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="" name="catalog_name">
    @if ($errors->has('catalog_name'))
      <span class="text-danger">{{ $errors->first('catalog_name') }}</span>
    @endif
  </div>
    <div class="">
      <button type="submit" class="btn btn-primary mt-2" >Create</button>
  </div>
</form>
</div>
@endsection