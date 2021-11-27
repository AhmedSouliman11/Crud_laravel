@extends('layouts.app')
@section('content')

<div class="card">
    <div class="card-header">
      post info
    </div>
    <div class="card-body">
      <h5 class="card-title">ID: {{ $post->id }}</h5> <!--Mustage template-->
      <h5 class="card-title">Title: {{ $post->title }}</h5> <!--Mustage template-->
      <h5 class="card-title">Description: {{ $post->description }}</h5>
    </div>
  </div>
</div>

@endsection
