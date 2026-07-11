@extends('layouts.admin')

@section('content')

<div class="form-box">

    <h2>Tambah Kategori</h2>

    <form action="{{ route('categories.store') }}" method="POST">
        @csrf

        <input type="text" name="name" placeholder="Nama kategori">

        @error('name')
            <p style="color:red;">{{ $message }}</p>
        @enderror

        <button type="submit" class="btn">
            Simpan
        </button>

    </form>

</div>

<style>
.form-box{
    background:white;
    padding:25px;
    border-radius:12px;
    box-shadow:0 10px 25px rgba(0,0,0,.08);
    max-width:500px;
    margin-top:20px;
}

.form-box h2{
    margin-bottom:15px;
    color:#1e293b;
}

input[type="text"]{
    width:100%;
    padding:12px;
    border:1px solid #ddd;
    border-radius:8px;
    outline:none;
    transition:.2s;
}

input[type="text"]:focus{
    border-color:#2563eb;
    box-shadow:0 0 0 3px rgba(37,99,235,.1);
}

.btn{
    margin-top:15px;
    background:#2563eb;
    color:white;
    border:none;
    padding:10px 18px;
    border-radius:8px;
    cursor:pointer;
    font-weight:600;
    transition:.2s;
}

.btn:hover{
    background:#1d4ed8;
}
</style>

@endsection