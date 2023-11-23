@extends('layouts.app')

@section('content')

    <div class="d-flex justify-content-between mb-4">
        <h3>Post Review</h3>
    </div>
    <div class="card">
        <div class="card-body">
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">SL</th>
                    <th scope="col">Title</th>
                    <th scope="col">Description</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($posts as $item)
                    <tr>
                      <th scope="row">{{$loop->iteration}}</th>
                      <td>{{$item->title}}</td>
                      <td>{!!Str::words($item->desc, 10)!!}</td>
                      <td class="w-25">
                          <button class="btn btn-primary my-1" data-bs-toggle="modal" data-bs-target="#reviewModal{{$item->id}}">Review Post</button>
                          <a class="btn btn-primary  my-1" href="{{route('post.publish',$item->slug)}}">Publish</a>
                          <a class="btn btn-danger  my-1" href="{{route('post.inapprove',$item->slug)}}">Inapprove</a>
                      </td>
                    </tr>
                    {{-- review model --}}
                  <div class="modal fade" id="reviewModal{{$item->id}}" tabindex="-1" aria-labelledby="reviewModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h1 class="modal-title fs-5" id="reviewModalLabel">Modal title</h1>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                          <div class="modal-body">
                              <div>
                                <p>{{$item->desc}}</p>
                              </div>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <a href="#" class="btn btn-primary">Published</a>
                          </div>
                      </div>
                    </div>
                  </div>
                  @endforeach
                </tbody>
              </table>
        </div>
    </div>
@endsection
