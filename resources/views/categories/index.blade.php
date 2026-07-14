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

            <td>{{ optional($category->created_at)->format('d-m-Y') ?? '-' }}</td>

            <td class="aksi">

                <a href="{{ route('categories.edit',$category->id) }}" class="edit">
                    Edit
                </a>

                <span class="separator">|</span>

                <form action="{{ route('categories.destroy',$category->id) }}"
                      method="POST"
                      style="display:inline;">

                    @csrf
                    @method('DELETE')

                    <button type="submit"
                        class="hapus"
                        onclick="return confirm('Hapus kategori ini?')">

                        Hapus

                    </button>

                </form>

            </td>

        </tr>

        @empty

        <tr>
            <td colspan="3" class="empty">
                Belum ada kategori
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
        display:flex;
        justify-content:space-between;
        align-items:center;
        margin-bottom:25px;
    }

    .table-header h2{
        margin:0;
        font-size:28px;
        color:#6F4E37;
    }

    /* ===== TOMBOL TAMBAH ===== */

    .btn{
        display:inline-block;
        background:#B88A6D;
        color:#fff;
        text-decoration:none;
        padding:12px 22px;
        border-radius:10px;
        font-weight:600;
        transition:.3s;
    }

    .btn:hover{
        background:#A8795C;
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
    }

    td{
        padding:15px;
        border-bottom:1px solid #EEE4DB;
        color:#8B7A6B;
    }

    tbody tr:hover{
        background:#FCF8F5;
    }

    /* ===== AKSI ===== */

    .aksi{
        white-space:nowrap;
    }

    .separator{
        color:#B88A6D;
        margin:0 8px;
    }

    .edit{
        text-decoration:none;
        color:#B88A6D;
        font-weight:600;
        transition:.3s;
    }

    .edit:hover{
        color:#A8795C;
        text-decoration:underline;
    }

    .hapus{
        border:none;
        background:none;
        padding:0;
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
</style>

@endsection