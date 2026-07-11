<!DOCTYPE html>
<html>
<head>
    <title>Admin Panel</title>
</head>

<body>

<div class="admin-container">

    <div class="sidebar">

        <div class="logo">
            <h2>Event Kampus</h2>
            <p>Admin Panel</p>
        </div>

        <ul class="menu">
            <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
            <li><a href="{{ route('events.index') }}">Event</a></li>
            <li><a href="{{ route('categories.index') }}">Kategori</a></li>
            <li><a href="{{ route('registrations.index') }}">Pendaftaran</a></li>
            <li>
                <a href="{{ route('logout') }}"
                   onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                    Logout
                </a>
            </li>
        </ul>

        <form id="logout-form"
              action="{{ route('logout') }}"
              method="POST"
              style="display:none;">
            @csrf
        </form>

    </div>

    <div class="main-content">
        @yield('content')
    </div>

</div>

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

.admin-container{
    display:flex;
    min-height:100vh;
}

.sidebar{
    width:250px;
    background:linear-gradient(180deg,#2563eb,#1e40af);
    color:#fff;
    padding:30px 20px;
}

.logo{
    text-align:center;
    margin-bottom:40px;
}

.logo h2{
    font-size:24px;
}

.logo p{
    opacity:.8;
}

.menu{
    list-style:none;
}

.menu li{
    margin-bottom:10px;
}

.menu li a{
    display:block;
    color:white;
    text-decoration:none;
    padding:12px;
    border-radius:10px;
}

.menu li a:hover{
    background:rgba(255,255,255,.15);
}

.main-content{
    flex:1;
    padding:35px;
}
</style>

</body>
</html>