@extends('layouts.admin')

@section('content')

<div class="event-section">

    <div class="section-header">

        <div>
            <h2>Kelola Event</h2>
            <p>Kelola seluruh event kampus yang telah dibuat.</p>
        </div>

        <a href="{{ route('events.create') }}" class="btn-add">
            + Tambah Event
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

                <div class="action">

                    <a href="{{ route('events.edit',$event->id) }}"
                        class="btn-edit">
                        Edit
                    </a>

                    <form action="{{ route('events.destroy',$event->id) }}"
                        method="POST">

                        @csrf
                        @method('DELETE')

                        <button
                            type="submit"
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

<style>
    .btn-add{
    display:inline-block;
    text-decoration:none;
    background:#B88A6D;
    color:#fff;
    padding:12px 22px;
    border-radius:10px;
    font-size:14px;
    font-weight:600;
    transition:.3s ease;
    box-shadow:0 4px 10px rgba(184,138,109,.25);
    }

    .btn-add:hover{
        background:#A8795C;
        transform:translateY(-2px);
        box-shadow:0 8px 18px rgba(184,138,109,.35);
    }

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

        .lihat-semua{
            text-decoration:none;
            color:#B88A6D;
            font-weight:600;
        }

        .lihat-semua:hover{
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
            height:120px;
            object-fit:cover;
        }

        .image-empty{
            width:100%;
            height:120px;
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