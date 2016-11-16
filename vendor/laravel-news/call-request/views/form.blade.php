@extends('layouts.app')

@section('content')
    <div class="container">
  
  
		<div class="panel panel-default">
			<div class="panel-heading">
				New Link
			</div>

			<div class="panel-body">
				<!-- New Link Form -->
				<form action="{{route('call_request_create')}}" method="POST" class="form-horizontal" id="shortlinkForm">
					<input type="hidden" name="_token" value="{{csrf_token()}}">

					<!-- Link URL -->
					<div class="form-group">
						<label for="link_url" class="col-sm-3 control-label">Original Link</label>

						<div class="col-sm-6">
							<input type="text" name="orig_url" id="link_url" class="form-control" value="">
						</div>
					</div>

					<!-- Add Task Button -->
					<div class="form-group">
						<div class="col-sm-offset-3 col-sm-6">
							<input type="submit" class="btn btn-default" id="submitForm" value="Create Short Link" />
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
@endsection			
		

				
			
