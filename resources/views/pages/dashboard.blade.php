@extends('layout.main')
@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    </div>

    <!-- Content Row -->
    <div class="row">

        <!-- Card -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 p-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-uppercase mb-1">
                                Pesertadidik <span class="text-success">(siswa aktif)</span></div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $jumlah_peserta_didik }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-user-tie fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Card -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-danger shadow h-100 p-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-uppercase mb-1">
                                Pesertadidik <span class="text-danger">(siswa keluar)</span></div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $jumlah_siswa_keluar }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-user-minus fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Card -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 p-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-uppercase mb-1">
                                Jumlah Kelas <span class="text-warning">(10 - 12)</span></div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">44</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-server fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Card -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 p-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-uppercase mb-1">
                                Jarak Rumah Siswa <span class="text-info">( lebih dari 10km )</span></div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $jarak_rumah_terjauh }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-person-rays fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Data Peserta Didik</h1>
    </div>

    <div class="row px-2">
        <form class="d-flex p-3 gap-2"  action="{{ url('dashboard') }}" method="get">
            <input type="text" class="form-control bg-light p-3" placeholder="Cari Peserta Didik.."
                name="keyword" id="keyword" value="{{ Session::get('keyword') }}">
            <button class="btn btn-primary" type="button">
                <i class="fas fa-search fa-sm"></i>
            </button>
        </form>
        <div class="table-responsive">
            <table class="table table-bordered table-striped text-dark">
                <thead>
                    <tr>
                        <th>#No</th>
                        <th>Nama</th>
                        <th>Jenis Kelamin</th>
                        <th>Tempat Lahir</th>
                        <th>Tanggal Lahir</th>
                        <th>Agama</th>
                        <th>Alamat</th>
                        <th>Jarak Rumah</th>
                        <th>Link Map</th>
                        <th>Kelas</th>
                        <th>Jurusan</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($datasiswa as $data)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $data->nama }}</td>
                            <td>{{ $data->jk }}</td>
                            <td>{{ $data->tempat_lahir }}</td>
                            <td>{{ \Carbon\Carbon::parse($data->tanggal_lahir)->format('d F Y') }}</td>
                            <td>{{ $data->agama }}</td>
                            <td>{{ $data->alamat }}</td>
                            <td>{{ $data->jarak }} km</td>
                            <td>{{ $data->map }}</td>
                            <td>{{ $data->kelas }}</td>
                            <td>{{ $data->jurusan }}</td>
                            <td>{{ $data->status }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $datasiswa->links() }}
        </div>
    </div>
@endsection