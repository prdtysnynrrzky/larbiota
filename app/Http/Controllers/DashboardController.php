<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PesertaDidik;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        //
        $jumlah_peserta_didik = PesertaDidik::count();
        $jarak_rumah = PesertaDidik::where('jarak', '>', '10')->get();
        $jarak_rumah_terjauh = $jarak_rumah->count();
        $siswa_keluar = PesertaDidik::where('status', 'Tidak Aktif')->get();
        $jumlah_siswa_keluar = $siswa_keluar->count();
        $keyword = $request->keyword;
        $jumlah_baris = 5;
        if (strlen($keyword)) {
            $pesertadidik = PesertaDidik::where('nama', 'like', "%$keyword%")
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
            $pesertadidik = PesertaDidik::orderBy('nama', 'asc')->paginate($jumlah_baris);
        }
        return view(
            'pages.dashboard',
            [
                'datasiswa' => $pesertadidik,
                'jumlah_peserta_didik' => $jumlah_peserta_didik,
                'jarak_rumah_terjauh' => $jarak_rumah_terjauh,
                'jumlah_siswa_keluar' => $jumlah_siswa_keluar
            ]
        );
    }
}