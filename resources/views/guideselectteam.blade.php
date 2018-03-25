@extends('layouts.lay-faculty')

@section('content')

<h1>Select team</h1>
@if(count($team) > 0)
    @foreach($team as $team)
        <div class="well">
            <div class="row">
                
                <div class="col-md-8 col-sm-8">
                 
                    <p> <strong> Group No: {{$team->group_id}} <a href="/teamstatus/{{$team->group_id}}">{{$team->topic}}</a></strong></p>
                   
                </div>
            </div>
        </div>
    @endforeach
    
@else
    <p>No Teams found</p>
@endif
@endsection

