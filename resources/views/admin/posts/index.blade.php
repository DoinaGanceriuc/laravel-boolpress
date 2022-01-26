@extends('layouts.admin')

@section('content')

<div class="container">
    <div class="text-end mb-3">
       <a href="" class="btn btn-primary">Create</a>
    </div>
    <table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Image</th>
      <th scope="col">Title</th>
      <th scope="col">Author</th>
      <th scope="col">Posted Date</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
       @foreach ($posts as $post)
        <tr>
            <th scope="row">{{$post->id}}</th>
            <td><img width="80" src="{{$post->image}}" alt="{{$post->title}}"></td>
            <td>{{$post->title}}</td>
            <td>{{$post->author}}</td>
            <td>{{$post->posted_at}}</td>
            <td>
                <a class="btn btn-primary" href="">View</a>
                <a class="btn btn-warning" href="">Edit</a>
                <a class="btn btn-danger" href="">Delete</a>
            </td>
        </tr>
        @endforeach
  </tbody>
</table>
<div class="d-flex justify-content-center">
    {{$posts->links()}}
</div>
</div>

@endsection
