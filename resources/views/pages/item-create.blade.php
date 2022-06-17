@extends('layout.content')
@section('container')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb ">
  <li class="breadcrumb-item"><a href="{{route('item.index')}}">Items</a></li>
    <li class="breadcrumb-item active " aria-current="page">Create</li>
  </ol>
</nav>
<div class="container">
<form action="{{route('item.store')}}" method="POST" enctype="multipart/form-data">
  @csrf
  <div class="form-group">
    <label for="exampleFormControlInput1">Name</label>
    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="" name="item_name">
    @if ($errors->has('item_name'))
      <span class="text-danger">{{ $errors->first('item_name') }}</span>
    @endif
    <br>
    <label for="exampleFormControlInput1">Price</label>
    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="" name="price">
    @if ($errors->has('item_name'))
      <span class="text-danger">{{ $errors->first('price') }}</span>
    @endif
    <br>
    <label for="exampleFormControlInput1">Description</label>
    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="description"></textarea>
    @if ($errors->has('description'))
      <span class="text-danger">{{ $errors->first('description') }}</span>
    @endif
    <br>
    <label for="exampleFormControlInput1">Select Category</label>
    <select class="form-control" id="catalog" name="catalogs_id">
    @foreach ($catalogs as $catalog )
     <option value="{{ $catalog->id }}">{{$catalog->catalog_name}}</option>
    @endforeach
    </select>
    
        <div class="form-group">
            <strong>Image:</strong>
            <img class="img-preview img-fluid">
            <input type="file" name="images" class="form-control @error('images') is-invalid @enderror" placeholder="Chose Images" id="images"
            onchange="previewImage()">
        </div>
        @if ($errors->has('images'))
        <span class="text-danger">{{ $errors->first('images') }}</span>
        @endif
  </div>
  </div>
    <div class="">
      <button type="submit" class="btn btn-primary mt-2" >Create</button>
  </div>
</form>
</div>
<script>
function previewImage(){
const images = document.querySelector('#images');
const imgPreview = document.querySelector('.img-preview');

imgPreview.style.display = 'block';

const oFReader = new FileReader();
ofReader.readAsDataURL(images.files[0]);

oFReader.onload = function(oFREvent){
imgPreview.src = oFREvent.target.result;
}
}
</script>
@endsection