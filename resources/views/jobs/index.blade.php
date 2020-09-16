@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h2>{{ __('My Jobs') }}</h2></div>

                <div class="card-body">
				<hr>
	
				@if(count($Jobs) > 0)
	
					@foreach($Jobs as $Job)

					<a href="/jobs/{{$Job->id}}"><h4>{{$Job->title}}</h4></a>
					<p>Budget: $ {{$Job->budget}}</p>
					<p>{{$Job->description}} </p>

                    <a class="btn btn-primary" href="/jobs/{{$Job->id}}/edit">
                                        Edit This Job
                                    </a>

			
					<hr>
				@endforeach
	
	@endif
                
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
