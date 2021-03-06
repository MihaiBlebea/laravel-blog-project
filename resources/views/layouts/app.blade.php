<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- SEO stuff will be injected here -->
    {!! SEO::generate(true) !!}

    <!-- Scripts and tags for tracking -->
    @include('partials._cookie-scripts')

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts, metas and styles you want to put in the head section -->
    @stack('head')

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/timeline.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">

        @include('partials.navigations._main-nav')

        <main class="pb-5 min-h-80" style="padding-top: 80px;">

            @if(Session::has('message'))

                <div class="container">
                    <p class="alert alert-{{ Session::get('alert_class', 'info') }}">{!! Session::get('message') !!}</p>
                </div>

            @endif

            @yield('content')

            <!-- Add the lead capture modal to every page -->
            @include('partials._lead-capture-modal')
        </main>

        @include('partials._footer')

    </div>

    @stack('javascript')
</body>
</html>
