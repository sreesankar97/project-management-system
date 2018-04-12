@extends('layouts.lay-admin')

@section('content')


@if(Session::has('mailsuccess'))
<p class="alert alert-success">{{ Session::get('mailsuccess') }}</p>
@endif
@endsection