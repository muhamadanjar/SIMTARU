@extends('app2');

@section('content')

	@if(count($data))
	<ul>
		@foreach($data as $people)
			<li>{{ $people }}</li>
		@endforeach
	</ul>
	@endif

@stop