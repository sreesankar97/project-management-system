@extends('layouts.user')

@section('content')
    <h1>Messages</h1>
    @if(count($posts) > 0)
        @foreach($posts as $post)
            <div class="well">
                <div class="row">
                    
                    <div class="col-md-8 col-sm-8">
                        <h3><a href="/posts/{{$post->post_id}}">{{$post->title}}</a></h3>
                        <small>Sent on {{$post->created_at}} by Admin</small>
                    </div>
                </div>
            </div>
        @endforeach
        
    @else
        <p>No posts found</p>
    @endif
@endsection