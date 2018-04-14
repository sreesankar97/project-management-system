@extends('layouts.lay-admin')
@section('content')
<head>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/css/bootstrap-select.min.css">
    
        <!-- Latest compiled and minified JavaScript -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/js/bootstrap-select.min.js"></script>
        
        <!-- (Optional) Latest compiled and minified JavaScript translation files -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/js/i18n/defaults-*.min.js"></script>
        
    </head>
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
          
          
<h2>
    &nbsp &nbsp&nbspTeams Pending Approval</h2>
          
<div class="col-md-14">
           
        @for($i=0;$i<120;$i++)  
         &nbsp 
        @endfor
       
        
<button type="button" class="w3-button w3-blue" data-toggle="modal"
data-target="#myModal"><i> Move Students </i>

</button> 
&nbsp&nbsp

<button type="button" class="w3-button w3-red">Delete all</button>

</div>
<br>
@if(count($users) > 0)
    @foreach($users as $team)
    <div class="col-md-2 col-sm-3">
        <div class="well">
            <div class="row">
                
                

                    <div class='col-xs-10'>
                    <p> <strong> <a href="/formedteams/{{$team->group_id}}"> 
                    Group No: {{$team->group_id}}</a></strong></p>
                  
                   
                    @foreach($members as $member)
                    @if($member->group_id == $team->group_id)
                    <div class="col-md-15 col-sm-15">
             
                    <p><i><strong> {{ $member->name}} </strong></i></p>
                    
                    
            </div>
                    
                    @endif
       
    
                
                    @endforeach 
           
                    <a href="/teamapprove/{{$team->group_id}}" onclick="return confirm('Are you sure? Do you want to approve the selected group?')">
                        <button type="button" class="btn btn-primary btn-xs">
                        <i > 
                         
                          Approve
                        </i>
                        </button>
                    </a>

{{--
                    
<!-- Trigger the modal with a button -->
&nbsp
<button type="button" class="btn btn-primary btn-xs" data-toggle="modal"
data-target="#myModal"><i> Move Students </i>

</button> 

  <!-- Modal -->
<div class="modal fade" id="myModal" role="dialog">
<div class="modal-dialog">

<!-- Modal content-->
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal">&times;</button>
<h4 class="modal-title">Select Team</h4>
</div>
<div class="modal-body">
<p><i>Select the team which you want the student to move to</i> </p>
</div>
<form action = "{{ action('AdminController@membermove') }}" method ="POST">
   
  <label for = "type" class = "col-sm-3 control-label"><p class="mb-0">Select Student</p></label>
  <div class = "col-sm-4">
  <select name="rollno" id="rollno" class="form-control">
  
  @foreach ($members as $user)
  @if($user->group_id == $team->group_id)
  <option value=// echo strtolower($user->rollno); ">
    //echo $user->name; ?>
</option>
@endif
  @endforeach 
  </select>
  </div>
        
  <div class="row-fluid">
      
<div class="form-group">
<label for = "type" class = "col-sm-1 control-label">Team</label>
<div class = "col-sm-2">
<select name="groupid" id="groupid" class="form-control">

@foreach ($allgroupids as $groups)
<option value="{{ $groups->group_id}}" 
{{ (isset($groups->group_id) || old('id'))? "selected":"" }}>
{{ $groups->group_id}}</option>

@endforeach 
</select>

</div>
      </div>


<div class="modal-footer">

<input type="hidden" name="_token" value="">
<button type="submit" class="btn btn-default"  value="MOVE"> MOVE</button>

</div>

</div>
</form>

</div>
</div>

</div>
--}}

                    
                    </div>
                    
                   
                    
                    
                    
                </div>
            </div>
        </div>
    @endforeach
    <!-- Trigger the modal with a button -->
   

  <!-- Modal -->
<div class="modal fade" id="myModal" role="dialog">
<div class="modal-dialog">

<!-- Modal content-->
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal">&times;</button>
<h4 class="modal-title">Select Team</h4>
</div>
<div class="modal-body">
<p><i>Select the team which you want the student to move to</i> </p>
</div>
<form action = "{{ action('AdminController@membermove') }}" method ="POST">
   
  <label for = "type" class = "col-sm-2 control-label"><p >Select Student</p></label>
  <div class = "col-sm-4">
  <select name="rollno" id="rollno" class="selectpicker" data-live-search="true">
  
  @foreach ($members as $user)
  <option value="<?php echo strtolower($user->rollno); ?>">
    <?php echo $user->name; ?>
</option>
  @endforeach 
  </select>
  </div>
        
  <div class="row-fluid">
      
<div class="form-group">
<label for = "type" class = "col-sm-1 control-label">Team</label>
<div class = "col-sm-3">
<select name="groupid" id="groupid" class="form-control">

@foreach ($users as $groups)
<?php $var = "Group No.".$groups->group_id ?>
<option value="<?php echo strtolower($groups->group_id); ?>">
    <?php echo $var; ?>
</option>

@endforeach 
</select>

</div>
      </div>


<div class="modal-footer">

<input type="hidden" name="_token" value="<?php echo csrf_token() ?>">
<button type="submit" class="btn btn-default"  value="MOVE"> MOVE</button>

</div>

</div>
</form>

</div>
</div>

</div>

@else
    <p>No Teams found</p>
    
@endif

@endsection