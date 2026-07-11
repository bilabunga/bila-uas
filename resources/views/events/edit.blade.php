<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Event</title>

    @vite(['resources/sass/app.scss','resources/js/app.js'])
</head>

<body>

<div class="container">

    <div class="form-card">

        <div class="header">

            <h2>Edit Event</h2>

            <p>Ubah data event di bawah ini.</p>

        </div>

        <form action="{{ route('events.update', $event->id) }}" method="POST">

            @csrf
            @method('PUT')

            <div class="form-group">

                <label>Judul Event</label>

                <input
                    type="text"
                    name="title"
                    value="{{ old('title', $event->title) }}"
                    required>

            </div>

            <div class="form-group">

                <label>Tagline</label>

                <input
                    type="text"
                    name="tagline"
                    value="{{ old('tagline', $event->tagline) }}"
                    required>

            </div>

            <div class="form-group">

                <label>Kategori</label>

                <select name="category_id" required>

                    @foreach($categories as $category)

                        <option value="{{ $category->id }}"
                            {{ $event->category_id == $category->id ? 'selected' : '' }}>
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
                    value="{{ old('date', $event->date) }}"
                    required>

            </div>

            <div class="form-group">

                <label>Lokasi</label>

                <input
                    type="text"
                    name="location"
                    value="{{ old('location', $event->location) }}"
                    required>

            </div>

            <div class="form-group">

                <label>Kuota</label>

                <input
                    type="number"
                    name="quota"
                    value="{{ old('quota', $event->quota) }}"
                    required>

            </div>

            <div class="form-group">

                <label>Deskripsi</label>

                <textarea
                    name="description"
                    rows="5"
                    required>{{ old('description', $event->description) }}</textarea>

            </div>

            <div class="button-group">

                <a href="{{ route('events.index') }}" class="btn-back">

                    Kembali

                </a>

                <button type="submit" class="btn-save">

                    Update Event

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
    background:#f4f7fb;
}

.container{
    width:100%;
    min-height:100vh;
    display:flex;
    justify-content:center;
    align-items:center;
    padding:40px 20px;
}

.form-card{
    width:100%;
    max-width:700px;
    background:#fff;
    border-radius:18px;
    padding:35px;
    box-shadow:0 15px 35px rgba(0,0,0,.08);
}

.header{
    margin-bottom:30px;
}

.header h2{
    color:#2563eb;
    font-size:30px;
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
    font-weight:600;
    margin-bottom:8px;
    color:#334155;
}

.form-group input,
.form-group select,
.form-group textarea{
    width:100%;
    padding:12px 15px;
    border:1px solid #dbe2ea;
    border-radius:10px;
    outline:none;
    font-size:15px;
    transition:.3s;
}

.form-group input:focus,
.form-group select:focus,
.form-group textarea:focus{
    border-color:#2563eb;
    box-shadow:0 0 0 3px rgba(37,99,235,.15);
}

textarea{
    resize:none;
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
}

.btn-save{
    border:none;
    background:#2563eb;
    color:#fff;
    padding:12px 24px;
    border-radius:10px;
    font-weight:600;
    cursor:pointer;
}

@media(max-width:768px){

    .form-card{
        padding:25px;
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