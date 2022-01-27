@extends('layouts.base')


@section('content')

	<div>
		<label for="search-box"><img alt="logo" src="/img/logo.svg"
			class="img" /></label>
	</div>


	<div class="col-xs-12 col-md-8 mb-5">
		<form class="position-relative" action="/search">
			<input id="search-box" value="{{ $query }}"
				class="form-control me-2 rounded-pill position-absolute"
				name="q" type="text" placeholder="Search for music .." required>
			<button type="submit"
				class="btn btn-primary rounded-pill position-absolute end-0">Submit</button>

		</form>
	</div>
	
	 @section('results') @show
	@endsection
	
	

