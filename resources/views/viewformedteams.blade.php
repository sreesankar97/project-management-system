@extends('layouts.lay-admin')
@section('content')
<head>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/css/bootstrap-select.min.css">
    
        <!-- Latest compiled and minified JavaScript -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/js/bootstrap-select.min.js"></script>
        
        <!-- (Optional) Latest compiled and minified JavaScript translation files -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/js/i18n/defaults-*.min.js"></script>
        
    </head>
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
          h2 {
   color: Grey;
   font-family: Trebuchet MS;
 }

          
          </style>
          @if(Session::has('teamsuccess'))
          <p class="alert alert-success">{{ Session::get('teamsuccess') }}</p>
          @endif
          
          
<h2>
    &nbsp &nbsp&nbspTeams Approved</h2>
          
<div class="col-md-14">
           
        @for($i=0;$i<120;$i++)  
         &nbsp 
        @endfor
       
        

&nbsp 
<a href="/deleteteam" onclick="return confirm('Are you sure? Do you want to approve the selected group?')">
<button type="button" class="w3-button w3-red">Delete all</button>

</a>


</div>
<br>
@if(count($users) > 0)
    @foreach($users as $team)
    <div class="col-md-2 col-sm-3">
        <div class="well">
            <div class="row">
                
                

                    <div class='col-xs-10'>
                    <p> <strong> <a href="/formedteams/{{$team->groupid}}"> 
                    Group No: {{$team->groupid}}</a></strong></p>
                  
                   
                    @foreach($members as $member)
                    @if($member->groupid == $team->groupid)
                    <div class="col-md-15 col-sm-15">
             
                    <p><i><strong> {{ $member->name}} </strong></i></p>
                    
                    
            </div>
                    
                    @endif
       
    
                
                    @endforeach 
           
                   


                    
                    </div>
                    
                   
                    
                    
                    
                </div>
            </div>
        </div>
    @endforeach
   
   

@else
    <p>No Teams found</p>
    
@endif

@endsection