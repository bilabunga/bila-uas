@extends('layouts.user')

@section('content')

<div class="container mt-4">

    <div class="table-box">

        <div class="table-header">
            <h2>Pendaftaran Saya</h2>
        </div>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Event</th>
                    <th>Tanggal</th>
                    <th>Lokasi</th>
                    <th>Status</th>
                </tr>
            </thead>

            <tbody>
                @forelse($registrations as $registration)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $registration->event->title }}</td>
                    <td>{{ $registration->event->date }}</td>
                    <td>{{ $registration->event->location }}</td>
                    <td>
                        <span class="status">
                            {{ $registration->status }}
                        </span>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="empty">
                        Belum ada pendaftaran.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>

    </div>

</div>


<style>
    /* ===== CARD ===== */

    .table-box{
        background:#fff;
        padding:25px;
        border-radius:18px;
        border:1px solid #EEE4DB;
        box-shadow:0 8px 20px rgba(0,0,0,.06);
    }


    /* ===== HEADER ===== */

    .table-header{
        display:flex;
        justify-content:space-between;
        align-items:center;
        margin-bottom:25px;
    }

    .table-header h2{
        margin:0;
        font-size:28px;
        color:#6F4E37;
        font-weight:700;
    }


    /* ===== TABLE ===== */

    table{
        width:100%;
        border-collapse:collapse;
        background:#fff;
        border-radius:15px;
        overflow:hidden;
    }

    th{
        background:#F3E8DD;
        color:#6F4E37;
        padding:15px;
        text-align:left;
        font-weight:700;
    }

    td{
        padding:15px;
        border-bottom:1px solid #EEE4DB;
        color:#8B7A6B;
    }

    tbody tr:hover{
        background:#FCF8F5;
        transition:.3s;
    }


    /* ===== STATUS ===== */

    .status{
        background:#F3E8DD;
        color:#6F4E37;
        padding:7px 15px;
        border-radius:20px;
        font-size:14px;
        font-weight:600;
    }


    /* ===== EMPTY ===== */

    .empty{
        text-align:center;
        padding:30px;
        color:#8B7A6B;
    }


    /* ===== ALERT ===== */

    .alert-success{
        background:#F5EFE8;
        border:1px solid #E8D6C5;
        color:#6F4E37;
        border-radius:12px;
        padding:12px 18px;
        margin-bottom:20px;
    }

</style>

@endsection