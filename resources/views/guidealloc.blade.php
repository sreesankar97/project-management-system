@extends('layouts.lay-admin')

@section('content')
<div>
    <h3> <i> Allocate Guide </i> </h3>
        <div class="col-md-8">
{!! Form::open(['action' => 'AdminController@teamalloc', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
<div class="form-group">
   
    {{ Form::hidden('group_id', $group_id)}}
    {{Form::label('label', 'Faculty ID')}}
    {{Form::text('facid', '', ['class' => 'form-control', 'placeholder' => 'Faculty ID'])}}
    {{Form::label('label', 'Faculty Name')}}
    {{Form::text('facid', '', ['class' => 'form-control', 'placeholder' => 'Faculty Name'])}}
    {{Form::label('label', 'Email Id')}}
    {{Form::text('email', '', ['class' => 'form-control', 'placeholder' => 'Email Id'])}}
</div> 

{{Form::submit('Submit', ['class'=>'btn btn-primary'])}}
{!! Form::close() !!}
</div>
@endsection