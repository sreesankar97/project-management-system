@extends('layouts.lay-admin')
@section('content')


<h1>Teams Pending Approval</h1>
@if(count($users) > 0)
    @foreach($users as $team)
    <div class="col-md-2 col-sm-2">
        <div class="well">
            <div class="row">
                
                

                
                    <p> <strong> <a href="/formedteams/{{$team->group_id}}">  Group No: {{$team->group_id}}</a></strong></p>
                    @foreach($members as $member)
                    @if($member->group_id == $team->group_id)
                    <div class="col-md-7 col-sm-8">
                    <p><i><strong>{{$member->name}} </strong></i></p>
                    </div>
                    @endif
                    @endforeach 
                    
                    <br>
                </div>
            </div>
        </div>
    @endforeach
    
@else
    <p>No Teams found</p>
    
@endif
@endsection