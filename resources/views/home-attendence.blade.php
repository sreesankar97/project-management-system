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
@endsection
