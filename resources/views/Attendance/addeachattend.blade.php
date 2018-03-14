

@extends('layouts.lay-admin')
@section('content')

 <div class="panel-body">
        @if(Session::has('success'))
        <p class="alert alert-success">{{ Session::get('success') }}</p>
    @endif

                </div>
                <h2> Add Attendance for {{$user[0]->name}}</h2>
                {!! Form::open(['action' => 'AdminController@attendance', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                <div class="form-group">
                        
                        {{ Form::hidden('userid', $user[0]->email)}}
                 
                 </div>
                <div class="form-group">
                    {{Form::label('label1', 'Total No. of Classes')}}
                    {{Form::text('total', '', ['class' => 'form-control', 'placeholder' => 'Total No. of Classes'])}}
                </div>
                <div class="form-group">
                        {{Form::label('label2', 'No. of Classes Present')}}
                        {{Form::text('present', '', ['class' => 'form-control', 'placeholder' => 'No. of Classes Present'])}}
                    </div>
                 {{Form::submit('Submit', ['class'=>'btn btn-primary'])}}
                {!! Form::close() !!}
               
         
@endsection