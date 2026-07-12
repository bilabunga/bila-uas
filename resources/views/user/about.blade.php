@extends('layouts.user')

@section('content')

<!-- HEADER -->
<section class="about-header">

    <h1>Tentang Event Kampus</h1>

    <p>
        Event Kampus adalah sistem informasi berbasis web yang dirancang
        untuk memudahkan mahasiswa memperoleh informasi mengenai berbagai
        kegiatan kampus serta melakukan pendaftaran secara online dengan
        cepat, mudah, dan praktis.
    </p>

</section>

<!-- TUJUAN VISI MISI -->
<section class="about-section">

    <div class="about-card">

        <h2>🎯 Tujuan</h2>

        <p>
            Mempermudah mahasiswa dalam mencari informasi event serta
            melakukan pendaftaran secara online kapan saja dan di mana saja.
        </p>

    </div>

    <div class="about-card">

        <h2>👁️ Visi</h2>

        <p>
            Menjadi media informasi dan pendaftaran event kampus yang
            modern, mudah digunakan, dan bermanfaat bagi seluruh mahasiswa.
        </p>

    </div>

    <div class="about-card">

        <h2>🚀 Misi</h2>

        <ul>
            <li>Menyediakan informasi event secara lengkap.</li>
            <li>Mempermudah proses pendaftaran peserta.</li>
            <li>Meningkatkan partisipasi mahasiswa dalam kegiatan kampus.</li>
            <li>Mendukung digitalisasi kegiatan kampus.</li>
        </ul>

    </div>

</section>

<!-- ALUR -->
<section class="flow">

    <h2>Alur Pendaftaran Event</h2>

    <div class="flow-container">

        <div class="flow-card">

            <div class="number">1</div>

            <h3>Pilih Event</h3>

            <p>
                Pilih event yang ingin kamu ikuti sesuai minat.
            </p>

        </div>

        <div class="flow-card">

            <div class="number">2</div>

            <h3>Daftar Event</h3>

            <p>
                Lengkapi data pendaftaran secara online.
            </p>

        </div>

        <div class="flow-card">

            <div class="number">3</div>

            <h3>Ikuti Event</h3>

            <p>
                Hadiri event sesuai jadwal yang telah ditentukan.
            </p>

        </div>

    </div>

</section>

<!-- PENGEMBANG -->
<section class="developer">

    <h2>Pengembang Sistem</h2>

    <div class="developer-card">

        <div class="avatar">
            👩🏻‍💻
        </div>

        <h3>Nabila Bunga A</h3>

        <p>
            Website Sistem Pendaftaran Event Kampus ini dibuat sebagai
            proyek UAS Mata Kuliah Pemrograman Web.
        </p>

    </div>

</section>

<!-- PENUTUP -->
<section class="closing">

    <h2>Siap Mengikuti Event Kampus?</h2>

    <p>
        Temukan berbagai seminar, workshop, lomba, dan kegiatan menarik
        lainnya. Daftar sekarang dan jadilah bagian dari setiap pengalaman
        berharga di kampus.
    </p>

    <a href="{{ url('/events-user') }}" class="btn-about">
        Jelajahi Event
    </a>

</section>

@endsection

<style>

.about-header{
    background:linear-gradient(135deg,#2563eb,#1e40af);
    color:#fff;
    text-align:center;
    padding:80px 20px;
}

.about-header h1{
    font-size:42px;
    margin-bottom:20px;
}

.about-header p{
    max-width:750px;
    margin:auto;
    line-height:1.8;
}

.about-section{
    max-width:1200px;
    margin:70px auto;
    padding:0 20px;
    display:grid;
    grid-template-columns:repeat(auto-fit,minmax(300px,1fr));
    gap:25px;
}

.about-card{
    background:#fff;
    padding:30px;
    border-radius:18px;
    box-shadow:0 10px 25px rgba(0,0,0,.08);
    transition:.3s;
}

.about-card:hover{
    transform:translateY(-8px);
}

.about-card h2{
    color:#2563eb;
    margin-bottom:20px;
}

.about-card p,
.about-card li{
    color:#64748b;
    line-height:1.8;
}

.about-card ul{
    padding-left:20px;
}

/* Flow */

.flow{
    max-width:1200px;
    margin:80px auto;
    padding:0 20px;
}

.flow h2{
    text-align:center;
    margin-bottom:40px;
    color:#2563eb;
}

.flow-container{
    display:grid;
    grid-template-columns:repeat(auto-fit,minmax(250px,1fr));
    gap:25px;
}

.flow-card{
    background:#fff;
    padding:30px;
    border-radius:18px;
    text-align:center;
    box-shadow:0 10px 25px rgba(0,0,0,.08);
}

.number{
    width:60px;
    height:60px;
    background:#2563eb;
    color:#fff;
    border-radius:50%;
    display:flex;
    justify-content:center;
    align-items:center;
    margin:auto;
    font-size:24px;
    font-weight:bold;
    margin-bottom:20px;
}

/* Developer */

.developer{
    max-width:700px;
    margin:80px auto;
    text-align:center;
}

.developer h2{
    color:#2563eb;
    margin-bottom:30px;
}

.developer-card{
    background:#fff;
    padding:35px;
    border-radius:18px;
    box-shadow:0 10px 25px rgba(0,0,0,.08);
}

.avatar{
    width:90px;
    height:90px;
    margin:auto;
    border-radius:50%;
    background:#dbeafe;
    display:flex;
    justify-content:center;
    align-items:center;
    font-size:45px;
    margin-bottom:20px;
}

/* Closing */

.closing{
    background:#2563eb;
    color:#fff;
    text-align:center;
    padding:70px 20px;
    margin-top:80px;
}

.closing h2{
    margin-bottom:20px;
}

.closing p{
    max-width:700px;
    margin:auto;
    line-height:1.8;
    margin-bottom:30px;
}

.btn-about{
    display:inline-block;
    text-decoration:none;
    background:#fff;
    color:#2563eb;
    padding:14px 30px;
    border-radius:30px;
    font-weight:600;
    transition:.3s;
}

.btn-about:hover{
    background:#f3f4f6;
}

@media(max-width:768px){

.about-header h1{
    font-size:32px;
}

}

</style>