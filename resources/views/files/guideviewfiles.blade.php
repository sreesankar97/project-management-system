@extends('layouts.lay-faculty')

@section('content')
<html>
<div>


<body>

          
        @if(session()->has('message'))
        <div class="alert alert-success">
          {{ session()->get('message') }}
         </div>
        @endif
        
        @if(session()->has('msg'))
        <div class="alert alert-danger">
          {{ session()->get('msg') }}
         </div>
        @endif
    

		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
		@if(count($file) > 0)
			<div class="panel-body">
				<table class="table table-bordered">
                        <div class="panel-heading">
                               
                               
                            </div>
					<thead>
						<th>Title</th>
						<th>Upload Date</th>
                        <th>Action</th>
                        <th>Approval Status</th>
                        
					</thead>

					<tbody>

					@foreach($file as $down)
						<tr>
							<td>{{$down->filename}}</td>
							<td>{{$down->created_at}}</td>
							<td>
							<a href="/storage/proforma/{{$down->filename}}" download="{{$down->filename}}">
								<button type="button" class="btn btn-primary">
								<i class="glyphicon glyphicon-download">
									
									Download
								</i>
								</button>
							</a>
                            </td>
                            <td>
                               
                                    <a href="/fileapprove/{{$down->file_id}}" onclick="return confirm('Are you sure? Do you want to approve the selected file?')">
                                        <button type="button" class="w3-button w3-green">
                                        <i class="glyphicon glyphicon-ok"> 
                                         
                                          Approve
                                        </i>
                                        </button>
                                    </a>

                                    <a href="/filereject/{{$down->file_id}}" onclick="return confirm('Are you sure? Do you want to Reject the selected file?')">
                                    <button type="button" class="w3-button w3-red">
                                    <i class="glyphicon glyphicon-remove"> 
                                      Reject
                                    </i>
                                    </button>
                                </a>
                                </td>
                            
						</tr>
					@endforeach
					</tbody>
				</table>
			
				@else

				<strong> <i> No pending files found </i> </strong>
				<br>
				<br>
                @endif
          
            
                @if(count($file_verified)>0)
                <div class="panel-body">
                        <table class="table table-bordered">
                                <div class="panel-heading">
                                       <strong> Files Verified </strong>
                                       
                                    </div>
                            <thead>
                                <th>Title</th>
                                <th>Upload Date</th>
                                <th>Action</th>
                            </thead>
        
                            <tbody>
        
                            @foreach($file_verified as $down)
                                <tr>
                                    <td>{{$down->filename}}</td>
                                    <td>{{$down->created_at}}</td>
                                    <td>
                                    <a href="/storage/proforma/{{$down->filename}}" download="{{$down->filename}}">
                                        <button type="button" class="btn btn-primary">
                                        <i class="glyphicon glyphicon-download">
                                            
                                            Download
                                        </i>
                                        </button>
                                    </a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    



                @endif

			</div>
			
	
        
</body>
</div>
</html>
@endsection