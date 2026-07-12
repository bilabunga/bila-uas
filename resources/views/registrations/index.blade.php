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
                        <span style="color: orange; font-weight:600;">
                            Pending
                        </span>
                    @elseif($registration->status == 'Approved')
                        <span style="color: green; font-weight:600;">
                            Approved
                        </span>
                    @else
                        <span style="color: red; font-weight:600;">
                            Rejected
                        </span>
                    @endif
                </td>


                <td>

                    @if($registration->status == 'Pending')

                    <form action="{{ route('registrations.approve', $registration->id) }}"
                          method="POST"
                          style="display:inline;">

                        @csrf

                        <button class="acc">
                            ACC
                        </button>

                    </form>


                    <form action="{{ route('registrations.reject', $registration->id) }}"
                          method="POST"
                          style="display:inline;">

                        @csrf

                        <button class="tolak">
                            Tolak
                        </button>

                    </form>

                    @endif


                    <form action="{{ route('registrations.destroy', $registration->id) }}"
                          method="POST"
                          style="display:inline;">

                        @csrf
                        @method('DELETE')

                        <button class="hapus"
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

.table-box{
    background:#fff;
    border-radius:15px;
    padding:25px;
    box-shadow:0 10px 25px rgba(0,0,0,.08);
}

.table-header{
    margin-bottom:20px;
}

.table-header h2{
    font-size:28px;
    color:#1e293b;
}

table{
    width:100%;
    border-collapse:collapse;
    background:#fff;
}

thead{
    background:#2563eb;
    color:white;
}

th{
    padding:15px;
    text-align:left;
}

td{
    padding:15px;
    border-bottom:1px solid #eee;
}

tbody tr:hover{
    background:#f8fafc;
}


/* tombol ACC */
.acc{
    border:none;
    background:#22c55e;
    color:white;
    padding:7px 12px;
    border-radius:6px;
    cursor:pointer;
    font-weight:600;
}

.acc:hover{
    background:#16a34a;
}


/* tombol Tolak */
.tolak{
    border:none;
    background:#ef4444;
    color:white;
    padding:7px 12px;
    border-radius:6px;
    cursor:pointer;
    font-weight:600;
}

.tolak:hover{
    background:#dc2626;
}


/* tombol Hapus */
.hapus{
    border:none;
    background:none;
    color:#ef4444;
    font-weight:600;
    cursor:pointer;
}

.hapus:hover{
    color:#dc2626;
}


.empty{
    text-align:center;
    color:#64748b;
    padding:20px;
}


@media(max-width:768px){

    table{
        display:block;
        overflow-x:auto;
        white-space:nowrap;
    }

}

</style>

@endsection