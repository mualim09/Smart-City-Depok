@extends('beautymail::templates.ark')

@section('content')

    
    
    @include('beautymail::templates.ark.contentStart')

        <link rel="stylesheet" href="{{ URL::asset('css/w3schools.css') }}">
        <center><img src="https://img8.androidappsapk.co/300/a/7/7/com.hi_depok.hi_depok.png" style="width: 100px; height: 100px; margin-bottom: 5px; "></center>
        <h1 style="margin-bottom: 10px "> Hi-Depok : {{$judul_jenis}}</h1>
        <h3 class="secondary"><strong>{{$judul}}</strong></h3>
        <p style="margin-top: 10px;">{{ str_limit ($desc), 250}}</p>

        <center>
            <div class="w3-container" style="padding: 1em 0em">
                <a href="http://localhost:8000/{{$jenis}}/{{ $judul }}" style="cursor: pointer;"><button class="w3-button" style="background: orange; color: #fff; padding: 10px">Read More</button></a>
            </div>
        </center>

    @include('beautymail::templates.ark.contentEnd')

@stop
