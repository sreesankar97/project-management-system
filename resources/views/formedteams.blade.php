@extends('layouts.lay-admin')
@section('content')
<style>
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

<a href="/teamapprove/{{$users[0]->group_id}}" onclick="return confirm('Are you sure? Do you want to approve the selected group?')">
    <button type="button" class="w3-button w3-green">
    <i class="glyphicon glyphicon-ok"> 
     
      Approve
    </i>
    </button>
</a>
@endsection