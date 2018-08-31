<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Admin') }}</title>

        <script src="{{ asset('js/app.js') }}" defer></script>

        <link rel="dns-prefetch" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('css/nav-bar.css') }}" rel="stylesheet">
        <link href="{{ asset('css/create-parking-model.css') }}" rel="stylesheet">
    </head>
    <body>
        <div id="wrapper">
            <div id="sidebar-wrapper">
                <ul class="sidebar-nav">
                    <li class="sidebar-brand">
                        <a href="{{ route('admin') }}">
                            Admin panel
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('home') }}">Back to main page</a>
                    </li>
                    <li>
                        <a href="{{ route('manage-price') }}">Manage prices</a>
                    </li>
                    <li>
                        <a href="{{ route('parking-model') }}">Manage parking models</a>
                    </li>
                    <li>
                        <a href="{{ route('parking-space') }}">Manage parking spaces</a>
                    </li>
                    <li>
                        <a href="{{ route('manage-user') }}">Manage users</a>
                    </li>
                </ul>
            </div>
            <div id="page-content-wrapper">
                <div class="container-fluid">
                    @if (isset($errors) && $errors->count())
                        <div class="alert alert-danger">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <ul class="list-unstyled">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>
                @include('flash::message')
                <div class="container-fluid">
                    @yield('content')
                </div>
            </div>
        </div>
    </body>
</html>
