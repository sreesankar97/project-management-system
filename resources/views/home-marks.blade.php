@extends('layouts.user')
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
<table style="width:100%">
        
    
    <tr>
        <th>Name</th>
         <th>Review 1 Marks</th>
         <th>Review 2 Marks</th>
             <th>Final Review Marks</th>
        </tr>
@foreach($users as $row)
        
       
      
        <tr>
                    <td>{{$row->name}}</td>
                    <td>{{$row->review1}}</td>
                    <td>{{$row->review2}}</td>
                    <td>{{$row->final}}</td>
                    
                    

             </tr>
            @endforeach
</table>
@endsection
