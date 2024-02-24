@extends('layout.main')
@section('content')
    <!-- Slider -->
    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel" style="aspect-ratio: 21/9">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="1.png" class="d-block" alt="Slider 1" style="width: 100%; height: 100%">
            </div>
            <div class="carousel-item">
                <img src="2.png" class="d-block" alt="Slider 2" style="width: 100%; height: 100%">
            </div>
        </div>
    </div>

    <!-- Call to Action Button -->
    <div class="text-center mb-5">
        <a href="/login" class="btn btn-primary btn-sm-sm px-5 rounded absolute">Lihat Data Peserta
            Didik</a>
    </div>
@endsection
