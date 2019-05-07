<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <title>{{$titlePage}}</title>
    @include('_inc.header')
</head>
<body>
  @include('_inc.menu')

  @if(isset($ticketView))
  	 @include('_inc.ticketView')
  @endif

  @include('_inc.footer')
</body>
</html>
