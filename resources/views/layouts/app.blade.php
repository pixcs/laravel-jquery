<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>


    <!-- Scripts -->
    <script src="{{ asset('js/jquery.js') }}" defer></script>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/datatables.min.js') }}" defer></script>
    <script src="{{ asset('js/main.js') }}" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.tailwindcss.com"></script>

    <link rel="stylesheet" href="/css/app.css">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/datatables.min.css') }}" rel="stylesheet">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/datatables.min.css') }}" rel="stylesheet">
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                        style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>

        {{-- Create New Role Modal --}}
        <div id="create-form" class="relative z-10" aria-labelledby="modal-title" role="dialog" aria-modal="true">

            <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>

            <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
                <div id="backdrop"
                    class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
                    <div
                        class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg">
                        <div class="bg-white px-4 pb-4 pt-5 sm:p-6 sm:pb-4">

                            {{ Form::open(['route' => 'roles.store', 'method' => 'POST', 'id' => 'add-new']) }}
                            <h1 class="text-lg font-bold text-blue-500">Create New Role</h1>
                            <div class="flex items-center my-2">
                                {{ Form::label('name', 'Name:', ['class' => 'p-2 rounded-md w-32 font-bold']) }}
                                {{ Form::text('name', '', ['placeholder' => 'Sonic', 'class' => 'p-2 rounded-md w-full outline-blue-400']) }}
                            </div>
                            <p id="error-name" class="text-red-500 font-semibold text-sm ml-2"></p>
                            <div class="flex items-center my-2">
                                {{ Form::label('display_name', 'Display Name:', ['class' => 'p-2 rounded-md w-32 font-bold']) }}
                                {{ Form::text('display_name', '', ['placeholder' => 'Speed O Sonic', 'class' => 'p-2 rounded-md w-full outline-blue-400']) }}
                            </div>
                            <p id="error-display_name" class="text-red-500 font-semibold text-sm ml-2"></p>
                            <div class="flex items-center my-2">
                                {{ Form::label('description', 'Description:', ['class' => 'p-2 rounded-md w-32 font-bold']) }}
                                {{ Form::text('description', '', ['placeholder' => 'Whats on your mind?', 'class' => 'p-2 rounded-md w-full outline-blue-400']) }}
                            </div>
                            <p id="error-description" class="text-red-500 font-semibold text-sm ml-2"></p>

                            @if (session('success'))
                                <p class="text-green-400 text-xl mb-2">
                                    {{ session('success') }}</p>
                            @endif

                            {{ Form::submit('Add', ['class' => 'bg-blue-500 px-4 py-2 rounded-md text-white hover:bg-blue-600 active:scale-95 transition duration-300 my-2']) }}
                            {{ Form::close() }}
                        </div>
                        <button id="create-close-btn"
                            class="font-bold bg-slate-100 hover:bg-rose-500 hover:text-white hover:scale-105 absolute top-0 right-0 w-8 h-8 p-2 rounded-bl-lg transition duration-200">
                            X
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ mix('js/app.js') }}"></script>
    <script>
        console.log($);
    </script>
</body>

</html>

