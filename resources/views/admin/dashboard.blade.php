@extends('layouts.admin')

@section('content')

<div class="dashboard">

    <div class="header">

        <div>
            <h1>Dashboard Admin</h1>
            <p>Selamat datang kembali. Kelola seluruh event kampus dengan mudah.</p>
        </div>

    </div>

    <div class="card-wrapper">

        <div class="card">
            <h4>Total Event</h4>
            <h2>{{ $totalEvents }}</h2>
        </div>

        <div class="card">
            <h4>Total Peserta</h4>
            <h2>{{ $totalPeserta }}</h2>
        </div>

        <div class="card">
            <h4>Total Kategori</h4>
            <h2>{{ $totalCategories }}</h2>
        </div>

        <div class="card">
            <h4>Total Pendaftaran</h4>
            <h2>{{ $totalPendaftaran }}</h2>
        </div>

    </div>

    <div class="event-section">

        <div class="section-header">

            <div>
                <h2>Event Terbaru</h2>
                <p>Kelola seluruh event kampus yang telah dibuat.</p>
            </div>

            <a href="{{ route('events.index') }}" class="lihat-semua">
                Lihat Semua
            </a>

        </div>

        <div class="event-grid">

            @forelse($events as $event)

            <div class="event-card">

                @if($event->image)

                    <img
                        src="{{ asset('storage/'.$event->image) }}"
                        class="event-image">

                @else

                    <div class="image-empty">
                        Belum Ada Poster
                    </div>

                @endif

                <div class="event-content">

                    <span class="badge">
                        {{ $event->category->name ?? '-' }}
                    </span>

                    <h3>
                        {{ $event->title }}
                    </h3>

                    <p>
                        {{ $event->tagline }}
                    </p>

                    <div class="info">

                        <div>
                            <strong>Tanggal</strong>
                            <span>{{ $event->date }}</span>
                        </div>

                        <div>
                            <strong>Lokasi</strong>
                            <span>{{ $event->location }}</span>
                        </div>

                    </div>

                    <div class="action">

                        <a
                            href="{{ route('events.edit',$event->id) }}"
                            class="btn-edit">

                            Edit

                        </a>

                        <form
                            action="{{ route('events.destroy',$event->id) }}"
                            method="POST">

                            @csrf
                            @method('DELETE')

                            <button
                                class="btn-delete"
                                onclick="return confirm('Yakin ingin menghapus event ini?')">

                                Hapus

                            </button>

                        </form>

                    </div>

                </div>

            </div>

            @empty

            <div class="empty">

                Belum ada event.

            </div>

            @endforelse

        </div>

    </div>

</div>

<style>
    *{
        margin:0;
        padding:0;
        box-sizing:border-box;
        font-family:'Poppins',sans-serif;
    }

    body{
        background:#F8F5F2;
    }

    .dashboard{
        width:100%;
    }

    /* ================= HEADER ================= */

    .header{
        display:flex;
        justify-content:space-between;
        align-items:center;
        margin-bottom:35px;
    }

    .header h1{
        font-size:32px;
        color:#6F4E37;
        margin-bottom:8px;
    }

    .header p{
        color:#8B7A6B;
        font-size:15px;
    }

    /* ================= CARD STATISTIK ================= */

    .card-wrapper{
        display:grid;
        grid-template-columns:repeat(4,1fr);
        gap:18px;
        margin-bottom:40px;
    }

    .card{
        background:#fff;
        padding:22px;
        border-radius:16px;
        border:1px solid #EEE4DB;
        box-shadow:0 6px 18px rgba(0,0,0,.05);
        transition:.3s;
    }

    .card:hover{
        transform:translateY(-4px);
    }

    .card h4{
        color:#8B7A6B;
        font-size:14px;
        margin-bottom:10px;
    }

    .card h2{
        color:#6F4E37;
        font-size:30px;
    }

    /* ================= EVENT ================= */

    .event-section{
        margin-top:20px;
    }

    .section-header{
        display:flex;
        justify-content:space-between;
        align-items:center;
        margin-bottom:20px;
    }

    .section-header h2{
        color:#6F4E37;
        font-size:26px;
    }

    .section-header p{
        color:#8B7A6B;
        font-size:14px;
    }

    .section-header a{
        text-decoration:none;
        color:#B88A6D;
        font-weight:600;
    }

    .section-header a:hover{
        color:#8C6845;
    }

    .event-grid{
        display:grid;
        grid-template-columns:repeat(auto-fit,minmax(230px,250px));
        gap:18px;
        justify-content:flex-start;
    }

    .event-card{
        width:250px;
        background:#fff;
        border-radius:15px;
        overflow:hidden;
        border:1px solid #EEE4DB;
        box-shadow:0 6px 18px rgba(0,0,0,.05);
        transition:.3s;
    }

    .event-card:hover{
        transform:translateY(-5px);
    }

   .event-image{
        width:100%;
        height:150px;
        object-fit:cover;
    }

    .image-empty{
        width:100%;
        height:150px;
        background:#EFE5DC;
        display:flex;
        justify-content:center;
        align-items:center;
        color:#8B7A6B;
        font-size:13px;
    }

    .event-content{
        padding:15px;
    }

    .badge{
        display:inline-block;
        background:#F3E8DD;
        color:#8A6448;
        padding:4px 10px;
        border-radius:20px;
        font-size:11px;
        margin-bottom:10px;
    }

    .event-content h3{
        color:#6F4E37;
        font-size:18px;
        margin-bottom:6px;
    }

    .event-content p{
        color:#8B7A6B;
        font-size:13px;
        line-height:1.5;
        margin-bottom:12px;
    }

    .info{
        display:grid;
        grid-template-columns:1fr;
        gap:10px;
        margin-bottom:15px;
    }

    .info strong{
        display:block;
        color:#6F4E37;
        font-size:12px;
        margin-bottom:3px;
    }

    .info span{
        color:#8B7A6B;
        font-size:12px;
    }

    .action{
        display:flex;
        gap:8px;
    }

    .action form{
        flex:1;
    }

    .btn-edit{
        flex:1;
        text-align:center;
        text-decoration:none;
        background:#B88A6D;
        color:#fff;
        padding:8px;
        border-radius:8px;
        font-size:13px;
        font-weight:600;
    }

    .btn-edit:hover{
        background:#A8795C;
    }

    .btn-delete{
        width:100%;
        border:none;
        background:#D97A7A;
        color:#fff;
        padding:8px;
        border-radius:8px;
        cursor:pointer;
        font-size:13px;
        font-weight:600;
    }

    .btn-delete:hover{
        background:#C95E5E;
    }

    .empty{
        grid-column:1/-1;
        text-align:center;
        background:#fff;
        padding:35px;
        border-radius:15px;
        color:#8B7A6B;
        border:1px solid #EEE4DB;
    }

    /* ================= RESPONSIVE ================= */

    @media(max-width:992px){

    .card-wrapper{
        grid-template-columns:repeat(2,1fr);
    }

    .event-grid{
        grid-template-columns:repeat(auto-fit,minmax(220px,1fr));
    }

    .event-card{
        width:100%;
    }

    }

    @media(max-width:768px){

    .header{
        flex-direction:column;
        align-items:flex-start;
        gap:18px;
    }

    .card-wrapper{
        grid-template-columns:1fr;
    }

    .event-grid{
        grid-template-columns:1fr;
    }

    .action{
        flex-direction:column;
    }

    }
</style>

@endsection