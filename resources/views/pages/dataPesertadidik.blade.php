@extends('layout.main')
@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Data Peserta Didik</h1>
        <button type="button" class="btn btn-primary mt-2 text-white fw-bold" data-bs-toggle="modal"
            data-bs-target="#exampleModal">
            tambah
        </button>
    </div>

    @include('components.modalCreate')
    @include('components.modalUpdate')

    <div class="row px-2">
        @include('components.successMessage')
        @include('components.errorMessage')
        <form class="d-flex p-3 gap-2" action="{{ url('datapesertadidik') }}" method="get">
            <input type="text" class="form-control bg-light p-3" placeholder="Cari Peserta Didik.." name="keyword"
                id="keyword" value="{{ Session::get('keyword') }}">
            <button class="btn btn-primary" type="button">
                <i class="fas fa-search fa-sm"></i>
            </button>
        </form>
        <div class="table-responsive">
            <table class="table table-bordered table-striped">
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
                        <th>Kelas</th>
                        <th>Jurusan</th>
                        <th>Status</th>
                        <th>Aksi</th>
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
                            <td>{{ $data->kelas }}</td>
                            <td>{{ $data->jurusan }}</td>
                            <td>{{ $data->status }}</td>
                            <td class="d-flex justify-content-center align-content-center" style="gap: 6px">
                                <a href="{{ $data->map }}" target="_blank"
                                    class="btn btn-sm btn-info fw-bold text-white">
                                    map
                                </a>
                                <a href="{{ url($data->map) }}"></a>
                                <button type="button" class="btn btn-warning fw-bold text-white" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal{{ $data->id_siswa }}">
                                    edit
                                </button>
                                <form onsubmit="return confirm('Yakin Hapus Data?')"
                                    action="{{ url('datapesertadidik/' . $data->id_siswa) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" name=submit class="btn btn-sm btn-danger fw-bold text-white">
                                        hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $datasiswa->links() }}
        </div>
    </div>
@endsection
