@extends('layouts.details') 

@section('title', $album['name'])

@section('breadcrumb')
	@include('widgets.breadcrumb', ['items' => ['Album' => route('album.details', ['id' => $album['id']])]])
@endsection



@section('content')

	<div class="row">
	
	<div class="col-md-6">
		@include('widgets.avatar', ['image' => $album['images'][1] ?? null] )
	
	</div>
	
	<div class="col-md-6">
		<h1>
		{{ $album['name'] }}
		</h1>
	</div>
	
</div>

<ul class="list-group list-group-flush">



<li class="list-group-item">

                <h3>Album Type</h3>
                
                <b>
                    {{$album['album_type']}}
                </b>
                
     

<li class="list-group-item">

                <h3>Total Tracks</h3>
                
                <b>
                    {{$album['total_tracks']}}
                </b>
                
     

<li class="list-group-item">

                <h3>Album Release Date</h3>
                
                <b>
                    {{$album['release_date']}}
                </b>
                
     

<li class="list-group-item">
                
                <h3>Artists</h3>
               
                    @foreach($album['artists'] as $a)
                      <a class="btn btn-primary" href="{{ route('artist.details', ['id' => $a['id']]) }}">{{$a['name']}}</a>
                    @endforeach
      

<li class="list-group-item">

                <h3>Tracks</h3>
                
                @foreach($album['tracks']['items'] as $t)
                      <a class="btn btn-primary" href="{{ route('track.details', ['id' => $t['id']]) }}">{{$t['name']}}</a>
                    @endforeach
                
</ul>


@endsection
