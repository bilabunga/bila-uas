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
            <h3>Email</h3>
            <p>
                eventkampus@gmail.com
            </p>
        </div>

        <div class="contact-card">
            <h3>WhatsApp</h3>
            <p>
                0812-3456-7890
            </p>
        </div>

        <div class="contact-card">
            <h3>Alamat</h3>
            <p>
                STMIK Mardira Indonesia, Bandung
            </p>
        </div>
    </div>

</section>

<style>
    /* ===== PAGE ===== */
    .contact-page{
        max-width:1100px;
        margin:60px auto;
        padding:20px;
        background:#FCF8F5;
    }

    /* ===== HEADER ===== */
    .contact-header{
        background:white;
        padding:45px;
        text-align:center;
        border-radius:25px;
        border:1px solid #EEE4DB;
        box-shadow:0 10px 25px rgba(0,0,0,.06);
        margin-bottom:40px;
    }

    .contact-header h1{
        font-size:40px;
        color:#6F4E37;
        margin-bottom:15px;
        font-weight:800;
    }

    .contact-header p{
        color:#8B7A6B;
        max-width:700px;
        margin:auto;
        line-height:1.8;
    }

    /* ===== CARD ===== */
    .contact-container{
        display:grid;
        grid-template-columns:repeat(3,1fr);
        gap:25px;
    }

    .contact-card{
        background:white;
        padding:35px 25px;
        text-align:center;
        border-radius:22px;
        border:1px solid #EEE4DB;
        box-shadow:0 10px 25px rgba(0,0,0,.06);
        transition:.3s;
    }

    .contact-card:hover{
        transform:translateY(-8px);
        box-shadow:0 15px 30px rgba(111,78,55,.12);
    }

    .contact-icon{
        width:70px;
        height:70px;
        margin:auto;
        margin-bottom:20px;
        background:#F3E8DD;
        border-radius:50%;
        display:flex;
        align-items:center;
        justify-content:center;
        font-size:35px;
    }

    .contact-card h3{
        color:#6F4E37;
        font-size:22px;
        margin-bottom:15px;
    }

    .contact-card p{
        color:#8B7A6B;
        line-height:1.8;
    }

    /* ===== RESPONSIVE ===== */
    @media(max-width:992px){
        .contact-container{
            grid-template-columns:repeat(2,1fr);
        }
    }

    @media(max-width:600px){
        .contact-container{
            grid-template-columns:1fr;
        }

        .contact-header h1{
            font-size:32px;
        }
    }
</style>

@endsection