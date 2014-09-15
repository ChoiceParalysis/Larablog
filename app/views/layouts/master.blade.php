<!DOCTYPE html>
<html>
<head>
	<link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" type="text/css" href="/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="/css/style.css">
	<title></title>
</head>
<body>

@include('layouts.header')

<div class="container col-md-8 col-md-offset-2">
	@yield('content')
</div><!-- end container -->

</body>
</html>