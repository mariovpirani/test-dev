<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <title>{{$titlePage}}</title>
    @include('_inc.header')
</head>
<body>
  @include('_inc.menu')
  @include('_inc.home')
  @include('_inc.footer')


</body>
</html>
