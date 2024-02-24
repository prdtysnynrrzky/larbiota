<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\PesertaDidik;

class DataPesertadidikController extends Controller
{
    public function index(Request $request)
    {
        //
        $keyword = $request->keyword;
        $jumlah_baris = 10;
        if (strlen($keyword)) {
            $data = PesertaDidik::where('nama', 'like', "%$keyword%")
                ->orWhere('jk', 'like', "%$keyword%")
                ->orWhere('tempat_lahir', 'like', "%$keyword%")
                ->orWhere('tanggal_Lahir', 'like', "%$keyword%")
                ->orWhere('agama', 'like', "%$keyword%")
                ->orWhere('alamat', 'like', "%$keyword%")
                ->orWhere('jarak', 'like', "%$keyword%")
                ->orWhere('map', 'like', "%$keyword%")
                ->orWhere('kelas', 'like', "%$keyword%")
                ->orWhere('jurusan', 'like', "%$keyword%")
                ->paginate($jumlah_baris);
        } else {
            $data = PesertaDidik::orderBy('nama', 'asc')->paginate($jumlah_baris);
        }

        return view('pages.datapesertadidik', ['datasiswa' => $data]);
    }
    public function store(Request $request)
    {
        //
        $request->validate([
            'nama' => 'required|string|max:255',
            'jk' => 'required|in:Laki-Laki,Perempuan',
            'tempat_lahir' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'agama' => 'required|string|max:50',
            'alamat' => 'required|string|max:255',
            'jarak' => 'required|integer',
            'map' => 'required|string|max:255',
            'kelas' => 'required|integer|min:1|max:99',
            'jurusan' => 'required|string|max:155',
            'status' => 'required|in:Aktif,Tidak Aktif',
            'profile_picture' => 'required|image|max:1024'
        ], [
            'nama.required' => 'Nama lengkap wajib diisi.',
            'jk.required' => 'Pilih jenis kelamin (Laki-Laki/Perempuan).',
            'tempat_lahir.required' => 'Tempat lahir wajib diisi.',
            'tanggal_lahir.required' => 'Tanggal lahir wajib diisi.',
            'tanggal_lahir.date' => 'Format tanggal lahir tidak valid.',
            'agama.required' => 'Agama wajib diisi.',
            'alamat.required' => 'Alamat wajib diisi.',
            'jarak.required' => 'Jarak dari sekolah wajib diisi.',
            'map.required' => 'Koordinat GPS wajib diisi.',
            'kelas.required' => 'Kelas wajib diisi.',
            'jurusan.required' => 'Jurusan wajib diisi.',
            'kelas.integer' => 'Kelas harus berupa angka.',
            'kelas.min' => 'Kelas minimal 1.',
            'kelas.max' => 'Kelas maksimal 99.',
            'status.required' => 'Pilih Status Siswa (Aktif/Tidak Aktif).',
            'profile_picture.required' => 'Profile Picture wajib diisi',
            'profile_picture.image' => 'Profile Picture harus berupa gambar',
            'profile_picture.max' => 'Profile Picture maximal 1024kb',
        ]);

        $data = [
            'nama' => $request->input('nama'),
            'jk' => $request->input('jk'),
            'tempat_lahir' => $request->input('tempat_lahir'),
            'tanggal_lahir' => $request->input('tanggal_lahir'),
            'agama' => $request->input('agama'),
            'alamat' => $request->input('alamat'),
            'jarak' => $request->input('jarak'),
            'map' => $request->input('map'),
            'kelas' => $request->input('kelas'),
            'jurusan' => $request->input('jurusan'),
            'status' => $request->input('status'),
            'profile_picture' => $request->input('profile_picture'),
        ];

        $data = $request->only([
            'nama',
            'jk',
            'tempat_lahir',
            'tanggal_lahir',
            'agama',
            'alamat',
            'jarak',
            'map',
            'kelas',
            'jurusan',
            'status'
        ]);

        if ($request->hasFile('profile_picture')) {
            $file = $request->file('profile_picture');
            $fileName = time() . '_' . $file->getClientOriginalName(); // Membuat nama file
            $filePath = $file->storeAs('profile_pictures', $fileName); // Menyimpan file
            $data['profile_picture'] = $filePath; // Menyimpan path atau nama file ke dalam database
        }

        PesertaDidik::create($data);

        return redirect()->to('datapesertadidik')->with('success', 'Data berhasil ditambahkan!');
    }
    public function edit(string $id)
    {
        //
        $data = PesertaDidik::where('id_siswa', $id)->first();
        return view('pages.crud.update', ['datasiswa' => $data]);
    }
    public function update(Request $request, string $id)
    {
        //
        $request->validate([
            'nama' => 'required|string|max:255',
            'jk' => 'required|in:Laki-Laki,Perempuan',
            'tempat_lahir' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'agama' => 'required|string|max:50',
            'alamat' => 'required|string|max:255',
            'jarak' => 'required|integer',
            'map' => 'required|string|max:255',
            'kelas' => 'required|integer|min:1|max:99',
            'jurusan' => 'required|string|max:155',
            'status' => 'required|in:Aktif,Tidak Aktif',
            'profile_picture' => 'nullable|image|max:1024'

        ], [
            'nama.required' => 'Nama lengkap wajib diisi.',
            'jk.required' => 'Pilih jenis kelamin (Laki-Laki/Perempuan).',
            'tempat_lahir.required' => 'Tempat lahir wajib diisi.',
            'tanggal_lahir.required' => 'Tanggal lahir wajib diisi.',
            'tanggal_lahir.date' => 'Format tanggal lahir tidak valid.',
            'agama.required' => 'Agama wajib diisi.',
            'alamat.required' => 'Alamat wajib diisi.',
            'jarak.required' => 'Jarak dari sekolah wajib diisi.',
            'map.required' => 'Koordinat GPS wajib diisi.',
            'kelas.required' => 'Kelas wajib diisi.',
            'jurusan.required' => 'Jurusan wajib diisi.',
            'kelas.integer' => 'Kelas harus berupa angka.',
            'kelas.min' => 'Kelas minimal 1.',
            'kelas.max' => 'Kelas maksimal 99.',
            'status.required' => 'Pilih Status Siswa (Aktif/Tidak Aktif).',
            'profile_picture.required' => 'Profile Picture wajib diisi',
            'profile_picture.image' => 'Profile Picture harus berupa gambar',
            'profile_picture.max' => 'Profile Picture maximal 1024kb',
        ]);

        $data = [
            'nama' => $request->input('nama'),
            'jk' => $request->input('jk'),
            'tempat_lahir' => $request->input('tempat_lahir'),
            'tanggal_lahir' => $request->input('tanggal_lahir'),
            'agama' => $request->input('agama'),
            'alamat' => $request->input('alamat'),
            'jarak' => $request->input('jarak'),
            'map' => $request->input('map'),
            'kelas' => $request->input('kelas'),
            'jurusan' => $request->input('jurusan'),
            'status' => $request->input('status'),
            'profile_picture' => $request->input('profile_picture'),
        ];

        // Cek apakah ada file gambar yang diunggah
        if ($request->hasFile('profile_picture')) {
            $file = $request->file('profile_picture');
            $fileName = time() . '_' . $file->getClientOriginalName(); // Membuat nama file
            $filePath = $file->storeAs('profile_pictures', $fileName); // Menyimpan file dengan
            if ($request->oldImage) {
                Storage::delete($request->oldImage);// Hapus file gambar lama jika ada
            }
            $data['profile_picture'] = $filePath; // Menyimpan path atau nama file ke dalam database
        }

        PesertaDidik::where('id_siswa', $id)->update($data);
        return redirect()->to('datapesertadidik')->with('success', 'Data berhasil diubah!');
    }
    public function destroy(string $id, Request $request)
    {
        //
        if ($request->hasFile('profile_picture')) {
            $file = $request->file('profile_picture');
            $fileName = time() . '_' . $file->getClientOriginalName(); // Membuat nama file
            $filePath = $file->storeAs('profile_pictures', $fileName); // Menyimpan file dengan
            if ($request->profile_picture) {
                Storage::delete($request->profile_picture);// Hapus file gambar lama jika ada
            }
            $data['profile_picture'] = $filePath; // Menyimpan path atau nama file ke dalam database
        }
        PesertaDidik::where('id_siswa', $id)->delete();
        return redirect()->to('datapesertadidik')->with('success', 'Data berhasil dihapus!');
    }
}
