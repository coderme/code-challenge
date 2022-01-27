@extends('layouts.search') 

@section('title', 'Search results')
@section('style', '.tab-content img { width: 90px; height: 90px}')

@section('results')

<ul class="nav nav-tabs col-s-12 col-md-8" id="results" role="tablist">
	<li class="nav-item" role="presentation">
		<button class="nav-link active" id="tracks-tab" data-bs-toggle="tab"
			data-bs-target="#tracks" type="button" role="tab"
			aria-controls="tracks" aria-selected="true">Tracks</button>
	</li>
	<li class="nav-item" role="presentation">
		<button class="nav-link" id="albums-tab" data-bs-toggle="tab"
			data-bs-target="#albums" type="button" role="tab"
			aria-controls="albums" aria-selected="false">Albums</button>
	</li>
	<li class="nav-item" role="presentation">
		<button class="nav-link" id="artists-tab" data-bs-toggle="tab"
			data-bs-target="#artists" type="button" role="tab"
			aria-controls="artists" aria-selected="false">Artists</button>
	</li>
</ul>


<div class="tab-content col-s-12 col-md-8 text-start" id="myTabContent">

	<div class="tab-pane fade show active" id="tracks" role="tabpanel"
		aria-labelledby="tracks-tab">

		@if (empty($tracks['items'])) No track found :( @endif

		@foreach($tracks['items'] as $item) <a class="d-block my-3"
			href="{{ route('track.details', ['id' => $item['id']]) }}">
			
			@include('widgets.avatar', ['image' => $item['album']['images'][2] ??  null] )
			
			<span class="my-5">{{
				$item['name'] }}</span>
		</a> @endforeach

	</div>


	<div class="tab-pane fade" id="albums" role="tabpanel"
		aria-labelledby="albums-tab">
		
		@if (empty($albums['items'])) No Album found :( @endif

		@foreach($albums['items'] as $item) <a class="d-block my-3"
			href="{{ route('album.details', ['id' => $item['id']]) }}"> 
			
			@include('widgets.avatar', ['image' => $item['images'][2] ??  null] )
			
			<span class="my-5">{{
				$item['name'] }}</span>
		</a> @endforeach
		
		</div>


	<div class="tab-pane fade" id="artists" role="tabpanel"
		aria-labelledby="artists-tab">
		
		@if (empty($artists['items'])) No tracks found :( @endif

		@foreach($artists['items'] as $item) <a class="d-block my-3"
			href="{{ route('artist.details', ['id' => $item['id']]) }}"> 
			
			@include('widgets.avatar', ['image' => $item['images'][2] ??  null] )
			
			<span class="my-5">{{
				$item['name'] }}</span>
		</a> @endforeach
		
		
		
		</div>

</div>


@endsection
