@extends('layouts.app')
@section('content')
<a href="{{ route('posts.create') }}" class="btn btn-success mb-2">Create Posts</a>
<table class="table">
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Title</th>
        <th scope="col">Posted By</th>
        <th scope="col">Created At</th>
        <th scope="col">Actions</th>
      </tr>
    </thead>
    <tbody>
      @foreach($posts as $post)
        <tr>
            <th scope="row">{{ $post->id}}</th>
            <td>{{ $post->title}}</td>
            {{--@dd($post->user)--}}
            <td>{{ $post->user ? $post->user->name : 'User Not Found' }}</td>
            <td>{{ $post->created_at->format('Y-m-d') }}</td> <!--Fromat[Carbon]-->
            <td>
                <a href="{{route('posts.show' , $post->id)}}" class="btn btn-info">View</a> <!--or ['post' => $post]-->
                <!--<a href="/posts/{{ $post->id}}" class="btn btn-info">View</a>-->
                <a href="{{route('posts.edit' , $post->id)}}" class="btn btn-primary">Edit</a>
                <form style="display: inline-block" action="{{route('posts.destroy' , ['post' => $post->id])}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger" type="submit">Delete</button>
                </form>
            </td>
        </tr>
      @endforeach
    </tbody>
  </table>
@endsection

