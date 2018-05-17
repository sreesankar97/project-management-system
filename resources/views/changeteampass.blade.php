@extends('layouts.user')

@section('content')
@if(Session::has('passwordsuccess'))
        <p class="alert alert-success">{{ Session::get('passwordsuccess') }}</p>
        @elseif(Session::has('mssg'))
        <p class="alert alert-danger">{{ Session::get('mssg') }}</p>
        @endif

<div>
    <div class="col-md-8">
{!! Form::open(['action' => 'studentcontroller@changepassword', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
<div class="form-group">

  
{{Form::label('label', 'Current Password:')}}
{{Form::text('oldpass', '', ['id' => 'article-ckeditor', 'class' => 'form-control', 'placeholder' => 'Old Password'])}}
{{Form::label('label', 'New Password:')}}
<input type="password" class="form-control" name= "newpass" placeholder="New Password">
{{Form::label('label', 'Retype New Password:')}}
<input type="password" class="form-control" name= "passconf" placeholder="Retype Password">
</div> 

{{Form::submit('Submit', ['class'=>'btn btn-primary'])}}
{!! Form::close() !!}
</div>

@endsection