@extends('layouts.lay-admin')
@section('content')
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/css/bootstrap-select.min.css">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/js/bootstrap-select.min.js"></script>
    
    <!-- (Optional) Latest compiled and minified JavaScript translation files -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/js/i18n/defaults-*.min.js"></script>
    
</head>

@if(Session::has('success'))
<p class="alert alert-success">{{ Session::get('success') }}</p>
@endif
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

</style>
<h3> <i> Group No: {{$users[0]->group_id}} Details </i> </h3>

<table class="table table-striped" >
  <thead>
    <tr>
        <th scope="col">Name</th>
         <th scope="col">Roll No</th>
         <th scope="col">CGPA</th>
             <th scope="col">E-mail</th>
            
        </tr>   
  </thead>     
  <tbody> 
@foreach($users as $row)

        
        
        <tr>        
                    <td>{{$row->name}}</td>
                    <td>{{$row->rollno}}</td>
                    <td>{{$row->cgpa}}</td>
                    <td>{{$row->email}}</td>
                   
                    

             </tr>
            @endforeach
  </tbody>
</table>

<br>

&nbsp &nbsp&nbsp&nbsp
<!-- Trigger the modal with a button -->
<button type="button" class="w3-button w3-blue" data-toggle="modal"
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

@foreach ($allgroupids as $groups)
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

&nbsp&nbsp
<a href="/teamapprove/{{$users[0]->group_id}}" onclick="return confirm('Are you sure? Do you want to approve the selected group?')">
    <button type="button" class="w3-button w3-green">
    <i > 
     
      Approve
    </i>
    </button>
</a>
@endsection