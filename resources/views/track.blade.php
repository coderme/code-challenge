@extends('layouts.details') 

@section('title', $track['name'])

@section('breadcrumb')
	@include('widgets.breadcrumb', ['items' => ['Track' => route('track.details', ['id' => $track['id']])]])
@endsection


@section('content')

	<div class="row">
	
	<div class="col-md-6">
	
	@include('widgets.avatar', ['image' => $track['album']['images'][1] ?? null] )

	</div>
	
	<div class="col-md-6">
		<h1>
		{{ $track['name'] }}
		</h1>
	</div>
	
</div>

<ul class="list-group list-group-flush">


<li class="list-group-item">

                <h3>Album</h3>
                
                <b>
                    {{$track['album']['name']}}
                </b>
                
     

<li class="list-group-item">

                <h3>Album Release Date</h3>
                
                <b>
                    {{$track['album']['release_date']}}
                </b>
                
     

<li class="list-group-item">
                
                <h3>Artists</h3>
               
                    @foreach($track['artists'] as $a)
                       <b class="badge bg-primary my-3">{{$a['name']}}</b>
                    @endforeach
      

<li class="list-group-item">

                <h3>Duration</h3>
                
                <b>
                    {{$track['duration_ms']/1000}} seconds
                </b>
                
    
@if ($track['explicit'])            
     
<li class="list-group-item">

      <h3 class="badge bg-danger my-3">Explicit</h3>
                
@endif
               
                
</ul>


@endsection
