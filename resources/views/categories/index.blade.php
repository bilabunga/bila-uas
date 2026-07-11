@extends('layouts.admin')

@section('content')

<div class="table-box">

    <div class="table-header">
        <h2>Kelola Kategori</h2>

        <a href="{{ route('categories.create') }}" class="btn">
            + Tambah Kategori
        </a>
    </div>

    <table>

        <thead>
            <tr>
                <th>Nama Kategori</th>
                <th>Dibuat</th>
                <th>Aksi</th>
            </tr>
        </thead>

        <tbody>

        @forelse($categories as $category)

        <tr>

            <td>{{ $category->name }}</td>

            <td>{{ optional($category->created_at)->format('d-m-Y') ??  '-' }}</td>

            <td>
                <a href="{{ route('categories.edit',$category->id) }}" class="edit">
                    Edit
                </a>

                |

                <form action="{{ route('categories.destroy',$category->id) }}"
                      method="POST"
                      style="display:inline;">

                    @csrf
                    @method('DELETE')

                    <button class="hapus"
                        onclick="return confirm('Hapus kategori ini?')">
                        Hapus
                    </button>

                </form>
            </td>

        </tr>

        @empty

        <tr>
            <td colspan="3" style="text-align:center;">
                Belum ada kategori
            </td>
        </tr>

        @endforelse

        </tbody>

    </table>

</div>

<style>

/* ===== TABLE GLOBAL (dipakai event & kategori) ===== */

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
    font-size:22px;
    color:#1e293b;
}

/* tombol tambah */
.btn{
    background:#2563eb;
    color:white;
    text-decoration:none;
    padding:10px 18px;
    border-radius:8px;
    font-weight:600;
    transition:.2s;
}

.btn:hover{
    background:#1d4ed8;
}

/* table */
table{
    width:100%;
    border-collapse:collapse;
    background:white;
    border-radius:10px;
    overflow:hidden;
}

th{
    background:#2563eb;
    color:white;
    padding:14px;
    text-align:left;
}

td{
    padding:14px;
    border-bottom:1px solid #eee;
}

/* aksi button */
.edit{
    color:#2563eb;
    text-decoration:none;
    font-weight:bold;
}

.edit:hover{
    color:#1d4ed8;
}

.hapus{
    border:none;
    background:none;
    color:red;
    cursor:pointer;
    font-weight:bold;
}

.hapus:hover{
    color:#b91c1c;
}

/* empty state */
.empty{
    text-align:center;
    padding:20px;
    color:#64748b;
}

</style>

@endsection