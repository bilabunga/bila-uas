<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event Kampus</title>

    @vite(['resources/sass/app.scss','resources/js/app.js'])
</head>
<body>

<nav class="navbar">

    <div class="logo">
        <a href="{{ route('home') }}">Event Kampus</a>
    </div>

    <ul class="nav-menu">
        <li><a href="{{ route('home') }}">Home</a></li>
        <li><a href="{{ route('user.events.index') }}">Event</a></li>
        <li><a href="{{ route('user.registrations.index') }}">Riwayat</a></li>
        <li><a href="{{ route('user.about') }}">Tentang</a></li>
        <li><a href="{{ route('user.contact') }}">Kontak</a></li>
    </ul>

    <div class="nav-right">

        @auth
            <span class="user-name">
                Halo, {{ Auth::user()->name }}
            </span>

            <form action="{{ route('logout') }}" method="POST">
                @csrf

                <button class="logout-btn">
                    Logout
                </button>
            </form>
        @else

            <a href="{{ route('login') }}" class="login-btn">
                Login
            </a>

        @endauth

    </div>

</nav>

<div class="content">

    @yield('content')

</div>

</body>

<style>

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:Poppins,sans-serif;
}

body{
    background:#f4f7fb;
}

.navbar{
    height:70px;
    background:white;
    display:flex;
    justify-content:space-between;
    align-items:center;
    padding:0 60px;
    box-shadow:0 2px 15px rgba(0,0,0,.08);
}

.logo a{
    text-decoration:none;
    font-size:24px;
    font-weight:bold;
    color:#2563eb;
}

.nav-menu{
    display:flex;
    list-style:none;
    gap:35px;
}

.nav-menu a{
    text-decoration:none;
    color:#334155;
    font-weight:500;
}

.nav-menu a:hover{
    color:#2563eb;
}

.nav-right{
    display:flex;
    align-items:center;
    gap:15px;
}

.user-name{
    color:#334155;
    font-weight:600;
}

.login-btn,
.logout-btn{
    background:#2563eb;
    color:white;
    border:none;
    text-decoration:none;
    padding:10px 18px;
    border-radius:8px;
    cursor:pointer;
    font-weight:600;
}

.login-btn:hover,
.logout-btn:hover{
    background:#1d4ed8;
}

.content{
    padding:40px 70px;
}

@media(max-width:768px){

    .navbar{
        flex-direction:column;
        height:auto;
        padding:20px;
        gap:20px;
    }

    .nav-menu{
        flex-wrap:wrap;
        justify-content:center;
        gap:20px;
    }

    .content{
        padding:25px;
    }

}

</style>

</html>