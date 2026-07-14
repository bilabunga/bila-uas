@extends('layouts.admin')

@section('content')

<div class="form-card">

    <div class="header">
        <h2>Edit Kategori</h2>
        <p>Ubah data kategori</p>
    </div>

    <form action="{{ route('categories.update', $category->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label>Nama Kategori</label>

            <input
                type="text"
                name="name"
                value="{{ old('name', $category->name) }}"
                required>

            @error('name')
                <small style="color:red;">{{ $message }}</small>
            @enderror
        </div>

        <div class="button-group">

            <a href="{{ route('categories.index') }}" class="btn-back">
                Kembali
            </a>

            <button type="submit" class="btn-save">
                Update Kategori
            </button>

        </div>

    </form>

</div>

<style>
    .form-card{
        width:100%;
        max-width:600px;
        margin:20px auto;
        background:#fff;
        border:1px solid #EEE4DB;
        border-radius:18px;
        padding:30px;
        box-shadow:0 8px 20px rgba(0,0,0,.06);
    }

    .header{
        margin-bottom:25px;
    }

    .header h2{
        color:#6F4E37;
        font-size:28px;
        margin-bottom:8px;
    }

    .header p{
        color:#8B7A6B;
    }

    .form-group{
        margin-bottom:20px;
    }

    .form-group label{
        display:block;
        margin-bottom:8px;
        font-weight:600;
        color:#6F4E37;
    }

    .form-group input{
        width:100%;
        padding:12px 15px;
        border:1px solid #DDD3CB;
        border-radius:10px;
        outline:none;
        font-size:15px;
        color:#6F4E37;
        transition:.3s;
    }

    .form-group input:focus{
        border-color:#B88A6D;
        box-shadow:0 0 0 3px rgba(184,138,109,.15);
    }

    .button-group{
        display:flex;
        justify-content:flex-end;
        gap:12px;
        margin-top:30px;
    }

    .btn-back{
        text-decoration:none;
        background:#EFE5DC;
        color:#6F4E37;
        padding:12px 24px;
        border-radius:10px;
        font-weight:600;
        transition:.3s;
    }

    .btn-back:hover{
        background:#E3D5C8;
    }

    .btn-save{
        border:none;
        background:#B88A6D;
        color:#fff;
        padding:12px 24px;
        border-radius:10px;
        font-weight:600;
        cursor:pointer;
        transition:.3s;
    }

    .btn-save:hover{
        background:#A8795C;
    }

    small{
        display:block;
        margin-top:6px;
        color:#D97A7A;
    }

    @media(max-width:768px){

        .form-card{
            padding:20px;
        }

        .button-group{
            flex-direction:column;
        }

        .btn-back,
        .btn-save{
            width:100%;
            text-align:center;
        }

    }
</style>

@endsection