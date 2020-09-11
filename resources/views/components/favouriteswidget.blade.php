@if($favouriteswidget != false)
	<h2>My Favourites</h2>
	
	@if(count($favouriteswidget) > 0)
		<ul>
			@foreach($favouriteswidget as $Favourite)
				<a href="/jobs/{{$Favourite->Job->id}}"><li>{{$Favourite->Job->title}}</li></a>
			@endforeach
		</ul>
	@else
		<p>You have not saved any favourites
	@endif
@endif