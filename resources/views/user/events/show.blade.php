@extends('layouts.user')

@section('content')

<div class="detail-container">

    <div class="detail-header">
        <h1>{{ $event->title }}</h1>
        <p>{{ $event->tagline }}</p>
    </div>

    <div class="detail-card">

        <div class="detail-info">
            <p><strong>📅 Tanggal</strong><br>{{ $event->date }}</p>

            <p><strong>📍 Lokasi</strong><br>{{ $event->location }}</p>

            <p><strong>👥 Kuota</strong><br>{{ $event->quota }} Peserta</p>

            <p><strong>🏷️ Kategori</strong><br>
                {{ $event->category->name ?? '-' }}
            </p>
        </div>

        <hr>

        <h3>Deskripsi Event</h3>

        <p>
            {{ $event->description }}
        </p>

        <div class="detail-button">

            <a href="{{ route('user.registrations.create', $event) }}" method="POST">
                @csrf
                <button type="submit" class="btn-register">
                    Daftar Event
                </button>
            </a>

            <a href="{{ route('user.events.index') }}" class="btn-back">
                Kembali
            </a>

        </div>

    </div>

</div>

@endsection

<style>

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:'Poppins',sans-serif;
}

body{
    background:#f4f7fb;
}

.detail-container{
    max-width:1000px;
    margin:50px auto;
    padding:0 20px;
}

.detail-header{
    text-align:center;
    margin-bottom:35px;
}

.detail-header h1{
    font-size:40px;
    color:#2563eb;
    margin-bottom:10px;
}

.detail-header p{
    color:#64748b;
    font-size:18px;
}

.detail-card{
    background:#fff;
    border-radius:20px;
    padding:35px;
    box-shadow:0 10px 25px rgba(0,0,0,.08);
}

.detail-info{
    display:grid;
    grid-template-columns:repeat(2,1fr);
    gap:20px;
    margin-bottom:30px;
}

.detail-info p{
    background:#f8fafc;
    padding:18px;
    border-radius:12px;
    color:#475569;
    line-height:1.8;
}

.detail-info strong{
    color:#2563eb;
}

hr{
    border:none;
    border-top:1px solid #e5e7eb;
    margin:30px 0;
}

.detail-card h3{
    color:#2563eb;
    margin-bottom:15px;
}

.detail-card p{
    color:#64748b;
    line-height:1.8;
}

.detail-button{
    display:flex;
    justify-content:flex-end;
    gap:15px;
    margin-top:35px;
    align-items:center;
}

.detail-button form{
    margin:0;
}

.btn-register{
    border:none;
    cursor:pointer;
    background:#2563eb;
    color:#fff;
    padding:12px 24px;
    border-radius:10px;
    font-weight:600;
    transition:.3s;
    font-size:15px;
}

.btn-register:hover{
    background:#1d4ed8;
}

.btn-back{
    text-decoration:none;
    background:#e2e8f0;
    color:#334155;
    padding:12px 24px;
    border-radius:10px;
    font-weight:600;
    transition:.3s;
}

.btn-back:hover{
    background:#cbd5e1;
}

@media(max-width:768px){

.detail-info{
    grid-template-columns:1fr;
}

.detail-button{
    flex-direction:column;
}

.btn-register,
.btn-back{
    width:100%;
    text-align:center;
}

.detail-header h1{
    font-size:30px;
}

}

</style>