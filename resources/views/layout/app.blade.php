<!DOCTYPE html>
<html>
<head>
    <title>{{ config('app.name') }} - @yield('pageTitle', 'Accueil')</title>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="_token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href="{{ asset('css/app.css') }}" />

    @stack('css')
</head>
<body>
<div id="app">
    <v-app app>
        <v-container
            fluid
            fill-height
        >
            <v-row>
                <v-col cols="12" align="center" justify="center">
                    <h1 class="mb-10">Test Technique ByNativ</h1>
                    @yield('content')
                </v-col>
            </v-row>
        </v-container>
    </v-app>
</div>

<script src="{{ asset('js/app.js') }}"></script>

@stack('js')
</body>
</html>
