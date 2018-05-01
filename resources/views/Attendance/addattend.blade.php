@extends('layouts.lay-admin')
<style>

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
<table class="table table-bordered">
    <thead>
        <tr>
            <th>Name</th>
             <th>Class Present</th>
             <th>Total Classes</th>
                 <th>Total Percentage</th>
            </tr>   
    </thead>
    <tbody>      
    @foreach($users as $row)
            
            <?php $perc = ( $row->present / $row->total_class )*100; 
                  $perc=number_format($perc,2,'.',',') ?>
            
            <tr>
                        <td scope="col">{{$row->name}}</td>
                        <td scope="col">{{$row->present}}</td>
                        <td scope="col">{{$row->total_class}}</td>
                        <td scope="col">{{$perc}}</td>
                        
    
                 </tr>
                @endforeach
    </tbody>
    </table>
    @if(count($users) > 0)
   
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