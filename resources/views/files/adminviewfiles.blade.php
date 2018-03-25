@extends('layouts.lay-admin')

@section('content')
<html>
<div>


<body>

		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
		@if(count($file) > 0)
			<div class="panel-body">
				<table class="table table-bordered">
                        <div class="panel-heading">
                               <strong> Files Uploaded </strong>
                               
                            </div>
					<thead>
						<th>Title</th>
						<th>Upload Date</th>
						<th>Action</th>
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
						</tr>
					@endforeach
					</tbody>
				</table>
			
				@else

				<strong> <i> No files found </i> </strong>
				<br>
				<br>
				@endif
				
				<i>  Note: Only files verified by the guide will appear here </i>

			</div>
			
	
        
</body>
</div>
</html>
@endsection