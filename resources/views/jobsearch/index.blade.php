@extends('layouts.app')
	
@section('content')

	<h2>Jobs</h2>
	
	<hr>
	
	@if(count($Jobs) > 0)
	
		@foreach($Jobs as $Job)
		
			<a href="/jobs/{{$Job->id}}"><h4>{{$Job->title}}</h4></a>
			<p>Budget: $ {{$Job->budget}}
			<p>{{$Job->description}}
			
			<hr>
		@endforeach
	
	@endif
	
		
@endsection