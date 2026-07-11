@extends('layouts.admin')

@section('content')

<div class="table-box">

    <div class="table-header">
        <h2>Kelola Event</h2>

        <a href="{{ route('events.create') }}" class="btn">
            + Tambah Event
        </a>
    </div>

    <table>
        <thead>
            <tr>
                <th>Judul</th>
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
                <a href="{{ route('events.edit',$event->id) }}" class="edit">
                    Edit
                </a>

                |

                <form action="{{ route('events.destroy',$event->id) }}"
                      method="POST"
                      style="display:inline;">

                    @csrf
                    @method('DELETE')

                    <button type="submit"
                        onclick="return confirm('Hapus event ini?')"
                        class="hapus">
                        Hapus
                    </button>

                </form>
            </td>

        </tr>
        @empty

        <tr>
            <td colspan="5" style="text-align:center">
                Belum ada event
            </td>
        </tr>

        @endforelse

        </tbody>
    </table>

</div>

<style>
.table-box{
    background:white;
    padding:20px;
    border-radius:12px;
    box-shadow:0 10px 25px rgba(0,0,0,.08);
}

.table-header{
    display:flex;
    justify-content:space-between;
    align-items:center;
    margin-bottom:15px;
}

.table-header h2{
    margin:0;
}

.btn{
    background:#2563eb;
    color:white;
    text-decoration:none;
    padding:10px 18px;
    border-radius:8px;
}

table{
    width:100%;
    border-collapse:collapse;
    background:white;
    overflow:hidden;
    border-radius:10px;
}

th{
    background:#2563eb;
    color:white;
    padding:15px;
}

td{
    padding:15px;
    border-bottom:1px solid #eee;
}

.edit{
    color:#2563eb;
    text-decoration:none;
    font-weight:bold;
}

.hapus{
    border:none;
    background:none;
    color:red;
    cursor:pointer;
    font-weight:bold;
}
</style>

@endsection