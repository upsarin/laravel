@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-sm-offset-2 col-sm-8">
            <div class="panel panel-default">
                <div class="panel-heading">
					<h1>{{ $title['title'] }}</h1>
					@include('call-request::link')
				</div>
			</div>
		</div>
	</div>

@endsection