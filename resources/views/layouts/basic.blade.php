<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', env('app.name'))</title>
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
</head>

<body>
    <header>
        <nav>
            @auth
                <a id="logout-button" href="javascript:void()">Exit</a>
                <form id="logout" class="hidden" method="post" action="{{ route('logout') }}">
                    @csrf
                </form>
                <script>
                    const logout_button = document.querySelector('#logout-button');
                    const logout_form = document.querySelector("#logout")

                    logout_button.addEventListener("click", (event) => {
                        event.preventDefault();
                        logout_form.submit();
                    });
                </script>
                <a href="{{ route('order.create') }}">Create Order</a>
            @endauth
            @guest
                <a href="{{ route('register.index') }}">Register</a>
                <a href="{{ route('login.index') }}">Login</a>
            @endguest
        </nav>
        @auth
                <h1 class="text-center">Добро пожаловать: {{ Auth::user()->email }}</h1>
        @endauth
    </header>
    @yield('content')

</body>

</html>
