<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Admin Panel</title>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

</head>

<body>

<div class="admin-container">

    <!-- Sidebar -->
    <aside class="sidebar">

        <div class="logo">
            <h2>Event Kampus</h2>
            <p>Administrator Panel</p>
        </div>

        <ul class="menu">

            <li>
                <a href="{{ route('admin.dashboard') }}">
                    Dashboard
                </a>
            </li>

            <li>
                <a href="{{ route('events.index') }}">
                    Event
                </a>
            </li>

            <li>
                <a href="{{ route('categories.index') }}">
                    Kategori
                </a>
            </li>

            <li>
                <a href="{{ route('registrations.index') }}">
                    Pendaftaran
                </a>
            </li>

            <li>
                <a href="{{ route('logout') }}"
                onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
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

    </aside>

    <!-- Content -->
    <main class="main-content">
        @yield('content')
    </main>

</div>

<style>

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:'Poppins',sans-serif;
}

body{
    background:#F7F3EE;
}

/* ======================
SIDEBAR
====================== */

.admin-container{
    display:flex;
    min-height:100vh;
}

.sidebar{
    width:270px;
    background:#8C6A4A;
    padding:35px 25px;
    color:white;
    box-shadow:5px 0 20px rgba(0,0,0,.08);
}

.logo{
    text-align:center;
    margin-bottom:45px;
}

.logo h2{
    font-size:28px;
    font-weight:700;
    margin-bottom:8px;
}

.logo p{
    opacity:.8;
    font-size:14px;
}

.menu{
    list-style:none;
}

.menu li{
    margin-bottom:14px;
}

.menu li a{
    display:block;
    text-decoration:none;
    color:white;
    padding:14px 18px;
    border-radius:14px;
    transition:.3s;
    font-weight:500;
}

.menu li a:hover{
    background:#A98467;
    transform:translateX(6px);
}

/* ======================
CONTENT
====================== */

.main-content{
    flex:1;
    padding:40px;
}

/* ======================
CARD
====================== */

.card{
    background:white;
    border-radius:20px;
    padding:25px;
    box-shadow:0 10px 30px rgba(0,0,0,.06);
}

/* ======================
TABLE
====================== */

table{
    width:100%;
    border-collapse:collapse;
    background:white;
    border-radius:18px;
    overflow:hidden;
    box-shadow:0 10px 25px rgba(0,0,0,.05);
}

table thead{
    background:#C7B299;
    color:white;
}

table th,
table td{
    padding:16px;
    text-align:left;
}

table tbody tr{
    border-bottom:1px solid #eee;
}

table tbody tr:hover{
    background:#F7F1EA;
}

/* ======================
BUTTON
====================== */

.btn{
    background:#8C6A4A;
    color:white;
    text-decoration:none;
    padding:10px 20px;
    border:none;
    border-radius:10px;
    cursor:pointer;
    transition:.3s;
}

.btn:hover{
    background:#A98467;
}

/* ======================
SCROLLBAR
====================== */

::-webkit-scrollbar{
    width:8px;
}

::-webkit-scrollbar-thumb{
    background:#B89572;
    border-radius:20px;
}

::-webkit-scrollbar-track{
    background:#F7F3EE;
}

</style>

</body>
</html>