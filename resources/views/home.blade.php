@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><a href="home">{{ __('Dashboard') }}</a></div>

                <div class="card-body">
                <ul>
					@if(count($usermenu) >= 1)
						@foreach($usermenu as $Link => $MenuItem)
							<p><a href="{{$Link}}"><li><h5>{{$MenuItem}}<h5></li></a></p>
						@endforeach
					@endif
					</ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
