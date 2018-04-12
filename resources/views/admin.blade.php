
@extends('layouts.lay-admin')


@section('content')

        <div class="panel-body">
                <br>
                @if(Session::has('success'))
                <p class="alert alert-success">{{ Session::get('success') }}</p>
                <p>Do you want to Send mail to students in the groupno={{$id}} </p>
                {!! Form::open(['action' => 'AdminController@send', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
<div class="form-group">
        {{ Form::hidden('groupid', $id)}}

</div>

{{Form::submit('Send Mail', ['class'=>'btn btn-primary'])}}
{!! Form::close() !!}
                @elseif(Session::has('guidesuccess'))
                <p class="alert alert-success">{{ Session::get('guidesuccess') }}</p>
                
                

@endif
                        </div>



@endsection
