<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Event</title>

    @vite(['resources/sass/app.scss','resources/js/app.js'])
</head>

<body>

<div class="container">

    <div class="form-card">

        <div class="header">
            <h2>Tambah Event</h2>
            <p>Lengkapi data event di bawah ini.</p>
        </div>

        <form action="{{ route('events.store') }}" method="POST" enctype="multipart/form-data">

            @csrf

            <div class="form-group">
                <label>Judul Event</label>
                <input
                    type="text"
                    name="title"
                    value="{{ old('title') }}"
                    required>
            </div>

            <div class="form-group">
                <label>Tagline</label>
                <input
                    type="text"
                    name="tagline"
                    value="{{ old('tagline') }}"
                    required>
            </div>

            <div class="form-group">
                <label>Poster Event</label>

                <input
                    type="file"
                    name="image"
                    accept="image/*">

                <small>
                    Upload gambar JPG, JPEG atau PNG (Maksimal 2 MB)
                </small>
            </div>

            <div class="form-group">
                <label>Kategori</label>

                <select name="category_id" required>

                    <option value="">-- Pilih Kategori --</option>

                    @foreach($categories as $category)

                        <option value="{{ $category->id }}">
                            {{ $category->name }}
                        </option>

                    @endforeach

                </select>
            </div>

            <div class="form-group">
                <label>Tanggal Event</label>

                <input
                    type="date"
                    name="date"
                    value="{{ old('date') }}"
                    required>
            </div>

            <div class="form-group">
                <label>Lokasi</label>

                <input
                    type="text"
                    name="location"
                    value="{{ old('location') }}"
                    required>
            </div>

            <div class="form-group">
                <label>Kuota</label>

                <input
                    type="number"
                    name="quota"
                    value="{{ old('quota') }}"
                    required>
            </div>

            <div class="form-group">
                <label>Deskripsi</label>

                <textarea
                    name="description"
                    rows="5"
                    required>{{ old('description') }}</textarea>
            </div>

            <div class="button-group">

                <a href="{{ route('events.index') }}" class="btn-back">
                    Kembali
                </a>

                <button type="submit" class="btn-save">
                    Simpan Event
                </button>

            </div>

        </form>

    </div>

</div>

</body>

<style>
    *{
        margin:0;
        padding:0;
        box-sizing:border-box;
        font-family:'Poppins',sans-serif;
    }

    body{
        background:#F8F5F2;
    }

    .container{
        width:100%;
        min-height:100vh;
        display:flex;
        justify-content:center;
        align-items:flex-start;
        padding:50px 20px;
    }

    .form-card{
        width:100%;
        max-width:560px;
        background:#FFFDFB;
        border-radius:18px;
        padding:30px;
        border:1px solid #EEE4DB;
        box-shadow:0 10px 25px rgba(0,0,0,.06);
    }

    .header{
        text-align:center;
        margin-bottom:28px;
    }

    .header h2{
        color:#6F4E37;
        font-size:28px;
        margin-bottom:8px;
    }

    .header p{
        color:#8B7A6B;
        font-size:14px;
    }

    .form-group{
        margin-bottom:18px;
    }

    .form-group label{
        display:block;
        margin-bottom:7px;
        color:#6F4E37;
        font-weight:600;
        font-size:14px;
    }

    .form-group input,
    .form-group select,
    .form-group textarea{
        width:100%;
        padding:11px 14px;
        border:1px solid #DDD3CA;
        border-radius:10px;
        background:#fff;
        font-size:14px;
        outline:none;
        transition:.3s;
    }

    .form-group input:focus,
    .form-group select:focus,
    .form-group textarea:focus{
        border-color:#B88A6D;
        box-shadow:0 0 0 3px rgba(184,138,109,.15);
    }

    textarea{
        resize:vertical;
        min-height:120px;
    }

    input[type="file"]{
        padding:10px;
        background:#FAF8F6;
        cursor:pointer;
    }

    .button-group{
        display:flex;
        justify-content:flex-end;
        gap:12px;
        margin-top:28px;
    }

    .btn-back{
        text-decoration:none;
        background:#E8DFD7;
        color:#6F4E37;
        padding:11px 22px;
        border-radius:10px;
        font-weight:600;
        transition:.3s;
    }

    .btn-back:hover{
        background:#DCCEC2;
    }

    .btn-save{
        border:none;
        background:#B88A6D;
        color:#fff;
        padding:11px 22px;
        border-radius:10px;
        font-weight:600;
        cursor:pointer;
        transition:.3s;
    }

    .btn-save:hover{
        background:#A8795C;
    }

    @media(max-width:768px){

        .container{
            padding:30px 15px;
        }

        .form-card{
            max-width:100%;
            padding:22px;
        }

        .header h2{
            font-size:24px;
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

</html>