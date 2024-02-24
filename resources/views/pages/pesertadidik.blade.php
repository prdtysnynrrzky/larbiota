@extends('layout.main')
@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Peserta Didik</h1>
    </div>

    <div class="row px-2">
        @include('components.successMessage')
        <form class="d-flex p-3 gap-2" action="{{ url('pesertadidik') }}" method="get">
            <input type="text" class="form-control bg-light p-3" placeholder="Cari Peserta Didik.." name="keyword"
                id="keyword" value="{{ Session::get('keyword') }}">
            <button class="btn btn-primary" type="button">
                <i class="fas fa-search fa-sm"></i>
            </button>
        </form>

        <div class="container">
            <div class="row my-2">
                @foreach ($datasiswa as $data)
                    <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                        <div class="card shadow" key="{{ $data->id_siswa }}">
                            <img src="{{ $data->profile_picture ? asset('storage/' . $data->profile_picture) : asset('favicon.ico') }}"
                                class="card-img-top img-fluid" alt="..." style="aspect-ratio: 1/1">
                            <div class="card-body">
                                <h5 class="card-title text-center fw-bold">{{ $data->nama }}</h5>
                                <hr>
                                <div class="row mb-2">
                                    <div class="col-md-6">
                                        <p class="fst-italic"><span class="fw-bold">Kelas</span> : {{ $data->kelas }}</p>
                                        <p class="fst-italic"><span class="fw-bold">Jurusan</span> : {{ $data->jurusan }}
                                        </p>
                                    </div>
                                    <div class="col-md-6 text-end">
                                        <p class="fst-italic"><span class="fw-bold">Umur</span> :
                                            {{ \Carbon\Carbon::parse($data->tanggal_lahir)->age }}</p>
                                        <p class="fst-italic"><span class="fw-bold">Status</span> : {!! $data->status == 'Aktif'
                                            ? 'Aktif <i class="fas fa-circle text-success ml-2"></i>'
                                            : 'Keluar <i class="fas fa-circle text-danger ml-2"></i>' !!}
                                        </p>
                                    </div>
                                </div>
                                <a href="#" class="btn btn-primary btn-block">Lihat Detail</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
