<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
</head>
<body>
    <ul>
        {{-- <li><a href="{{route('pages.index')}}">pages</a></li>
        <li><a href="{{route('pages.login')}}">login</a></li>
        <li><a href="{{route('pages.register')}}">register</a></li> --}}
    </ul>

    @yield('text')
    <br>
    {{-- @yield('footer') --}}
</body>
</html>