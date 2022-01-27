@extends('layouts.base')


@section('style', <<<'DOC'
img {width: 60%} 
.filler {width: 300px; height: 300px; background-color: blue} 
h1{ margin-top: 25%; font-weight: 900; font-size: 3.1rem; text-transform: capitalize}
.badge {font-size: 1em}
body{padding:.2em}
DOC)

@section('content')



	<div>
		<label for="search-box"><img alt="logo" src="/img/logo.svg"
			class="img" /></label>
	</div>

	@section('header') @show
	
	@endsection
	
	

