@extends('layouts.user')

@section('content')

<!-- HERO -->
<section class="hero">

    <div class="hero-content">

        <h1>Selamat Datang di Event Kampus</h1>

        <p>
            Temukan berbagai seminar, workshop, lomba, dan kegiatan kampus
            yang dapat mengembangkan kemampuan serta menambah pengalamanmu.
        </p>

        <a href="{{ route('user.events.index') }}" class="btn-hero">
            Jelajahi Event
        </a>

    </div>

</section>


<!-- KATEGORI -->
<section class="category-section">

    <h2>Kategori Event</h2>

    <div class="category-list">

        <div class="category-card">
            🎓
            <h4>Seminar</h4>
        </div>

        <div class="category-card">
            💻
            <h4>Workshop</h4>
        </div>

        <div class="category-card">
            🏆
            <h4>Lomba</h4>
        </div>

        <div class="category-card">
            🤝
            <h4>Organisasi</h4>
        </div>

    </div>

</section>


<!-- EVENT TERBARU -->
<section class="event-section">

    <div class="section-header">

        <h2>Event Terbaru</h2>

        <a href="{{ route('user.events.index') }}">
            Lihat Semua
        </a>

    </div>

    <div class="event-list">

        @forelse($events as $event)

        <div class="event-card">

            <h3>{{ $event->title }}</h3>

            <p>{{ $event->tagline }}</p>

            <span>
                📅 {{ $event->date }}
            </span>

            <span>
                📍 {{ $event->location }}
            </span>

            <a href="{{ route('user.events.show',$event->id) }}">
                Detail Event
            </a>

        </div>

        @empty

        <p>Belum ada event.</p>

        @endforelse

    </div>

</section>

@endsection

<style>

/* HERO */
.hero{
    background: linear-gradient(135deg,#2563eb,#1e40af);
    color:#fff;
    text-align:center;
    padding:90px 20px;
}

.hero-content{
    max-width:700px;
    margin:auto;
}

.hero h1{
    font-size:48px;
    margin-bottom:20px;
}

.hero p{
    font-size:18px;
    line-height:1.8;
    margin-bottom:35px;
}

.btn-hero{
    display:inline-block;
    padding:14px 35px;
    background:#fff;
    color:#2563eb;
    border-radius:30px;
    text-decoration:none;
    font-weight:bold;
    transition:.3s;
}

.btn-hero:hover{
    background:#f3f4f6;
    transform:translateY(-3px);
}

/* KATEGORI */
.category-section{
    max-width:1200px;
    margin:70px auto;
    padding:0 20px;
}

.category-section h2{
    text-align:center;
    margin-bottom:35px;
    color:#1f2937;
}

.category-list{
    display:grid;
    grid-template-columns:repeat(auto-fit,minmax(220px,1fr));
    gap:20px;
}

.category-card{
    background:#fff;
    text-align:center;
    padding:30px;
    border-radius:15px;
    box-shadow:0 5px 15px rgba(0,0,0,.08);
    font-size:40px;
    transition:.3s;
}

.category-card h4{
    margin-top:15px;
    color:#374151;
    font-size:20px;
}

.category-card:hover{
    transform:translateY(-8px);
}

/* EVENT */
.event-section{
    max-width:1200px;
    margin:70px auto;
    padding:0 20px;
}

.section-header{
    display:flex;
    justify-content:space-between;
    align-items:center;
    margin-bottom:30px;
}

.section-header h2{
    color:#1f2937;
}

.section-header a{
    color:#2563eb;
    text-decoration:none;
    font-weight:bold;
}

.event-list{
    display:grid;
    grid-template-columns:repeat(auto-fit,minmax(320px,1fr));
    gap:25px;
}

.event-card{
    background:#fff;
    border-radius:15px;
    padding:25px;
    box-shadow:0 5px 15px rgba(0,0,0,.08);
    transition:.3s;
}

.event-card:hover{
    transform:translateY(-8px);
}

.event-card h3{
    color:#2563eb;
    margin-bottom:10px;
}

.event-card p{
    color:#6b7280;
    margin-bottom:15px;
}

.event-card span{
    display:block;
    margin-bottom:8px;
    color:#374151;
}

.event-card a{
    display:inline-block;
    margin-top:15px;
    background:#2563eb;
    color:#fff;
    padding:10px 22px;
    border-radius:8px;
    text-decoration:none;
}

.event-card a:hover{
    background:#1d4ed8;
}

/* RESPONSIVE */
@media(max-width:768px){

.hero h1{
    font-size:34px;
}

.hero p{
    font-size:16px;
}

.section-header{
    flex-direction:column;
    gap:10px;
}

}

</style>