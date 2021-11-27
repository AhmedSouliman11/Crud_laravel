@extends('layouts.app')
@section('content')
<form method="POST" action="{{route('posts.update' , ['post' => $post])}}">
    @csrf <!--Protect us from csrf attack and it must be in every form that u will use, if you dont use it the output [page expired]-->
    @method('PUT')
<div class="mb-3">
    <label class="form-label">Title</label>
    <input name="title" type="text" class="form-control" value={{$post->title}}>
  </div>
  <div class="mb-3">
    <label class="form-label">Description</label>
    <textarea name="description" class="form-control">{{$post->description}}</textarea>
  </div>
  <div class="mb-3">
    <label class="form-label">User</label>
    <select class="form-select" name="user_id">
        @foreach($users as $user)
        <option value={{$user->id}} @if($user->id === $post->user_id) selected @endif>{{$user->name}}</option>
        @endforeach
    </select>
  </div>
  <button type="submit" class="btn btn-primary">Update Posts</button>
</form>
@endsection
