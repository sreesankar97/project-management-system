@extends('layouts.lay-admin')

@section('content')
<style>

  .span6{
   display: inline-block;
   max-width: 60%;
   margin-left: 10%;
}


     @media screen and (min-width: 700px) {

.modal-dialog {

  width: 800px; /* New width for default modal */

}

.modal-sm {

  width: 500px; /* New width for small modal */

}

}

@media screen and (min-width:1000px) {

.modal-lg {

  width: 800px; /* New width for large modal */

}

}
h2 {
color: Grey;
font-family: Trebuchet MS;
}


</style>

@if(Session::has('success'))
<p class="alert alert-success">{{ Session::get('success') }}</p>
@endif

@if(Session()->has('msg'))
<div class="alert alert-danger">
  {{ Session()->get('msg') }}
 </div>
@endif

@if(count($proforma)>0)
<h2> Teams Submitted Proforma </h2>
@else 
<h2> No Pending Proformas </h2>
@endif
@foreach($proforma as  $proforma)

<div class="col-md-2 col-sm-3">
    <div class="well">
        <div class="row">
                <p> <strong> 
                    Group No: {{$proforma->groupid}}</a></strong></p>
                    @foreach($members as $member)
                  
                    @if($member->groupid == $proforma->groupid)
                    <div class="col-md-15 col-sm-15">
             
                    <p><i><strong> {{ $member->name}} </strong></i></p>
                    </div>
                    @endif
                    
              @endforeach 
              &nbsp 
              <a href="/storage/proforma/{{$proforma->filename}}" download="{{$proforma->filename}}">
                <button type="button" class="btn success">
                <i class="glyphicon glyphicon-download">
                    
                    Download
                </i>
                </button>
                
            </a>
            <br>
            &nbsp &nbsp<br>&nbsp
            <button type="button" class="btn btn-primary btn-xs" data-toggle="modal"
          data-target="#myModal-{{$proforma->file_id}}"> <i> Approve </i>
        
        </button> 
        
        <a href="/proformareject/{{$proforma->file_id}}" onclick="return confirm('Are you sure? Do you want to reject this proforma ?')">
          <button type="button" class="btn btn-primary btn-xs">
          <i > 
           
            Reject
          </i>
          </button>
      </a>
        <br>
    </div></div> </div> 
        <!-- Modal -->
<div id="myModal-{{$proforma->file_id}}" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Approve Project Topic</h4>
      </div>
      <div class="modal-body">
        {!! Form::open(['action' => 'AdminController@approveproforma', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
<div class="form-group">
    {{Form::label('label', 'Group Id')}}
    {{Form::text('groupid', $proforma->groupid, ['class' => 'form-control', 'placeholder' => 'Topic','readonly' => 'true'])}}
    {{Form::label('label', 'Topic')}}
    {{Form::text('topic', $proforma->topic, ['class' => 'form-control', 'placeholder' => 'Topic'])}}
</div> 
      
      <div class="modal-footer">
        <p><i> Note: You can edit or make changes to the name of the project topic</i> </p>
         {{Form::submit('Submit', ['class'=>'btn btn-primary'])}}
         {!! Form::close() !!}
      </div>
          
      </div>
    </div>

  </div>
</div>

     

            
                    
                
              @endforeach
        


@endsection