
@extends('layouts.lay-admin')
@section('content')

 <div class="panel-body">
        @if(Session::has('success'))
        <p class="alert alert-success">{{ Session::get('success') }}</p>
    @endif
                    <h1> Compose Message</h1>
                </div>
                
                <div class="col-md-8">
                {!! Form::open(['action' => 'AdminController@msgcompose', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                <div class="form-group">
                    {{Form::label('groupid', 'Group Id')}}
                    {{Form::text('groupid', $id, ['class' => 'form-control', 'placeholder' => 'Group Id','readonly' => 'true'])}}
            
                </div>
                <div class="form-group">
                        
                        {{Form::label('title', 'Title')}}
                        {{Form::text('title', '', ['class' => 'form-control', 'placeholder' => 'Title'])}}
                    </div>
                    <div class="form-group">
                        {{Form::label('body', 'Body')}}
                        {{Form::textarea('body', '', ['id' => 'article-ckeditor', 'class' => 'form-control', 'placeholder' => 'Body Text'])}}
                    </div> 
                    
                    {{Form::submit('Submit', ['class'=>'btn btn-primary'])}}
                {!! Form::close() !!}
            </div>
               
         
@endsection