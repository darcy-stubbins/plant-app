<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-light bg-light py-3">
            <div class="container-fluid">
                @guest
                    <a class="navbar-brand">Welcome</a>

                    <ul class="navbar-nav list-group-horizontal gap-4 px-5">
                        @if (Route::has('login'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">Login</a>
                            </li>
                        @endif

                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">Register</a>
                            </li>
                        @endif
                    </ul>
                @else
                    <a class="navbar-brand" href="/">Home</a>

                    {{-- search bar --}}
                    <ul class="navbar-nav list-group-horizontal gap-4 px-5">
                        <li class="nav-item">
                            <form class="d-flex">
                                <input class="form-control me-2" type="search" placeholder="Search for plants"
                                    aria-label="Search">
                                <button class="btn-1" type="submit">Search</button>
                            </form>
                        </li>
                    </ul>

                    {{-- navbar dropdown --}}
                    <ul class="navbar-nav list-group-horizontal gap-4 px-5">
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="position-absolute dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                {{-- profile option  --}}
                                <a class="dropdown-item" href="{{ route('profile') }}">
                                    Profile
                                </a>

                                <hr class="dropdown-divider">

                                {{-- logout option  --}}
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                  document.getElementById('logout-form').submit();">
                                    Logout
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    </ul>
                @endguest
            </div>
        </nav>


        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>

</html>
