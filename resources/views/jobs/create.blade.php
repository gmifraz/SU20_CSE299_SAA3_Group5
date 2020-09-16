@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h2>{{ __('Post a Job') }}</h2></div>

                <div class="card-body">
				{{Form::open(['action' => 'JobsController@store'])}}
	
					<div class="form-group">
							{{Form::label('title','Job Title')}}
							{{Form::text('title','', ['class' => 'form-control', 'placeholder' => 'Job Title'])}}
					</div>
					<div class="form-group">
							{{Form::label('category','Job Category')}}
							{{Form::text('category','', ['class' => 'form-control', 'placeholder' => 'Job Category'])}}
					</div>
		
				<div class="form-group">
							{{Form::label('description','Job Description')}}
							{{Form::textArea('description','', ['class' => 'form-control', 'placeholder' => 'Job Description'])}}
				</div>
		
				<div class="form-group">
						{{Form::label('budget','Job Budget')}}
						{{Form::number('budget','', ['class' => 'form-control', 'placeholder' => 'Budget - $', 'step' => 'any'])}}
				</div>
				    	{{Form::submit('Create Job', ['class' => 'btn btn-primary'])}}
						{{Form::close()}}
                
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
