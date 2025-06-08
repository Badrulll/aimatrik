<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="GOVAIHEI Login App">
    <meta name="author" content="GOVAIHEI Team">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="robots" content="noindex, nofollow">
    <title>{{ config('app.name', 'Laravel') }} - @yield('title')</title>
    @include('errors.layouts._css')
</head>

<body>
    <div id="error">
        @yield('content')
    </div>
    @include('errors.layouts._js')
</body>


</html>
