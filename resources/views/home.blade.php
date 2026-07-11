@extends('layouts.user')

@section('content')

<div class="hero">

    <div class="hero-text">

        <h1>Temukan Event Kampus Terbaik</h1>

        <p>
            Ikuti seminar, workshop, lomba, dan berbagai kegiatan kampus
            untuk mengembangkan kemampuan serta menambah pengalaman.
        </p>

        <a href="{{ route('events.user') }}" class="btn-hero">
            Lihat Event
        </a>

    </div>

</div>

<div class="section">

    <h2>Kenapa Bergabung?</h2>

    <div class="card-wrapper">

        <div class="card">
            <h3>Seminar</h3>
            <p>Menambah wawasan dari pembicara profesional.</p>
        </div>

        <div class="card">
            <h3>Lomba</h3>
            <p>Mengasah kemampuan dan mendapatkan prestasi.</p>
        </div>

        <div class="card">
            <h3>Networking</h3>
            <p>Bertemu teman dan relasi baru dari berbagai jurusan.</p>
        </div>

    </div>

</div>

@endsection

<style>

.hero{
    background:linear-gradient(135deg,#2563eb,#1e40af);
    color:white;
    border-radius:20px;
    padding:70px 50px;
    text-align:center;
}

.hero h1{
    font-size:42px;
    margin-bottom:15px;
}

.hero p{
    font-size:18px;
    max-width:700px;
    margin:auto;
    line-height:1.7;
}

.btn-hero{
    display:inline-block;
    margin-top:30px;
    background:white;
    color:#2563eb;
    padding:14px 28px;
    border-radius:10px;
    text-decoration:none;
    font-weight:bold;
    transition:.3s;
}

.btn-hero:hover{
    background:#e2e8f0;
}

.section{
    margin-top:60px;
}

.section h2{
    text-align:center;
    margin-bottom:35px;
    color:#1e293b;
}

.card-wrapper{
    display:grid;
    grid-template-columns:repeat(3,1fr);
    gap:25px;
}

.card{
    background:white;
    border-radius:15px;
    padding:30px;
    box-shadow:0 10px 25px rgba(0,0,0,.08);
    text-align:center;
}

.card h3{
    margin-bottom:15px;
    color:#2563eb;
}

.card p{
    color:#64748b;
}

@media(max-width:768px){

    .hero{
        padding:50px 25px;
    }

    .hero h1{
        font-size:30px;
    }

    .card-wrapper{
        grid-template-columns:1fr;
    }

}

</style>