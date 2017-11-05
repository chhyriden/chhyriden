<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Dashboard</title>
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @yield('styles')
</head>
<body> 
    <div id="manage">
        <div class="columns">
            <div class="column">
                @include('include.nav.topnav')
            </div>
        </div>
        <div class="columns manage-body">
            <div class="column is-2 p-r-15">
                @include('include.nav.manage-left')
            </div>
            <div class="column p-l-15">
                @yield('content')
            </div>
        </div>
    </div>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    @yield('scripts')
</body>
</html>
