
    @extends('layouts.lay-admin')
    @section('content')
    @if(Session::has('mssg'))
        <p class="alert alert-success">{{ Session::get('mssg') }}</p>
        @elseif(Session::has('mssg'))
    @elseif(Session::has('success'))
    <p class="alert alert-success">{{ Session::get('success') }}</p>
   @endif
    <h2> Total number of classes conducted</h2>
    {!! Form::open(['action' => 'AdminController@addtotclassconducted', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
    <div class="form-group">
        
     
     </div>
     <div class="col-md-2">
    <div class="form-group">
        {{Form::label('label1', 'Total No. of Classes')}}
        {{Form::text('total', '', ['class' => 'form-control', 'placeholder' => 'Total No. of Classes'])}}
    </div></div>
 <div class="col-md-6">
            <br>
     {{Form::submit('ADD/UPDATE', ['class'=>'btn btn-primary'])}}
    {!! Form::close() !!}
        </div>
    @endsection
