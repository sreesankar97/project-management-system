@extends('layouts.lay-admin')

@section('content')
<div>
        <div class="col-md-8">
{!! Form::open(['action' => 'AdminController@proformarejectreason', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
<div class="form-group">
   
        {{ Form::hidden('file_id', $file_id)}}
    {{Form::label('label', 'Comment Reasons for rejection and suggest improvements here :')}}
    {{Form::textarea('body', '', ['id' => 'article-ckeditor', 'class' => 'form-control', 'placeholder' => 'Body Text'])}}
</div> 

{{Form::submit('Submit', ['class'=>'btn btn-primary'])}}
{!! Form::close() !!}
</div>
@endsection