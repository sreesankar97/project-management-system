@extends('layouts.lay-admin')
@section('content')


<h1>Teams Formed</h1>
@if(count($users) > 0)
    @foreach($users as $team)
        <div class="well">
            <div class="row">
                
                <div class="col-md-2 col-sm-2">
                 
                    <p> <strong> Group No:  <a href="/formedteams/{{$team->group_id}}">{{$team->group_id}}</a></strong></p>
                   
                </div>
            </div>
        </div>
    @endforeach
    
@else
    <p>No Teams found</p>
    
@endif
@endsection