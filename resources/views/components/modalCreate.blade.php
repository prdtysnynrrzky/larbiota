<!-- Modal Tambah -->
<form action="{{ url('datapesertadidik') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah <span
                            class="fw-bold text-primary">Pesertadidik</span></h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row mb-2">
                        <div class="col-4">
                            <label for="nama" class="label-form">Nama</label>
                        </div>
                        <div class="col-8">
                            <input type="text" id="nama" name="nama" value="{{ old('nama') }}"
                                class="form-control" placeholder="masukan nama siswa">
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-4">
                            <label for="jk" class="form-label">Jenis Kelamin</label>
                        </div>
                        <div class="col-8 d-flex gap-2">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" value="Laki-Laki" {{ old('jk') }}
                                    name="jk" id="Laki-Laki">
                                <label class="form-check-label" for="Laki-Laki">
                                    Laki-Laki
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" value="Perempuan" {{ old('jk') }}
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
                                id="tempat_lahir" name="tempat_lahir" value="{{ old('tempat_lahir') }}">
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-4">
                            <label for="tanggal_lahir" class="label-form">Tanggal Lahir</label>
                        </div>
                        <div class="col-8">
                            <input type="date" id="tanggal_lahir" name="tanggal_lahir"
                                value="{{ old('tanggal_lahir') }}" class="form-control">
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-4">
                            <label for="agama" class="label-form">Agama</label>
                        </div>
                        <div class="col-8">
                            <input type="text" id="agama" name="agama" value="{{ old('agama') }}"
                                class="form-control" placeholder="masukan agama siswa">
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-4">
                            <label for="alamat" class="label-form">Alamat</label>
                        </div>
                        <div class="col-8">
                            <textarea id="alamat" name="alamat" value="{{ old('alamat') }}" class="form-control"
                                placeholder="masukan alamat siswa"></textarea>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-4">
                            <label for="jarak" class="label-form">Jarak</label>
                        </div>
                        <div class="col-8">
                            <input type="number" id="jarak" name="jarak" value="{{ old('jarak') }}"
                                class="form-control" placeholder="masukan jarak rumah siswa">
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-4">
                            <label for="map" class="label-form">Link Map</label>
                        </div>
                        <div class="col-8">
                            <input type="text" id="map" name="map" value="{{ old('map') }}"
                                class="form-control" placeholder="masukan map rumah siswa">
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-4">
                            <label for="kelas" class="label-form">Kelas</label>
                        </div>
                        <div class="col-8">
                            <input type="number" id="kelas" name="kelas" value="{{ old('kelas') }}"
                                class="form-control" placeholder="masukan kelas siswa">
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-4">
                            <label for="jurusan" class="label-form">Jurusan</label>
                        </div>
                        <div class="col-8">
                            <input type="text" id="jurusan" name="jurusan" value="{{ old('jurusan') }}"
                                class="form-control" placeholder="masukan jurusan siswa">
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-4">
                            <label for="status" class="form-label">Status</label>
                        </div>
                        <div class="col-8 d-flex gap-2">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" value="Aktif" name="status"
                                    id="Aktif">
                                <label class="form-check-label" for="Aktif">
                                    Aktif
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" value="Tidak Aktif" name="status"
                                    id="Tidak Aktif">
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
                            <img class="img-preview img-fluid w-75" style="display: none;" />
                            <input type="file" id="profile_picture" name="profile_picture" class="form-control"
                                onchange="previewImage(this)">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Tambah</button>
                </div>
            </div>
        </div>
    </div>
</form>

<script>
    function previewImage(input) {
        const file = input.files[0];
        const profilePicturePreview = document.querySelector('.img-preview');

        if (file) {
            const reader = new FileReader();

            reader.onload = function(e) {
                profilePicturePreview.src = e.target.result;
            };

            reader.readAsDataURL(file);
            profilePicturePreview.style.display = "block";
        } else {
            profilePicturePreview.src = "";
            profilePicturePreview.style.display = "none";
        }
    }
</script>
