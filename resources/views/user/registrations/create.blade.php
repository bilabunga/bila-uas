@extends('layouts.user')

@section('content')

<div class="register-container">

    <div class="register-card">

        <h2>Daftar Event</h2>
        <p>Silakan lengkapi data pendaftaran di bawah ini.</p>

        <form action="{{ route('user.registrations.store', $event->id) }}" method="POST">
            @csrf

            <div class="form-group">
                <label>Nama</label>
                <input type="text"
                       name="name"
                       placeholder="Masukkan nama"
                       required>
            </div>

            <div class="form-group">
                <label>Email</label>
                <input type="email"
                       name="email"
                       placeholder="Masukkan email"
                       required>
            </div>

            <div class="form-group">
                <label>No. HP</label>
                <input type="text"
                       name="phone"
                       placeholder="Masukkan nomor HP"
                       required>
            </div>

            <button type="submit" class="btn-register">
                Daftar Sekarang
            </button>

        </form>

    </div>

</div>

<style>
    .register-container{
        max-width:700px;
        margin:50px auto;
        padding:20px;
    }

    .register-card{
        background:#fff;
        padding:35px;
        border-radius:15px;
        box-shadow:0 5px 20px rgba(0,0,0,.1);
    }

    .register-card h2{
        margin-bottom:10px;
    }

    .register-card p{
        color:#777;
        margin-bottom:25px;
    }

    .form-group{
        margin-bottom:18px;
    }

    .form-group label{
        display:block;
        margin-bottom:8px;
        font-weight:600;
    }

    .form-group input,
    .form-group textarea{
        width:100%;
        padding:12px;
        border:1px solid #ddd;
        border-radius:8px;
        outline:none;
    }

    .btn-register{
        width:100%;
        padding:14px;
        background:#7a5c46;
        color:white;
        border:none;
        border-radius:8px;
        cursor:pointer;
        font-size:16px;
    }

    .btn-register:hover{
        background:#5f4635;
    }
</style>

@endsection