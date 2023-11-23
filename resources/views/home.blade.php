@extends('layouts.app')

@section('content')
    <div class="row">
        @foreach ($posts as $post)
            
            <div class="col-lg-3">
                <div class="card">
                    <div class="card-header">
                        <h3>{{$post->title}}</h3>
                    </div>
            
                    <div class="card-body">
                        <p>{{$post->desc}}</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
