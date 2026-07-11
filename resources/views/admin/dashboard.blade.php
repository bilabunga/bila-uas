@extends('layouts.admin')

@section('content')

<div class="admin-container">

    <div class="main-content">

        <div class="header">
            <div>
                <h1>Dashboard Admin</h1>
                <p>Kelola seluruh event kampus dengan mudah.</p>
            </div>

            <a href="{{ route('events.create') }}" class="btn-add">
                + Tambah Event
            </a>
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
                <h4>Kategori</h4>
                <h2>{{ $totalCategories }}</h2>
            </div>

            <div class="card">
                <h4>Pendaftaran</h4>
                <h2>{{ $totalPendaftaran }}</h2>
            </div>

        </div>

        <div class="table-box">

            <div class="table-header">
                <h2>Event Terbaru</h2>

                <a href="{{ route('events.index') }}">
                    Lihat Semua
                </a>
            </div>

            <table>
                <thead>
                    <tr>
                        <th>Judul Event</th>
                        <th>Kategori</th>
                        <th>Tanggal</th>
                        <th>Lokasi</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <tbody>

                    @forelse($events as $event)
                    <tr>
                        <td>{{ $event->title }}</td>
                        <td>{{ $event->category->name ?? '-' }}</td>
                        <td>{{ $event->date }}</td>
                        <td>{{ $event->location }}</td>
                        <td>
                            <a href="{{ route('events.edit', $event->id) }}">Edit</a> |

                            <form id="delete-{{ $event->id }}"
                                  action="{{ route('events.destroy', $event->id) }}"
                                  method="POST"
                                  style="display:inline;">
                                @csrf
                                @method('DELETE')

                                <a href="#"
                                   onclick="event.preventDefault(); document.getElementById('delete-{{ $event->id }}').submit();">
                                    Hapus
                                </a>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5">Belum ada event.</td>
                    </tr>
                    @endforelse

                </tbody>
            </table>

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
    background:#f4f7fb;
}

.admin-container{
    display:flex;
    min-height:100vh;
}

/* Main */
.main-content{
    flex:1;
    padding:35px;
}

/* Header */
.header{
    display:flex;
    justify-content:space-between;
    align-items:center;
    margin-bottom:30px;
}

.header h1{
    font-size:32px;
    color:#1e293b;
}

.header p{
    color:#64748b;
    margin-top:5px;
}

.btn-add{
    text-decoration:none;
    background:#2563eb;
    color:#fff;
    padding:12px 22px;
    border-radius:10px;
    font-weight:600;
    transition:.3s;
}

.btn-add:hover{
    background:#1d4ed8;
}

/* Card */
.card-wrapper{
    display:grid;
    grid-template-columns:repeat(4,1fr);
    gap:20px;
    margin-bottom:35px;
}

.card{
    background:#fff;
    padding:25px;
    border-radius:15px;
    box-shadow:0 10px 25px rgba(0,0,0,.08);
}

.card h4{
    color:#64748b;
    font-size:15px;
    margin-bottom:10px;
}

.card h2{
    color:#2563eb;
    font-size:34px;
}

/* Table */
.table-box{
    background:#fff;
    border-radius:15px;
    padding:25px;
    box-shadow:0 10px 25px rgba(0,0,0,.08);
}

.table-header{
    display:flex;
    justify-content:space-between;
    align-items:center;
    margin-bottom:20px;
}

.table-header h2{
    color:#1e293b;
}

.table-header a{
    color:#2563eb;
    text-decoration:none;
    font-weight:600;
}

table{
    width:100%;
    border-collapse:collapse;
}

thead{
    background:#2563eb;
    color:#fff;
}

th,td{
    padding:15px;
    text-align:left;
}

tbody tr{
    border-bottom:1px solid #eee;
}

tbody tr:hover{
    background:#f8fafc;
}

td a{
    text-decoration:none;
    color:#2563eb;
    font-weight:600;
    margin-right:10px;
}

td a:hover{
    color:#1d4ed8;
}

/* Responsive */
@media(max-width:992px){
    .card-wrapper{
        grid-template-columns:repeat(2,1fr);
    }
}

@media(max-width:768px){
    .header{
        flex-direction:column;
        align-items:flex-start;
        gap:15px;
    }

    .card-wrapper{
        grid-template-columns:1fr;
    }

    table{
        display:block;
        overflow-x:auto;
    }
}
</style>

@endsection