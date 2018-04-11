
@extends('layouts.lay-admin')


@section('content')

        <div class="panel-body">
                <br>
                @if(Session::has('success'))
                <p class="alert alert-success">{{ Session::get('success') }}</p>
                @elseif(Session::has('guidesuccess'))
                <p class="alert alert-success">{{ Session::get('guidesuccess') }}</p>
                        
            @endif
            
                        </div>
                    
      
@endsection
