<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Parking - Admin Panel</title>

        <link rel="dns-prefetch" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.min.js"></script>

        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('css/nav-bar.css') }}" rel="stylesheet">
        <link href="{{ asset('css/conversation.css') }}" rel="stylesheet">
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
                        <a href="{{ route('parking-model') }}">Parking models</a>
                    </li>
                    <li>
                        <a href="{{ route('customer.index') }}">Customers</a>
                    </li>
                    <li>
                        <a href="{{ route('reservation.index') }}">Reservations</a>
                    </li>
                    <li>
                        <a href="{{ route('chat.index') }}">Support chat</a>
                    </li>
                    <li>
                        <a href="{{ route('activity_log.index') }}">Activity logs</a>
                    </li>
                    <li>
                        <a href="{{ route('home') }}">Back to main page</a>
                    </li>
                </ul>
            </div>
            <div id="page-content-wrapper">
                @if (isset($errors) && $errors->count())
                    <div class="alert alert-danger">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <ul class="list-unstyled">
                            @foreach ($errors->all() as $error)
                                <li>{!! $error !!}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                @include('flash::message')
                @yield('content')
            </div>
            <script src="{{ asset('js/app.js') }}"></script>
            @stack('scripts')
        </div>
    </body>
</html>
