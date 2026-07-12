@extends('layouts.user')

@section('content')

<section class="contact-page">

    <div class="contact-header">
        <h1>Hubungi Kami</h1>
        <p>
            Jika memiliki pertanyaan mengenai event atau mengalami kendala
            saat pendaftaran, silakan hubungi kami.
        </p>
    </div>

    <div class="contact-container">

        <div class="contact-card">
            <h3>📧 Email</h3>
            <p>eventkampus@gmail.com</p>
        </div>

        <div class="contact-card">
            <h3>📱 WhatsApp</h3>
            <p>0812-3456-7890</p>
        </div>

        <div class="contact-card">
            <h3>📍 Alamat</h3>
            <p>Universitas XYZ, Bandung</p>
        </div>

        <div class="contact-card">
            <h3>🕒 Jam Operasional</h3>
            <p>Senin - Jumat<br>08.00 - 16.00 WIB</p>
        </div>

    </div>

</section>

@endsection

<style>
    
.contact-page{
    max-width:1100px;
    margin:60px auto;
    padding:20px;
}

.contact-header{
    text-align:center;
    margin-bottom:40px;
}

.contact-header h1{
    font-size:36px;
    color:#0f4c81;
    margin-bottom:10px;
}

.contact-header p{
    color:#666;
    max-width:700px;
    margin:auto;
    line-height:1.7;
}

.contact-container{
    display:grid;
    grid-template-columns:repeat(auto-fit,minmax(250px,1fr));
    gap:25px;
}

.contact-card{
    background:#fff;
    border-radius:15px;
    padding:25px;
    text-align:center;
    box-shadow:0 8px 20px rgba(0,0,0,.08);
    transition:.3s;
}

.contact-card:hover{
    transform:translateY(-6px);
}

.contact-card h3{
    color:#0f4c81;
    margin-bottom:15px;
}

.contact-card p{
    color:#666;
    line-height:1.7;
}

</style>