@extends('layouts.details') 

@section('title', $artist['name'])

@section('breadcrumb')
	@include('widgets.breadcrumb', ['items' => ['Artist' => route('artist.details', ['id' => $artist['id']])]])
@endsection

@section('content')


	<div class="row">
	
	<div class="col-md-6">
	@include('widgets.avatar', ['image' => $artist['images'][0] ??  null] )
	
	</div>
	
	<div class="col-md-6">
		<h1>
		{{ $artist['name'] }}
		</h1>
	</div>
	
</div>


<ul class="list-group list-group-flush">

<li class="list-group-item">

                <h3>Popularity</h3>
                
                <b>
                    {{$artist['popularity']}}
                </b>
                
                              
<li class="list-group-item">

                <h3>Followers</h3>
                
                <b>
                    {{$artist['followers']['total']}}
                </b>
 
 @if (!empty($artist['genres']))
              
<li class="list-group-item">
                
                <h3>Genres</h3>
                    @foreach($artist['genres'] as $g)
                       <b class="badge bg-primary my-3">{{$g}}</b>
                    @endforeach

@endif      
      
@if (isset($artist['uri'])) 
                               
<li class="list-group-item">

                <h3>Website</h3>
                
                <a href="{{$artist['external_urls']['spotify']}}" rel="noopener" target="_blank">
                    {{$artist['external_urls']['spotify']}}
                </a>
@endif              
                
</ul>


@endsection
