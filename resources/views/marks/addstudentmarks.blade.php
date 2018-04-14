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
             <th>1st Review Marks</th>
             <th>2nd Review Marks</th>
                 <th>Final Marks</th>
                 <th>Guide Marks</th>
            </tr>   
    </thead>
    <tbody>      
    @foreach($users as $row)
            
            <?php $perc = ( $row->present / $row->total_class )*100; 
                  $perc=number_format($perc,2,'.',',') ?>
            
            <tr>
                        <td scope="col">{{$row->name}}</td>
                        <td scope="col">{{$row->review1}}</td>
                        <td scope="col">{{$row->review2}}</td>
                        <td scope="col">{{$row->final}}</td>
                        <td scope="col">{{$row->guide_marks}}</td>
                        
                        
                        
    
                 </tr>
                @endforeach
    </tbody>
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
                                <p> <strong> <a href="/eachmarks/{{$user->email}}">{{$user->name}}</a></strong></p>
                                </div>
                                @endforeach
                           
                        </div>
                            
                        
     
                

    
<div class="col-md-2"></div>

    @else
        <p>No Teams found</p>
    @endif


<div class="panel-body">
    <br>
    @if(Session::has('success'))
    <p class="alert alert-success">{{ Session::get('success') }}</p>
@endif

            </div>
           

        <h2>  Add marks for {{$student[0]->name}}</h2>

       
          {!! Form::open(['action' => 'AdminController@firstreviewmarks', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
            <div class="form-group">
                    
                    {{ Form::hidden('userid', $student[0]->email)}}
             
             </div>
             <div class="col-md-2">
            <div class="form-group">
                {{Form::label('label1', '1st Review Marks')}}
                {{Form::text('first', '', ['class' => 'form-control', 'placeholder' => '1st Review Marks'])}}
               <br> {{Form::submit('ADD/UPDATE', ['class'=>'btn btn-primary'])}}
              
            </div></div>
            {!! Form::close() !!}
       

        

            {!! Form::open(['action' => 'AdminController@secondreviewmarks', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
            
            <div class="form-group">
                    {{ Form::hidden('userid', $student[0]->email)}}
                    <div class="col-md-2">
                    {{Form::label('label2', '2nd Review Marks')}}
                    {{Form::text('second', '', ['class' => 'form-control', 'placeholder' => '2nd Review Marks'])}}
                        
                 <br>   {{Form::submit('ADD/UPDATE', ['class'=>'btn btn-primary'])}}
                </div> </div>
                {!! Form::close() !!}
        

                {!! Form::open(['action' => 'AdminController@finalreviewmarks', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
            
                <div class="form-group">
                        {{ Form::hidden('userid', $student[0]->email)}}
                        <div class="col-md-2">
                        {{Form::label('label2', 'Final Review Marks')}}
                        {{Form::text('final', '', ['class' => 'form-control', 'placeholder' => 'Final Review Marks'])}}
                      <br>  {{Form::submit('ADD/UPDATE', ['class'=>'btn btn-primary'],['name'=>'form3'])}}
                      
                     </div> </div>
        

                
             
            {!! Form::close() !!}

            

            

              
           
     
@endsection