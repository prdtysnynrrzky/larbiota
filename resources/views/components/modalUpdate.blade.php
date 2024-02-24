<!-- Modal Edit -->
@foreach ($datasiswa as $data)
    <form action="{{ url('datapesertadidik/' . $data->id_siswa) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="modal fade" id="exampleModal{{ $data->id_siswa }}" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Edit <span
                                class="fw-bold text-warning">Pesertadidik</span></h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row mb-2">
                            <div class="col-4">
                                <label for="nama" class="label-form">Nama</label>
                            </div>
                            <div class="col-8">
                                <input type="text" id="nama" name="nama" value="{{ $data->nama }}"
                                    class="form-control" placeholder="masukan nama siswa" required>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-4">
                                <label for="jk" class="form-label">Jenis Kelamin</label>
                            </div>
                            <div class="col-8 d-flex gap-2">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" value="Laki-Laki"
                                        @if ($data->jk == 'Laki-Laki') @checked(true) @endif
                                        name="jk" id="Laki-Laki" required>
                                    <label class="form-check-label" for="Laki-Laki">
                                        Laki-Laki
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" value="Perempuan"
                                        @if ($data->jk == 'Perempuan') @checked(true) @endif
                                        name="jk" id="Perempuan">
                                    <label class="form-check-label" for="Perempuan">
                                        Perempuan
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-4">
                                <label for="tempat_lahir" class="label-form">Tempat Lahir</label>
                            </div>
                            <div class="col-8">
                                <input type="text" class="form-control" placeholder="masukan tempat lahir siswa"
                                    id="tempat_lahir" name="tempat_lahir" value="{{ $data->tempat_lahir }}" required>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-4">
                                <label for="tanggal_lahir" class="label-form">Tanggal Lahir</label>
                            </div>
                            <div class="col-8">
                                <input type="date" id="tanggal_lahir" name="tanggal_lahir"
                                    value="{{ $data->tanggal_lahir }}" class="form-control" required>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-4">
                                <label for="agama" class="label-form">Agama</label>
                            </div>
                            <div class="col-8">
                                <input type="text" id="agama" name="agama" value="{{ $data->agama }}"
                                    class="form-control" placeholder="masukan agama siswa" required>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-4">
                                <label for="alamat" class="label-form">Alamat</label>
                            </div>
                            <div class="col-8">
                                <textarea id="alamat" name="alamat" class="form-control" placeholder="masukan alamat siswa" required>{{ $data->alamat }}</textarea>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-4">
                                <label for="jarak" class="label-form">Jarak</label>
                            </div>
                            <div class="col-8">
                                <input type="number" id="jarak" name="jarak" value="{{ $data->jarak }}"
                                    class="form-control" placeholder="masukan jarak rumah siswa" required>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-4">
                                <label for="map" class="label-form">Link Map</label>
                            </div>
                            <div class="col-8">
                                <input type="text" id="map" name="map" value="{{ $data->map }}"
                                    class="form-control" placeholder="masukan map rumah siswa" required>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-4">
                                <label for="kelas" class="label-form">Kelas</label>
                            </div>
                            <div class="col-8">
                                <input type="number" id="kelas" name="kelas" value="{{ $data->kelas }}"
                                    class="form-control" placeholder="masukan kelas siswa" required>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-4">
                                <label for="jurusan" class="label-form">Jurusan</label>
                            </div>
                            <div class="col-8">
                                <input type="text" id="jurusan" name="jurusan" value="{{ $data->jurusan }}"
                                    class="form-control" placeholder="masukan jurusan siswa" required>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-4">
                                <label for="status" class="form-label">Status</label>
                            </div>
                            <div class="col-8 d-flex gap-2">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" value="Aktif"
                                        @if ($data->status == 'Aktif') @checked(true) @endif
                                        name="status" id="Aktif" required>
                                    <label class="form-check-label" for="Aktif">
                                        Aktif
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" value="Tidak Aktif"
                                        @if ($data->status == 'Tidak Aktif') @checked(true) @endif
                                        name="status" id="Tidak Aktif">
                                    <label class="form-check-label" for="Tidak Aktif">
                                        Tidak Aktif
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-4">
                                <label for="profile_picture" class="label-form">Profile Picture</label>
                            </div>
                            <div class="col-8">
                                <input type="hidden" name="oldImage" value="{{$data->profile_picture}}" />
                                @if($data->profile_picture)
                                <img src="{{asset('storage/'.$data->profile_picture)}}" class="img-preview img-fluid w-75 mb-2" style="display: block;" />
                                @else
                                <img class="img-preview img-fluid w-75 mb-2" />
                                @endif
                                <input type="file" id="profile_picture" name="profile_picture" class="form-control"
                                    onchange="previewImage()">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endforeach

<script>
    function previewImage() {
    const profile_picture = document.querySelector('#profile_picture');
    const profilePicturePreview = document.querySelector('.img-preview');

    if (profile_picture.files && profile_picture.files[0]) {
        const reader = new FileReader();

        reader.onload = function(e) {
            profilePicturePreview.src = e.target.result;
        };

        reader.readAsDataURL(profile_picture.files[0]);
        profilePicturePreview.style.display = 'block';
    } else {
        profilePicturePreview.src = "";
        profilePicturePreview.style.display = 'none';
    }
}
</script>