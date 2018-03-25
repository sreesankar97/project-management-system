@extends('layouts.lay-faculty')
@section('content')
<h3> Mark details of Group no: {{$users[0]->groupid}} </h3>
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




<div>

        <h3>Attendance details of Group no: {{$users[0]->groupid}} </h3>
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
         <th>Class Present</th>
         <th>Total Classes</th>
             <th>Total Percentage</th>
        </tr>         
@foreach($users as $row)
        
        <?php $perc = ( $row->present / $row->total_class )*100; 
              $perc=number_format($perc,2,'.',',') ?>
        
        <tr>
                    <td>{{$row->name}}</td>
                    <td>{{$row->present}}</td>
                    <td>{{$row->total_class}}</td>
                    <td>{{$perc}}</td>
                    

             </tr>
            @endforeach
</table>
</div>


@endsection
