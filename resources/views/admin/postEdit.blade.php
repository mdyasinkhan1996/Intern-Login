@extends('layouts.app')

@section('content')

    <div class="d-flex justify-content-between mb-4">
        <h3>Update Post</h3>
    </div>
    <div class="card">
        <div class="card-body">
          <form method="POST" action="{{route('post.update', $post->slug)}}">
            @csrf
              <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" name="title" placeholder="post title" value="{{$post->title}}" class="form-control" id="title">
              </div>
              <div>
                <label for="description">Description</label>
                <textarea class="form-control" name="desc" rows="10" placeholder="post descripttion here" id="description">{{$post->desc}}</textarea>
              </div>
              <button type="submit" class="btn btn-primary mt-4">Update</button>
          </form>
        </div>
    </div>
@endsection
