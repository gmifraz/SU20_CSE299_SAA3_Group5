@extends('layouts.app')
	
@section('content')
	
	<h2>{{$Thread->Job->title}} - Messages </h2>
	<p>{{$Thread->Job->description}}
	
	<hr>
	
	@if(count($Thread->Messages) > 0)
	
		<table>
			@foreach($Thread->Messages as $Message)
				<tr>
					<th style="padding-right: 10px;">{{$Message->User->name}}</th>
					<td>{{$Message->message}}</td>
				</tr>
			@endforeach
		</table>
	@else
		<p>No Messages Found
	@endif
	
	<hr>
	
	{{Form::open(['action' => ['ThreadController@createMessage', $Thread->id], 'method' => 'POST'])}}
		<div class="form-group">
			{{Form::label('message', 'Create a Message')}}
			{{Form::textArea('message', '', ['class' => 'form-control', 'placeholder' => 'Message'])}}
		</div>
		{{Form::submit('Send Message', ['class' => 'btn btn-primary'])}}
	{{Form::close()}}
	
@endsection