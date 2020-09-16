@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h2>{{ __('Conversation') }}</h2></div>

                <div class="card-body">
				<hr>
				@if(count($Thread->Messages) > 0)
	
		<table>
			@foreach($Thread->Messages as $Message)
				<tr>
					<th style="padding-right: 10px;">{{$Message->User->name}} : </th>
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
	
				
                
                </div>
            </div>
        </div>
    </div>
</div>
@endsection