@extends('layouts.user')

@section('content')

<div class="panel-body">
        @if(Session::has('success'))
        <p class="alert alert-success">{{ Session::get('success') }}</p>
    @endif
</div>

<div class="container">
    
<div class="col-md-8">
<h2>Upload File</h2>
{!! Form::open(['action' => 'studentcontroller@submitproforma', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
{{Form::label('label', 'Topic :')}}
{{Form::text('topic', '', ['class' => 'form-control', 'placeholder' => 'Topic'])}}<div class="form-group">
       <br> {{Form::file('filename')}}
    </div>

    {{ Form::hidden('groupid', $groupid)}}
    {{Form::submit('Submit', ['class'=>'btn btn-primary'])}}
{!! Form::close() !!}
</div>

</div>






@endsection 

