@extends('layouts.user')

@section('content')

<!-- HEADER -->
<section class="about-header">

    <h1>Tentang Event Kampus</h1>

    <p>
        Event Kampus merupakan sistem informasi berbasis web yang dirancang
        untuk memudahkan mahasiswa mendapatkan informasi kegiatan kampus
        serta melakukan pendaftaran event secara online dengan cepat,
        mudah, dan praktis.
    </p>

</section>


<!-- TUJUAN VISI MISI -->
<section class="about-section">

    <div class="about-card">
        <h2>Tujuan</h2>

        <p>
            Mempermudah mahasiswa dalam mencari informasi event serta
            melakukan pendaftaran secara online kapan saja dan di mana saja.
        </p>
    </div>


    <div class="about-card">
        <h2>Visi</h2>

        <p>
            Menjadi media informasi dan pendaftaran event kampus yang
            modern, mudah digunakan, dan bermanfaat bagi mahasiswa.
        </p>
    </div>


    <div class="about-card">
        <h2>Misi</h2>

        <ul>
            <li>Menyediakan informasi event secara lengkap.</li>
            <li>Mempermudah proses pendaftaran peserta.</li>
            <li>Meningkatkan partisipasi mahasiswa.</li>
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
                Isi data pendaftaran secara online.
            </p>
        </div>


        <div class="flow-card">
            <div class="number">3</div>

            <h3>Ikuti Event</h3>

            <p>
                Hadiri event sesuai jadwal yang tersedia.
            </p>
        </div>

    </div>

</section>



<!-- PENGEMBANG -->
<section class="developer">

    <h2>Pengembang Sistem</h2>

    <div class="developer-card">

        <div class="avatar">
            👤
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
        lainnya. Daftar sekarang dan jadilah bagian dari pengalaman
        berharga di kampus.
    </p>

    <a href="{{ url('/events-user') }}" class="btn-about">
        Jelajahi Event
    </a>

</section>

<style>
/* ===== BACKGROUND ===== */
.about-header,
.about-section,
.flow,
.developer{
    background:#FCF8F5;
}

/* ===== HEADER CARD ===== */
.about-header{
    padding:70px 20px;
}

.header-box{
    max-width:900px;
    margin:auto;
    background:white;
    padding:45px;
    text-align:center;
    border-radius:25px;
    border:1px solid #EEE4DB;
    box-shadow:0 10px 25px rgba(0,0,0,.06);
}

.header-box h1{
    color:#6F4E37;
    font-size:40px;
    font-weight:800;
    margin-bottom:20px;
}

.header-box p{
    color:#8B7A6B;
    line-height:1.8;
    font-size:16px;
}

/* ===== TUJUAN VISI MISI ===== */
.about-section{
    max-width:1200px;
    margin:auto;
    padding:40px 20px 70px;
    display:grid;
    grid-template-columns:repeat(auto-fit,minmax(300px,1fr));
    gap:25px;
}

.about-card{
    background:white;
    padding:35px;
    border-radius:22px;
    border:1px solid #EEE4DB;
    box-shadow:0 10px 25px rgba(0,0,0,.06);
    transition:.3s;

}

.about-card:hover{
    transform:translateY(-8px);
}

.icon{
    font-size:35px;
    margin-bottom:15px;
}

.about-card h2{
    color:#6F4E37;
    margin-bottom:15px;
}
.about-card p,

.about-card li{
    color:#8B7A6B;
    line-height:1.8;
}

.about-card ul{
    padding-left:20px;
}

/* ===== ALUR EVENT ===== */
.flow{
    padding:70px 20px;
}

.flow h2{
    text-align:center;
    color:#6F4E37;
    font-size:32px;
    margin-bottom:40px;
}

.flow-container{
    max-width:1200px;
    margin:auto;
    display:grid;
    grid-template-columns:repeat(auto-fit,minmax(250px,1fr));
    gap:25px;
}

.flow-card{
    background:white;
    padding:35px 25px;
    text-align:center;
    border-radius:22px;
    box-shadow:0 10px 25px rgba(0,0,0,.06);
    transition:.3s;
}

.flow-card:hover{
    transform:translateY(-8px);
}

.number{
    width:60px;
    height:60px;
    background:#B88A6D;
    color:white;
    border-radius:50%;
    display:flex;
    justify-content:center;
    align-items:center;
    margin:0 auto 20px;
    font-size:24px;
    font-weight:bold;
}

.flow-card h3{
    color:#6F4E37;
}

.flow-card p{
    color:#8B7A6B;
}

/* ===== DEVELOPER ===== */
.developer{
    padding:70px 20px;
    text-align:center;
}

.developer h2{
    color:#6F4E37;
    margin-bottom:30px;
}

.developer-card{
    max-width:600px;
    margin:auto;
    background:white;
    padding:40px;
    border-radius:25px;
    box-shadow:0 10px 25px rgba(0,0,0,.06);
}

.avatar{
    width:90px;
    height:90px;
    margin:auto;
    background:#F3E8DD;
    border-radius:50%;
    display:flex;
    justify-content:center;
    align-items:center;
    font-size:45px;
    margin-bottom:20px;
}

.developer-card h3{
    color:#6F4E37;
}

.developer-card p{
    color:#8B7A6B;
    line-height:1.8;
}

/* ===== PENUTUP ===== */
.closing{
    background:linear-gradient(135deg,#fdd6bb);
    color:white;
    text-align:center;
    padding:70px 20px;
    margin-top:50px;
}

.closing h2{
    font-size:32px;
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
    background:white;
    color:#6F4E37;
    padding:14px 35px;
    border-radius:30px;
    text-decoration:none;
    font-weight:700;
    transition:.3s;
}

.btn-about:hover{
    background:#F3E8DD;

}

/* ===== MOBILE ===== */
@media(max-width:768px){
    .header-box h1{
        font-size:30px;
    }
}
</style>

@endsection