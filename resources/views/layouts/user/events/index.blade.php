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

.header{
    margin-bottom:35px;
}

.header h1{
    color:#1e293b;
    font-size:36px;
    margin-bottom:10px;
}

.header p{
    color:#64748b;
}

.event-wrapper{
    display:grid;
    grid-template-columns:repeat(auto-fit,minmax(320px,1fr));
    gap:25px;
}

.event-card{
    background:#fff;
    border-radius:16px;
    padding:25px;
    box-shadow:0 10px 25px rgba(0,0,0,.08);
    transition:.3s;
}

.event-card:hover{
    transform:translateY(-5px);
}

.event-card h2{
    color:#2563eb;
    margin-bottom:10px;
}

.tagline{
    color:#64748b;
    margin-bottom:18px;
    font-style:italic;
}

.info p{
    margin-bottom:8px;
    color:#334155;
}

.btn-detail{
    display:inline-block;
    margin-top:20px;
    background:#2563eb;
    color:#fff;
    text-decoration:none;
    padding:12px 20px;
    border-radius:10px;
    font-weight:600;
    transition:.3s;
}

.btn-detail:hover{
    background:#1d4ed8;
}

.empty{
    background:#fff;
    padding:40px;
    text-align:center;
    border-radius:15px;
    box-shadow:0 10px 25px rgba(0,0,0,.08);
}

@media(max-width:768px){

    .header h1{
        font-size:28px;
    }

    .event-wrapper{
        grid-template-columns:1fr;
    }

}

</style>