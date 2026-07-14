@extends('layouts.admin')

@section('content')

<div class="form-box">

    <h2>Tambah Kategori</h2>

    <form action="{{ route('categories.store') }}" method="POST">
        @csrf

        <input
            type="text"
            name="name"
            placeholder="Masukkan nama kategori"
            value="{{ old('name') }}">

        @error('name')
            <p class="error">{{ $message }}</p>
        @enderror

        <div class="button-group">

            <a href="{{ route('categories.index') }}" class="btn-back">
                Kembali
            </a>

            <button type="submit" class="btn">
                Simpan
            </button>

        </div>

    </form>

</div>

<style>

.form-box{
    background:#fff;
    padding:30px;
    border-radius:18px;
    border:1px solid #EEE4DB;
    box-shadow:0 8px 20px rgba(0,0,0,.06);
    max-width:550px;
    margin:20px auto;
}

.form-box h2{
    margin-bottom:20px;
    color:#6F4E37;
    font-size:28px;
}

input[type="text"]{
    width:100%;
    padding:12px 15px;
    border:1px solid #DDD3CB;
    border-radius:10px;
    outline:none;
    font-size:14px;
    color:#6F4E37;
    transition:.3s;
}

input[type="text"]:focus{
    border-color:#B88A6D;
    box-shadow:0 0 0 3px rgba(184,138,109,.15);
}

.button-group{
    display:flex;
    justify-content:flex-end;
    gap:12px;
    margin-top:20px;
}

.btn-back{
    text-decoration:none;
    background:#EFE5DC;
    color:#6F4E37;
    padding:12px 22px;
    border-radius:10px;
    font-weight:600;
    transition:.3s;
}

.btn-back:hover{
    background:#E3D5C8;
}

.btn{
    background:#B88A6D;
    color:#fff;
    border:none;
    padding:12px 22px;
    border-radius:10px;
    cursor:pointer;
    font-weight:600;
    transition:.3s;
}

.btn:hover{
    background:#A8795C;
}

.error{
    color:#D97A7A;
    margin-top:8px;
    font-size:14px;
}

@media(max-width:768px){

    .form-box{
        margin:15px;
        padding:20px;
    }

    .button-group{
        flex-direction:column;
    }

    .btn,
    .btn-back{
        width:100%;
        text-align:center;
    }

}

</style>

@endsection