@extends('layouts.lay-admin')
<style>
table, th, td {
    border: 1px solid black;
    border-collapse: collapse;
}
th, td {
    padding: 5px;
    text-align: left;    
}
.btn{
                color: black;
                text-decoration: none;
                border: #ccc 1px solid;
                padding: 10px 15px;
                border-radius: 8px;
                line-height: 4em;
                
            }
</style>
@section('content')
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
    @if(count($users) > 0)
    {{--  <div class="dropdown show">
            <br><a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Select Student
            </a>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
        @foreach($users as $user)
        
                                    <p>  <a class="dropdown-item" href="#">{{$user->name}}</a></p>

        @endforeach
    </div>
</div>  --}}
{{--<div class="row">
    <div class = "col-md-3">
        <label for="exampleFormControlSelect1">Select student</label>
    <select class="form-control" id="exampleFormControlSelect1">
            
        @foreach($users as $user)
        <option>  <a class="dropdown-item" href="/eachattend/{{$user->email}}"> {{$user->name}}</a></option>
        
 --}}
 <div class="col-md-2">
            <label for="question">Select Student : </label>
 </div>
                        <div class="form-group dropdown">
                           
                            
                                @foreach($users as $user)
                                <div class="col-md-2">
                                <p> <strong> <a href="/eachattend/{{$user->email}}">{{$user->name}}</a></strong></p>
                                </div>
                                @endforeach
                           
                        </div>
                            
                        
     
                

    
<div class="col-md-2"></div>

    @else
        <p>No Teams found</p>
    @endif
@endsection