@extends('layouts.lay-admin')

@section('content')
    <h1>Select team Member</h1>
    @if(count($users) > 0)
        @foreach($users as $user)
            <div class="well">
                <div class="row">
                    
                    <div class="col-md-8 col-sm-8">
                     
                        <p> <strong> <a href="/eachmarks/{{$user->email}}">{{$user->name}}</a></strong></p>
                       
                    </div>
                </div>
            </div>
        @endforeach
        
    @else
        <p>No Teams found</p>
    @endif
@endsection