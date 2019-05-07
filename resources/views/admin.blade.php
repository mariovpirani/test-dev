<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	<title>{{$titlePage}}</title>
	@include('_inc.header')
</head>
<body>
	@include('_inc.menu')
		@if(isset($ticketReturn))
			@include('_inc.admin.admin')
		@endif

		@if(isset($ticketSearch))
			@include('_inc.admin.adminSearch')
		@endif
		@if(isset($ticketView))
			@include('_inc.admin.ticketView')
		@endif


	@include('_inc.footer')


</body>
</html>
