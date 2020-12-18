<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/main.css') }}">

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            <main>
                <header style="background: azure">
                    <div class="py-3" style="width: 90%; margin: 0 auto; display: flex; align-items: center; justify-content: space-between">
                        <a href="/tweets">
                            <span class="text-2xl font-bold" style="color: purple">Tweets</span>
                        </a>
                        <div>
                            <div>

                                <form method="POST" action="{{route('logout')}}">
                                    @csrf
                                    <button type="submit">Log Out</button>
                                </form>
                            </div>

                        </div>

                    </div>
                </header>
                <section class="global_wrapper justify-between">
                    <div class="lg:w-32">
                        @include('_sidebar-links')
                    </div>
                    <div class="lg:flex-1 lg:mx-10 justify-center" style="max-width: 700px">
                        @yield('content')
                    </div>
                    <div class="lg:w-1/6 rounded-lg p-4">
                        <div class="bg-blue-100  rounded-lg p-4">
                            @include('_friends')
                        </div>
                    </div>

                </section>

            </main>
        </div>
    </body>
</html>
