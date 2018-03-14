@extends('layouts.lay-admin')
@section('content')
   <h1>
     
    
       <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        {{ Session::get('message', 'Message Sent Successfully') }}
        </div>
@endsection
