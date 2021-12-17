<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8"/>
        <title>@yield('title')</title>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, user-scalable=no" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        {{--<meta content="width=device-width, initial-scale=1" name="viewport"/>--}}
        <meta http-equiv="Content-type" content="text/html; charset=utf-8">
        <meta content="" name="description"/>
        <meta content="" name="author"/>
        <!-- BEGIN CSS FILES -->
        @include('stylesheets')
        @yield('styles')
    </head>
    <body>
        @yield('content')
        @include('script')
        @yield('scripts')
    </body>
</html>