@extends('layouts.lay-admin')
@section('content')

@if(Session::has('success'))
<p class="alert alert-success">{{ Session::get('success') }}</p>
@endif
<style>

  .span6{
   display: inline-block;
   max-width: 60%;
   margin-left: 10%;
}


     @media screen and (min-width: 600px) {

.modal-dialog {

  width: 600px; /* New width for default modal */

}

.modal-sm {

  width: 400px; /* New width for small modal */

}

}

@media screen and (min-width:800px) {

.modal-lg {

  width: 900px; /* New width for large modal */

}

}
table, th, td {
    border: 1px solid black;
    border-collapse: collapse;
}
th, td {
    padding: 5px;
    text-align: left;    
}
</style>
<h3> <i> Group No: {{$users[0]->group_id}} Details </i> </h3>
<table style="width:100%">
     
    <tr>
        <th>Name</th>
         <th>Roll No</th>
         <th>CGPA</th>
             <th>E-mail</th>
            
        </tr>         
@foreach($users as $row)

        
        
        <tr>
                    <td>{{$row->name}}</td>
                    <td>{{$row->rollno}}</td>
                    <td>{{$row->cgpa}}</td>
                    <td>{{$row->email}}</td>
                   
                    

             </tr>
            @endforeach
</table>
<br>

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
   
  <label for = "type" class = "col-sm-3 control-label"><p class="mb-0">Select Student</p></label>
  <div class = "col-sm-4">
  <select name="rollno" id="rollno" class="form-control">
  
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

<input type="hidden" name="_token" value="<?php echo csrf_token() ?>">
<button type="submit" class="btn btn-default"  value="MOVE"> MOVE</button>

</div>

</div>
</form>

</div>
</div>

</div>


<a href="/teamapprove/{{$users[0]->group_id}}" onclick="return confirm('Are you sure? Do you want to approve the selected group?')">
    <button type="button" class="w3-button w3-green">
    <i > 
     
      Approve
    </i>
    </button>
</a>
@endsection