<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
<div id="app">
    <v-app>

        <v-card
            color="grey lighten-4"
            flat
            height="50px"
            tile
        >
            <v-toolbar dense >
                <v-app-bar-nav-icon></v-app-bar-nav-icon>
                <v-toolbar-title>
                    {{ config('app.name', 'Jobs') }}
                </v-toolbar-title>

                <v-spacer></v-spacer>

                @guest
                    <a style="margin-right: 10px" href="{{route('login')}}">Login</a>
                    @if (Route::has('register'))
                        <a href="{{route('register')}}">Register</a>
                    @endif
                @else
                    <v-menu
                        offset-y
                        bottom
                        transition="slide-y-transition"
                    >
                        <template v-slot:activator="{on,attrs}" >
                            <v-btn
                                class="purple"
                                color="primary"
                                dark
                                v-bind="attrs"
                                v-on="on"
                            >{{ Auth::user()->name }}</v-btn>
                        </template>
                        <v-list>
                            <v-list-item>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </v-list-item>
                        </v-list>
                    </v-menu>
                @endguest




            </v-toolbar>
        </v-card>


        <main class="py-4">
            @yield('content')
        </main>
    </v-app>
</div>
</body>
</html>

