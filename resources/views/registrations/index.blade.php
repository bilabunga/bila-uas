@extends('layouts.admin')

@section('content')

<div class="table-box">

    <div class="table-header">
        <h2>Data Pendaftaran</h2>
    </div>

    <table>

        <thead>
            <tr>
                <th>Nama Peserta</th>
                <th>Email</th>
                <th>No. HP</th>
                <th>Event</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>

        <tbody>

        @forelse($registrations as $registration)

        <tr>

            <td>{{ $registration->name }}</td>
            <td>{{ $registration->email }}</td>
            <td>{{ $registration->phone }}</td>
            <td>{{ $registration->event->title ?? '-' }}</td>

            <td>
                @if($registration->status == 'Pending')
                    <span class="status-pending">Pending</span>
                @elseif($registration->status == 'Approved')
                    <span class="status-approved">Approved</span>
                @else
                    <span class="status-rejected">Rejected</span>
                @endif
            </td>

            <td class="aksi">

                @if($registration->status == 'Pending')

                <form action="{{ route('registrations.approve',$registration->id) }}"
                      method="POST"
                      style="display:inline;">

                    @csrf

                    <button type="submit" class="acc">
                        ACC
                    </button>

                </form>

                <form action="{{ route('registrations.reject',$registration->id) }}"
                      method="POST"
                      style="display:inline;">

                    @csrf

                    <button type="submit" class="tolak">
                        Tolak
                    </button>

                </form>

                @endif

                <form action="{{ route('registrations.destroy',$registration->id) }}"
                      method="POST"
                      style="display:inline;">

                    @csrf
                    @method('DELETE')

                    <button
                        type="submit"
                        class="hapus"
                        onclick="return confirm('Yakin ingin menghapus data ini?')">

                        Hapus

                    </button>

                </form>

            </td>

        </tr>

        @empty

        <tr>
            <td colspan="6" class="empty">
                Belum ada data pendaftaran.
            </td>
        </tr>

        @endforelse

        </tbody>

    </table>

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
    margin-bottom:25px;
}

.table-header h2{
    font-size:28px;
    color:#6F4E37;
}

/* ===== TABLE ===== */

table{
    width:100%;
    border-collapse:collapse;
    background:#fff;
    border-radius:15px;
    overflow:hidden;
}

thead{
    background:#F3E8DD;
}

th{
    padding:15px;
    text-align:left;
    color:#6F4E37;
    font-size:13px;
    white-space: nowrap;
}

td{
    padding:15px;
    border-bottom:1px solid #EEE4DB;
    color:#8B7A6B;
    font-size:13px;
    vertical-align:middle;
}

tbody tr:hover{
    background:#FCF8F5;
}

/* ===== STATUS ===== */

.status-pending{
    color:#C58A00;
    font-weight:600;
}

.status-approved{
    color:#5E8C61;
    font-weight:600;
}

.status-rejected{
    color:#D97A7A;
    font-weight:600;
}

/* ===== AKSI ===== */

.aksi{
    white-space:nowrap;
}

.acc{
    border:none;
    background:#7FB77E;
    color:#fff;
    padding:8px 14px;
    border-radius:8px;
    cursor:pointer;
    font-weight:600;
    transition:.3s;
    margin-right:6px;
}

.acc:hover{
    background:#659D63;
}

.tolak{
    border:none;
    background:#D97A7A;
    color:#fff;
    padding:8px 14px;
    border-radius:8px;
    cursor:pointer;
    font-weight:600;
    transition:.3s;
    margin-right:6px;
}

.tolak:hover{
    background:#C95E5E;
}

.hapus{
    border:none;
    background:none;
    color:#D97A7A;
    cursor:pointer;
    font-weight:600;
    transition:.3s;
}

.hapus:hover{
    color:#C95E5E;
    text-decoration:underline;
}

/* ===== EMPTY ===== */

.empty{
    text-align:center;
    padding:30px;
    color:#8B7A6B;
}

/* ===== RESPONSIVE ===== */

@media(max-width:768px){

    table{
        display:block;
        overflow-x:auto;
        white-space:nowrap;
    }

}
</style>

@endsection