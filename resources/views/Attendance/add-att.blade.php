@extends('layouts.lay-admin')


@section('content')


    <h1>Select team</h1>
   
    @if(count($users) )
        @foreach($users as $post)
            <div class="well">
                <div class="row">
                    
                    <div class="col-md-8 col-sm-8">
                     
                        <p> <strong> Group No: {{$post->group_id}} <a href="/addattendance/{{$post->group_id}}">{{$post->topic}}</a></strong></p>
                       
                    </div>
                </div>
            </div>
        @endforeach
        
    @else
        <p>No Teams found</p>
    @endif
    
    @endsection
