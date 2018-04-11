@extends('layouts.lay-admin')
@section('content')


<h1>Teams Formed</h1>
@if(count($users) > 0)
    @foreach($users as $team)
        <div class="well">
            <div class="row">
                
                <div class="col-md-2 col-sm-2">
                 
                    <p> <strong> Group No:  <a href="/formedteams/{{$team->group_id}}">{{$team->group_id}}</a></strong></p>

                    @foreach($users as $member)
                    <table style="width:100%">
        
                        <tr>
                            <th>Name</th>
                           
                            
                            </tr>         
                            @if($team->group
                            )
                            <tr>
                                        <td>{{$member->name}}</td>
                                        
                                 </tr>
                            @endif
                    </table>
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