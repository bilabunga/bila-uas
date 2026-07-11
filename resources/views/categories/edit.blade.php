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
    border-radius:16px;
    padding:30px;
    box-shadow:0 10px 25px rgba(0,0,0,.08);
}

.header{
    margin-bottom:25px;
}

.header h2{
    color:#2563eb;
    font-size:28px;
    margin-bottom:8px;
}

.header p{
    color:#64748b;
}

.form-group{
    margin-bottom:20px;
}

.form-group label{
    display:block;
    margin-bottom:8px;
    font-weight:600;
    color:#334155;
}

.form-group input{
    width:100%;
    padding:12px 15px;
    border:1px solid #dbe2ea;
    border-radius:10px;
    outline:none;
    font-size:15px;
    transition:.3s;
}

.form-group input:focus{
    border-color:#2563eb;
    box-shadow:0 0 0 3px rgba(37,99,235,.15);
}

.button-group{
    display:flex;
    justify-content:flex-end;
    gap:12px;
    margin-top:30px;
}

.btn-back{
    text-decoration:none;
    background:#e2e8f0;
    color:#334155;
    padding:12px 24px;
    border-radius:10px;
    font-weight:600;
    transition:.3s;
}

.btn-back:hover{
    background:#cbd5e1;
}

.btn-save{
    border:none;
    background:#2563eb;
    color:#fff;
    padding:12px 24px;
    border-radius:10px;
    font-weight:600;
    cursor:pointer;
    transition:.3s;
}

.btn-save:hover{
    background:#1d4ed8;
}

small{
    display:block;
    margin-top:6px;
    color:#ef4444;
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