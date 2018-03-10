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
@foreach($users as $row)
        Name:{{$row->name}}
        <tr>
             <th>Review-1</th>
             <th>Review-2</th>
                 <th>Total</th>
            </tr>
        <tr>
                    <td>{{$row->review1}}</td>
                    <td>{{$row->review2}}</td>
                    <td>{{$row->final}}</td>

             </tr>
            @endforeach
</table>
@endsection
