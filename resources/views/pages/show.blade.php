@extends('layout.content')
@section('container')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item active" aria-current="page">Home</li>
  </ol>
</nav>
<div class="container">
<table class="table table-dark">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">price</th>
      <th scope="col">category</th>
      <th scope="col">Image</th>
      <th scope="col">description</th>
      <th scope="col">Create At</th>
    </tr>
  </thead>
  @php $no = 1; @endphp
  @foreach ($items as $item )
  <tbody>
    <tr>
      <th scope="row">{{ $no++ }}</th>
        <td>{{$item->item_name}}</td>
        <td>@convert($item->price)</td>
        <td>{{$item->catalog->catalog_name}}</td>
        <td><img src="{{asset('storage/'. $item->images)}}" alt="" style="width: 150px;"></td>
        <td>{{$item->description}}</td>
        <td>{{$item->created_at->format('d M Y')}}</td>
    </tr>
  </tbody>
  @endforeach
</table>
</div>
@endsection