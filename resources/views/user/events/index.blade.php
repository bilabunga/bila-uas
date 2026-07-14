@extends('layouts.user')

@section('content')

<div class="home-header">

    <h1>Daftar Event Kampus</h1>

    <p>
        Pilih event yang ingin kamu ikuti dan segera daftarkan dirimu.
    </p>

</div>

    <div class="event-wrapper">

        @forelse($events as $event)

        <div class="event-card">

            @if($event->image)

                <img src="{{ asset('storage/'.$event->image) }}"
                     class="event-image">

            @else

                <div class="image-empty">
                    Belum Ada Poster
                </div>

            @endif

            <div class="event-content">

                <span class="badge">
                    {{ $event->category->name ?? 'Event' }}
                </span>

                <h3>{{ $event->title }}</h3>

                @if($event->tagline)
                    <p>{{ $event->tagline }}</p>
                @endif

                <div class="info">

                    <div>
                        <strong>Tanggal</strong>
                        <span>{{ $event->date }}</span>
                    </div>

                    <div>
                        <strong>Lokasi</strong>
                        <span>{{ $event->location }}</span>
                    </div>

                    <div>
                        <strong>Kuota</strong>
                        <span>{{ $event->quota }} Peserta</span>
                    </div>

                </div>

                <a href="{{ route('user.events.show',$event->id) }}"
                   class="btn-detail">
                    Lihat Detail
                </a>

            </div>

        </div>

        @empty

        <div class="empty">

            <h3>Belum ada event.</h3>

        </div>

        @endforelse

    </div>

<style>

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:'Poppins',sans-serif;
}

.home-header{
    margin-bottom:30px;
}

.home-header h1{
    font-size:32px;
    color:#6F4E37;
    margin-bottom:8px;
}

.home-header p{
    color:#8B7A6B;
}

/* CARD EVENT */

.event-wrapper{
    display:grid;
    grid-template-columns:repeat(auto-fill,minmax(260px,1fr));
    gap:25px;
    margin-top:20px;
}

.event-card{
    width:100%;
    max-width:280px;
    margin:auto;
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
    height:160px;
    object-fit:cover;
}

.image-empty{
    width:100%;
    height:160px;
    background:#EFE5DC;
    display:flex;
    justify-content:center;
    align-items:center;
    color:#8B7A6B;
    font-size:13px;
}

.event-content{
    padding:16px;
}

.badge{
    display:inline-block;
    background:#F3E8DD;
    color:#8A6448;
    padding:5px 10px;
    border-radius:20px;
    font-size:11px;
    margin-bottom:10px;
}

.event-content h3{
    color:#6F4E37;
    font-size:21px;
    margin-bottom:8px;
    line-height:1.3;
}

.event-content p{
    color:#8B7A6B;
    font-size:14px;
    line-height:1.5;
    margin-bottom:15px;
}

.info{
    display:grid;
    gap:10px;
    margin-bottom:18px;
}

.info strong{
    display:block;
    color:#6F4E37;
    font-size:13px;
    margin-bottom:3px;
}

.info span{
    color:#8B7A6B;
    font-size:13px;
}

.btn-detail{
    display:block;
    width:100%;
    text-align:center;
    text-decoration:none;
    background:#B88A6D;
    color:#fff;
    padding:10px;
    border-radius:10px;
    font-weight:600;
    transition:.3s;
}

.btn-detail:hover{
    background:#A8795C;
}

.empty{
    grid-column:1/-1;
    text-align:center;
    background:#fff;
    padding:40px;
    border-radius:15px;
    border:1px solid #EEE4DB;
    color:#8B7A6B;
}

/* RESPONSIVE */

@media(max-width:992px){

    .event-wrapper{
        grid-template-columns:repeat(2,1fr);
    }

}

@media(max-width:768px){

    .event-wrapper{
        grid-template-columns:1fr;
    }

    .event-card{
        max-width:100%;
    }

}

</style>

@endsection


