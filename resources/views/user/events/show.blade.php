@extends('layouts.user')

@section('content')

<div class="detail-container">

    <div class="detail-card">

        @if($event->image)
            <img src="{{ asset('storage/'.$event->image) }}" class="detail-image">
        @else
            <div class="image-empty">
                Belum Ada Poster
            </div>
        @endif

        <div class="detail-content">

            <span class="badge">
                {{ $event->category->name ?? 'Event' }}
            </span>

            <h1>{{ $event->title }}</h1>

            <p class="tagline">
                {{ $event->tagline }}
            </p>

            <div class="info-grid">

                <div class="info-box">
                    <strong>Tanggal</strong>
                    <span>{{ $event->date }}</span>
                </div>

                <div class="info-box">
                    <strong>Lokasi</strong>
                    <span>{{ $event->location }}</span>
                </div>

                <div class="info-box">
                    <strong>Kuota</strong>
                    <span>{{ $event->quota }} Peserta</span>
                </div>

                <div class="info-box">
                    <strong>Kategori</strong>
                    <span>{{ $event->category->name ?? '-' }}</span>
                </div>

            </div>

            <div class="description">

                <h3>Deskripsi Event</h3>

                <p>
                    {{ $event->description }}
                </p>

            </div>

            <div class="button-group">

                <a href="{{ route('user.registrations.create',$event) }}" class="btn-register">
                    Daftar Event
                </a>

                <a href="{{ route('user.events.index') }}" class="btn-back">
                    Kembali
                </a>

            </div>

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

    .detail-container{
        max-width:900px;
        margin:40px auto;
    }

    .detail-card{
        background:#fff;
        border:1px solid #EEE4DB;
        border-radius:18px;
        overflow:hidden;
        box-shadow:0 6px 18px rgba(0,0,0,.05);
    }

    .detail-image{
        width:100%;
        height:320px;
        object-fit:cover;
    }

    .image-empty{
        height:320px;
        display:flex;
        justify-content:center;
        align-items:center;
        background:#EFE5DC;
        color:#8B7A6B;
        font-size:15px;
    }

    .detail-content{
        padding:28px;
    }

    .badge{
        display:inline-block;
        background:#F3E8DD;
        color:#8A6448;
        padding:6px 14px;
        border-radius:20px;
        font-size:12px;
        font-weight:600;
        margin-bottom:15px;
    }

    .detail-content h1{
        color:#6F4E37;
        font-size:32px;
        font-weight:700;
        margin-bottom:10px;
    }

    .tagline{
        color:#8B7A6B;
        margin-bottom:25px;
        line-height:1.7;
    }

    .info-grid{
        display:grid;
        grid-template-columns:repeat(2,1fr);
        gap:15px;
        margin-bottom:30px;
    }

    .info-box{
        background:#FCF8F5;
        border:1px solid #EEE4DB;
        border-radius:12px;
        padding:16px;
    }

    .info-box strong{
        display:block;
        color:#6F4E37;
        margin-bottom:6px;
        font-size:14px;
    }

    .info-box span{
        color:#8B7A6B;
        font-size:14px;
    }

    .description{
        margin-bottom:30px;
    }

    .description h3{
        color:#6F4E37;
        margin-bottom:10px;
    }

    .description p{
        color:#8B7A6B;
        line-height:1.8;
        text-align:justify;
    }

    .button-group{
        display:flex;
        gap:15px;
    }

    .btn-register{
        flex:1;
        text-align:center;
        text-decoration:none;
        background:#B88A6D;
        color:#fff;
        padding:12px;
        border-radius:10px;
        font-weight:600;
        transition:.3s;
    }

    .btn-register:hover{
        background:#A8795C;
    }

    .btn-back{
        flex:1;
        text-align:center;
        text-decoration:none;
        background:#E8DED5;
        color:#6F4E37;
        padding:12px;
        border-radius:10px;
        font-weight:600;
        transition:.3s;
    }

    .btn-back:hover{
        background:#DCCDBE;
    }

    @media(max-width:768px){

        .detail-image{
            height:220px;
        }

        .info-grid{
            grid-template-columns:1fr;
        }

        .button-group{
            flex-direction:column;
        }

        .detail-content h1{
            font-size:26px;
        }

    }
</style>

@endsection