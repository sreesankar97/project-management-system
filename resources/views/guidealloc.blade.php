@extends('layouts.lay-admin')

@section('content')
<div>
    <h3> <i> Create Faculty</i> </h3>
        <div class="col-md-8">
{!! Form::open(['action' => 'AdminController@createguide', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
<div class="form-group">
   
    
    {{Form::label('label', 'Faculty ID')}}
    {{Form::text('facid', '', ['class' => 'form-control', 'placeholder' => 'Faculty ID'])}}
    {{Form::label('label', 'Faculty Name')}}
    {{Form::text('name', '', ['class' => 'form-control', 'placeholder' => 'Faculty Name'])}}
    {{Form::label('label', 'Email Id')}}
    {{Form::text('email', '', ['class' => 'form-control', 'placeholder' => 'Email Id'])}}
</div> 

{{Form::submit('Submit', ['class'=>'btn btn-primary'])}}
{!! Form::close() !!}
<p><i> Note: Default password for login is 'password' </i> </p>
</div>

@endsection