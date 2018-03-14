@extends('layouts.user')

@section('content')
<br>
<a href="/viewmsg" class="btn btn-default">Go Back</a>
    
     <h1>{{$posts[0]->title}}</h1>
   
    <br><br>
    <div>
        {!!$posts[0]->body!!}
    </div>
    <hr>
    <small>Sent on {{$posts[0]->created_at}} by admin </small>
    <hr> 
   
    
@endsection