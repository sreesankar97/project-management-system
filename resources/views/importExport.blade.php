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
.btn{
                color: black;
                text-decoration: none;
                border: #ccc 1px solid;
                padding: 10px 15px;
                border-radius: 8px;
                line-height: 4em;

            }
</style>

<?php $count=count($users) ;
$sorted=count($sorted) ; ?>


@if($count==0 && $sorted==0)


	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" >






	<div class="container">

		<div class="panel panel-primary">

		  <div class="panel-heading">

		    <h3 class="panel-title" style="padding:12px 0px;font-size:25px;"><strong> Import export csv or excel file </strong></h3>
				<h3 class="panel-title" style="padding:12px 0px;font-size:25px;"><strong> (CSV/exel Format('name','email','rollno','cgpa'))</strong></h3>
		  </div>

		  <div class="panel-body">



		  		@if ($message = Session::get('success'))

					<div class="alert alert-success" role="alert">

						{{ Session::get('success') }}

					</div>

				@endif








			<h3>Import File Form:</h3>

				<form style="border: 4px solid #a1a1a1;margin-top: 15px;padding: 20px;" action="{{ URL::to('admin/importExcel') }}" class="form-horizontal" method="post" enctype="multipart/form-data">



					<input type="file" name="import_file" />

					{{ csrf_field() }}

					<br/>



					<button class="btn btn-primary">Import CSV or Excel File</button>



				</form>

				<br/>




		    	<!--<h3>Import File From Database:</h3>

		    	<div style="border: 4px solid #a1a1a1;margin-top: 15px;padding: 20px;">

			    	<a href="{{ url('downloadExcel/xls') }}"><button class="btn btn-success btn-lg">Download Excel xls</button></a>

					<a href="{{ url('downloadExcel/xlsx') }}"><button class="btn btn-success btn-lg">Download Excel xlsx</button></a>

					<a href="{{ url('downloadExcel/csv') }}"><button class="btn btn-success btn-lg">Download CSV</button></a>

				</div>-->



		  </div>

		</div>

	</div>
	@elseif($count > 0)
  <div class="panel-body">
      <br>

      @if(Session::has('msg'))
	  <p class="alert alert-danger">{{ Session::get('msg') }}</p>
	  @endif


 
   </div>

	<table style="width:100%">

	        <tr>
	            <th>Name</th>
	             <th>Email Id</th>
	             <th>RollNo</th>
	                 <th>CGPA</th>
	            </tr>
							@foreach($users as $row)
							<tr>
													<td>{{$row->name}}</td>
													<td>{{$row->email}}</td>
													<td>{{$row->rollno}}</td>
													<td>{{$row->cgpa}}</td>


									 </tr>
								    @endforeach
	    </table>

               {!! Form::open(['action' => 'MaatwebsiteDemoController@team', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
               <div class="form-group">

                       {{ Form::hidden('count', $count)}}

                </div>
                <div class="col-md-2">
               <div class="form-group">
                   {{ Form::hidden('count', $count)}}
                   {{Form::label('label1', 'Plese Enter no of Students in a Team!!')}}
                   {{Form::text('studentno', '', ['class' => 'form-control', 'placeholder' => 'No. of Students In Team'])}}
               </div></div>
                 <div class="col-md-6">
                       <br>
                {{Form::submit('Form Teams', ['class'=>'btn btn-primary'])}}
               {!! Form::close() !!}
                   </div>
				 </div>
	@elseif($sorted>0)
	
	<script type="text/javascript">
		window.location = "/admin/viewteamlist";
	</script>

@endif



@endsection
