@extends('layout.content')
@section('container')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb ">
    <li class="breadcrumb-item active " aria-current="page">Categories</li>
  </ol>
</nav>
<div class="container">
<a href="{{route('catalog.create')}}"><button type="button" class="btn btn-success my-3">Create new catagories</button></a>
<table class="table table-dark">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Create At</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  @php $no = 1; @endphp
  @foreach ($catalogs as $catalog )
  <tbody>
    <tr>
      <th scope="row">{{ $no++ }}</th>
        <td>{{$catalog->catalog_name}}</td>
        <td>{{$catalog->created_at->format('d M Y')}}</td>
        <td>
         <form 
                action = "{{ route('catalog.destroy', $catalog->id)}}" method="POST">
                <a href="{{route('catalog.edit', $catalog->id)}}" class="btn btn-warning">Edit</a>
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete</button>
         </form>
        </td>

    </tr>
  </tbody>
  @endforeach
</table>
{{$catalogs->links('pagination::bootstrap-4')}}
</div>
@endsection