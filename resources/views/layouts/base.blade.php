<!DOCTYPE html>
<html lang="en">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- CSS only -->
<link
	href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
	rel="stylesheet"
	integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
	crossorigin="anonymous">
<!-- JavaScript Bundle with Popper -->
<script
	src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
	integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
	crossorigin="anonymous" async></script>
	
	
<title>@yield('title') - Code Challenge</title>
<style>
body a {text-decoration: none}
.filler {background-color: #09bc97; display: inline-block; width: 90px; height: 90px}
a.d-block span {line-height: 90px;  vertical-align: bottom;}
a.btn {margin: .5rem .1rem}

@yield('style')
</style>

<body>

@section('breadcrumb') @show

	<div class="px-4 py-5 my-5 text-center container">
		<div class="row justify-content-center">@section('content') @show</div>
	</div>
	