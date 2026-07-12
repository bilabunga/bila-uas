@extends('layouts.user')

@section('content')

<div class="header">

    <h1>Daftar Event Kampus</h1>

    <p>
        Pilih event yang ingin kamu ikuti dan segera daftarkan dirimu.
    </p>

</div>

<div class="event-wrapper">

    @forelse($events as $event)

    <div class="event-card">

        <h2>{{ $event->title }}</h2>

        @if($event->tagline)
            <p class="tagline">{{ $event->tagline }}</p>
        @endif

        <div class="info">

            <p><strong>Kategori :</strong> {{ $event->category->name ?? '-' }}</p>

            <p><strong>Tanggal :</strong> {{ $event->date }}</p>

            <p><strong>Lokasi :</strong> {{ $event->location }}</p>

            <p><strong>Kuota :</strong> {{ $event->quota }}</p>

        </div>

        <a href="{{ route('user.events.show',$event->id) }}" class="btn-detail">
            Lihat Detail
        </a>

    </div>

    @empty

    <div class="empty">

        <h3>Belum ada event.</h3>

    </div>

    @endforelse

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

.event-page{
    max-width:1200px;
    margin:40px auto;
    padding:0 20px;
}

/* Header */

.event-header{
    text-align:center;
    margin-bottom:40px;
}

.event-header h1{
    font-size:38px;
    color:#1e293b;
    margin-bottom:10px;
}

.event-header p{
    color:#64748b;
    font-size:17px;
}

/* Search */

.search-box{
    margin-bottom:35px;
    display:flex;
    justify-content:center;
}

.search-box input{
    width:100%;
    max-width:500px;
    padding:14px 18px;
    border:1px solid #dbe2ea;
    border-radius:12px;
    outline:none;
    font-size:15px;
    transition:.3s;
}

.search-box input:focus{
    border-color:#2563eb;
    box-shadow:0 0 0 3px rgba(37,99,235,.15);
}

/* Card */

.event-container{
    display:grid;
    grid-template-columns:repeat(auto-fit,minmax(330px,1fr));
    gap:25px;
}

.event-card{
    background:#fff;
    border-radius:18px;
    overflow:hidden;
    box-shadow:0 10px 25px rgba(0,0,0,.08);
    transition:.3s;
}

.event-card:hover{
    transform:translateY(-8px);
}

.event-image img{
    width:100%;
    height:220px;
    object-fit:cover;
}

.event-content{
    padding:22px;
}

.category{
    display:inline-block;
    background:#dbeafe;
    color:#2563eb;
    padding:6px 14px;
    border-radius:20px;
    font-size:13px;
    font-weight:600;
    margin-bottom:15px;
}

.event-content h3{
    color:#1e293b;
    margin-bottom:10px;
}

.event-content p{
    color:#64748b;
    margin-bottom:8px;
}

.event-info{
    margin:18px 0;
}

.btn-detail{
    display:inline-block;
    width:100%;
    text-align:center;
    text-decoration:none;
    background:#2563eb;
    color:#fff;
    padding:12px;
    border-radius:10px;
    font-weight:600;
    transition:.3s;
}

.btn-detail:hover{
    background:#1d4ed8;
}

/* Empty */

.empty-event{
    grid-column:1/-1;
    background:#fff;
    padding:40px;
    text-align:center;
    border-radius:18px;
    box-shadow:0 10px 25px rgba(0,0,0,.08);
}

.empty-event h3{
    color:#2563eb;
    margin-bottom:10px;
}

/* Responsive */

@media(max-width:768px){

    .event-header h1{
        font-size:30px;
    }

    .event-container{
        grid-template-columns:1fr;
    }

}

</style>