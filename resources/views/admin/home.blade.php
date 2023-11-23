@extends('layouts.app')

@section('content')

    <div class="d-flex justify-content-between mb-4">
        <h3>All Post</h3>
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createModal">Create Post</button>
    </div>
    <div class="card">
        <div class="card-body">
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">SL</th>
                    <th scope="col">Title</th>
                    <th scope="col">Description</th>
                    <th scope="col">Stage</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($posts as $item)
                    <tr>
                      <th scope="row">{{$loop->iteration}}</th>
                      <td>{{$item->title}}</td>
                      <td>{!! Str::words($item->desc, 20) !!}</td>
                      <td>
                        @if ($item->stage == 1)
                            Pending
                        @elseif($item->stage == 2)
                            Inapprove
                        @else
                            approve
                        @endif
                      </td>
                      <td>
                          <a class="btn btn-primary my-1" href="{{route('post.edit', $item->slug)}}">Edit</a>
                          <a class="btn btn-danger my-1" href="{{route('post.destroy', $item->slug)}}">Delete</a>
                      </td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
        </div>
    </div>
    <!-- Button trigger modal -->
<!-- create Modal -->
<div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="createModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="createModalLabel">Modal title</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form method="POST" action="{{route('post.create')}}">
        @csrf
        <div class="modal-body">
            <div class="mb-3">
              <label for="title" class="form-label">Title</label>
              <input type="text" name="title" placeholder="post title" class="form-control" id="title">
            </div>
            <div>
              <label for="description">Description</label>
              <textarea class="form-control"  rows="10" name="desc" placeholder="post descripttion here" id="description"></textarea>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Create</button>
        </div>
      </form>
    </div>
  </div>
</div>

@endsection
