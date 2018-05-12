@extends('layouts.user')

@section('content')
@if(count($downloads)!=0)
<html>
<div>


<body>

		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	
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

					@foreach($downloads as $down)
						<tr>
							<td>{{$down->filename}}</td>
							<td>{{$down->created_at}}</td>
							<td>
							<a href="storage/proforma/{{$down->filename}}" download="{{$down->filename}}">
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

			</div>
	
        
</body>
</div>
</html>
@endif
<div class="panel-body">
        @if(Session::has('success'))
        <p class="alert alert-success">{{ Session::get('success') }}</p>
	   @elseif(Session::has('proformasuccess'))
	<p class="alert alert-success">{{ Session::get('proformasuccess') }}</p>
@endif
</div>

<div class="container">
    
<div class="col-md-8">
<h2>Upload File</h2>
{!! Form::open(['action' => 'studentcontroller@studentfileupload', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
<div class="form-group">
        {{Form::file('filename')}}
    </div>

    {{ Form::hidden('groupid', $groupid)}}
    {{Form::submit('Submit', ['class'=>'btn btn-primary'])}}
{!! Form::close() !!}
</div>

</div> &nbsp;
<a href="/uploadproforma/{{$groupid}}"><i>click here to Submit proforma</i></a>





@endsection 

