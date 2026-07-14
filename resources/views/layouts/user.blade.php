<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event Kampus</title>

     <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

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
    font-family:'Poppins',sans-serif !important;
}

body{
    background:#F8F5F2;
    font-family:'Poppins',sans-serif !important;
    font-weight:400;
}

/* ===== NAVBAR ===== */

.navbar{
    height:75px;
    background:#ffd5b6;
    display:flex;
    justify-content:space-between;
    align-items:center;
    padding:0 60px;
    border-bottom:1px solid #EEE4DB;
    box-shadow:0 5px 15px rgba(0,0,0,.05);
}

.logo a{
    font-size:28px;
    font-weight:700 !important;
    color:#6F4E37;
    text-decoration:none;
}

.nav-menu{
    display:flex;
    list-style:none;
    gap:35px;
}

.nav-menu a{
    color:#8B7A6B;
    text-decoration:none;
    font-weight:500 !important;
    transition:.3s;
}

.nav-menu a:hover{
    color:#B88A6D;
}

.nav-right{
    display:flex;
    align-items:center;
    gap:15px;
}

.user-name{
    color:#6F4E37;
    font-weight:600 !important;
}

.login-btn,
.logout-btn{
    background:#B88A6D;
    color:#fff;
    border:none;
    border-radius:10px;
    padding:10px 18px;
    text-decoration:none;
    font-weight:600 !important;
    cursor:pointer;
    transition:.3s;
}

.login-btn:hover,
.logout-btn:hover{
    background:#A8795C;
}

.content{
    padding:40px 70px;
}

/* SEMUA HEADING DIBUAT BOLD */

h1{
    font-size:36px;
    font-weight:700 !important;
    color:#6F4E37;
}

h2{
    font-size:28px;
    font-weight:700 !important;
    color:#6F4E37;
}

h3{
    font-size:22px;
    font-weight:700 !important;
    color:#6F4E37;
}

h4{
    font-size:18px;
    font-weight:600 !important;
    color:#6F4E37;
}

p{
    color:#8B7A6B;
    font-weight:400;
}

strong{
    font-weight:600 !important;
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
        gap:18px;
    }

    .content{
        padding:25px;
    }

}
</style>

</html>