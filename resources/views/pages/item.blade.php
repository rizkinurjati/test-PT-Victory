@extends('layout.content')
@section('container')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb ">
    <li class="breadcrumb-item active " aria-current="page">Items</li>
  </ol>
</nav>
<div class="container">
<a href="{{route('item.create')}}"><button type="button" class="btn btn-success my-3">Create new item</button></a>
<table class="table table-dark">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">price</th>
      <th scope="col">category</th>
      <th scope="col">description</th>
      <th scope="col">Create At</th>
      <th scope="col">Action</th>
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
        <td>{{$item->description}}</td>
        <td>{{$item->created_at->format('d M Y')}}</td>
        <td>
         <form 
                action = "{{ route('item.destroy', $item->id)}}" method="POST">
                <a href="{{route('item.edit', $item->id)}}" class="btn btn-warning">Edit</a>
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete</button>
         </form>
        </td>

    </tr>
  </tbody>
  @endforeach
</table>
{{$items->links('pagination::bootstrap-4')}}
</div>
@endsection