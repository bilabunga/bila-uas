@extends('layouts.user')

@section('content')

<section class="hero">
    <div class="overlay">

        <h1>Selamat Datang di Event Kampus</h1>

        <p>
            Temukan seminar, workshop, webinar, dan berbagai kegiatan kampus
            yang dapat menambah pengalamanmu.
        </p>

        <a href="{{ route('user.events.index') }}" class="btn-hero">
            Jelajahi Event →
        </a>
    </div>
</section>

<section class="category-section">

    <div class="section-title">
        <h2>Kategori Event</h2>
    </div>

    <div class="category-list">

        <div class="category-card">
            <h4>Seminar</h4>
        </div>

        <div class="category-card">
            <h4>Workshop</h4>
        </div>

        <div class="category-card">
            <h4>Webinar</h4>
        </div>

        <div class="category-card">
            <h4>Talkshow</h4>
        </div>

    </div>

</section>

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

            @if($event->image)

                <img src="{{ asset('storage/'.$event->image) }}" class="event-image">

            @else

                <div class="image-empty">
                    Tidak Ada Poster
                </div>

            @endif

            <div class="event-content">

                <span class="badge">
                    {{ $event->category->name ?? 'Event' }}
                </span>

                <h3>{{ $event->title }}</h3>

                <p>{{ $event->tagline }}</p>

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

                <a href="{{ route('user.events.show',$event->id) }}" class="btn-detail">
                    Lihat Detail
                </a>

            </div>

        </div>

        @empty

        <div class="empty">
            Belum ada event.
        </div>

        @endforelse

    </div>

</section>
<style>
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:'Poppins',sans-serif;
}

body{
    background:#F8F5F2;
}

/* ================= HERO ================= */

.hero{
    width:100%;
    height:450px;
    margin:25px 0 50px;
    border-radius:25px;
    overflow:hidden;

    background:
        linear-gradient(rgba(95, 63, 33, 0.45), rgba(151, 125, 100, 0.45)),
        url('/images/kampus.jpeg');

    background-size:cover;
    background-position:center;
    background-repeat:no-repeat;

    display:flex;
    align-items:center;
    padding:70px;
}

.overlay{
    max-width:600px;
    color:#fff;
}

.overlay h1{
    font-size:52px;
    font-weight:700;
    color:#fff;
    line-height:1.2;
    margin-bottom:20px;
    text-shadow:0 3px 10px rgba(0,0,0,.5);
}

.overlay p{
    font-size:18px;
    line-height:1.8;
    color:#fff;
    text-shadow:0 2px 8px rgba(0,0,0,.4);
}

/* ================= KATEGORI ================= */

.category-section{
    margin:0 0 55px;
}

.section-title{
    margin-bottom:22px;
}

.section-title h2{
    font-size:28px;
    color:#6F4E37;
    font-weight:700;
}

.category-list{
    display:grid;
    grid-template-columns:repeat(auto-fit,minmax(180px,1fr));
    gap:18px;
}

.category-card{
    background:#fff;
    border:1px solid #EEE4DB;
    border-radius:15px;
    padding:22px;
    text-align:center;
    box-shadow:0 6px 18px rgba(0,0,0,.05);
    transition:.3s;
}

.category-card:hover{
    transform:translateY(-5px);
    box-shadow:0 10px 22px rgba(0,0,0,.08);
}

.category-card h4{
    color:#6F4E37;
    font-size:18px;
}

/* ================= EVENT ================= */

.event-section{
    margin-top:40px;
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

.section-header a{
    text-decoration:none;
    color:#B88A6D;
    font-weight:600;
    transition:.3s;
}

.section-header a:hover{
    color:#8C6845;
}

/* ================= RESPONSIVE ================= */

@media(max-width:768px){

    .hero{
        height:320px;
        padding:30px;
        margin-bottom:35px;
    }

    .overlay h1{
        font-size:34px;
    }

    .overlay p{
        font-size:15px;
    }

    .category-list{
        grid-template-columns:repeat(2,1fr);
    }

}

/* ===== EVENT ===== */

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

.section-header a{
    text-decoration:none;
    color:#B88A6D;
    font-weight:600;
}

.section-header a:hover{
    color:#8C6845;
}

/* GRID */

.event-list{
    display:grid;
    grid-template-columns:repeat(auto-fit,minmax(230px,250px));
    gap:18px;
    justify-content:flex-start;
}

/* CARD */

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
    margin-bottom:8px;
}

.event-content p{
    color:#8B7A6B;
    font-size:13px;
    line-height:1.5;
    margin-bottom:12px;
}

.info{
    display:grid;
    gap:8px;
    margin-bottom:15px;
}

.info strong{
    display:block;
    color:#6F4E37;
    font-size:12px;
    margin-bottom:2px;
}

.info span{
    display:block;
    color:#8B7A6B;
    font-size:12px;
}

/* BUTTON */

.btn-detail{
    display:block;
    text-align:center;
    text-decoration:none;
    background:#B88A6D;
    color:#fff;
    padding:9px;
    border-radius:8px;
    font-size:13px;
    font-weight:600;
    transition:.3s;
}

.btn-detail:hover{
    background:#A8795C;
}

.empty{
    grid-column:1/-1;
    background:#fff;
    border:1px solid #EEE4DB;
    border-radius:15px;
    padding:30px;
    text-align:center;
    color:#8B7A6B;
}

.btn-hero{
    display:inline-block;
    margin-top:30px;
    padding:15px 35px;
    background:#B88A6D;
    color:#fff;
    text-decoration:none;
    border-radius:12px;
    font-size:16px;
    font-weight:600;
    transition:.3s ease;
    box-shadow:0 8px 20px rgba(0,0,0,.2);
}

.btn-hero:hover{
    background:#A8795C;
    transform:translateY(-3px);
}

/* ===== RESPONSIVE ===== */

@media(max-width:992px){

    .event-list{
        grid-template-columns:repeat(2,1fr);
    }

    .event-card{
        width:100%;
    }

}

@media(max-width:768px){

    .home-header h1{
        font-size:28px;
    }

    .category-list{
        grid-template-columns:repeat(2,1fr);
    }

    .event-list{
        grid-template-columns:1fr;
    }

    .section-header{
        flex-direction:column;
        align-items:flex-start;
        gap:12px;
    }

    .event-card{
        width:100%;
    }

}

</style>
@endsection