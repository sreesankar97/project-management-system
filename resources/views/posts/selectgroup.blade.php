@extends('layouts.lay-admin')
@section('content')
    <h1>Select Group</h1>
    @if(count($posts) > 0)
        @foreach($posts as $post)
            <div class="well">
                <div class="row">
                    
                    <div class="col-md-8 col-sm-8">
                        <h3><a href="/groups/{{$post->group_id}}">{{$post->topic}}</a></h3>
                    </div>
                </div>
            </div>
        @endforeach
        
    @else
        <p>No groups found</p>
    @endif
@endsection