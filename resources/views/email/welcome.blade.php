@extends('beautymail::templates.ark')

@section('content')

    @include('beautymail::templates.ark.contentStart')

        <center><img src="https://img8.androidappsapk.co/300/a/7/7/com.hi_depok.hi_depok.png" style="width: 100px; height: 100px; margin-bottom: 5px; "></center>
        <h1 style="margin-bottom: 10px "> Halo!</h1>
        <p> Selamat akun Anda telah terdaftar sebagai langganan Hi-Depok</p>
        <p> Anda kini bisa menerima informasi terbaru seputar Kota Depok. Yuk cari tau informasi kotamu untuk wawasanmu.</p>
        <br>
        <p> Terima Kasih, <p>
        <p> Hi-Depok Team</p>

        <center>
            <div class="w3-container" style="padding: 1em 0em">
                <a href="http://localhost:8000" style="cursor: pointer;"><button class="w3-button" style="background: orange; color: #fff; padding: 10px">View Website</button></a>
            </div>
        </center>

    @include('beautymail::templates.ark.contentEnd')

@stop
