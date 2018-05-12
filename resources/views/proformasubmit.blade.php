@extends('layouts.user')

@section('content')

@if($count==0)

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
@else

<h3> Proforma Already Submitted.. </h3>

@endif








@endsection 

