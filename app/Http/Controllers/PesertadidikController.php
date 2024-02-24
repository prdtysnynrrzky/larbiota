<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PesertaDidik;
use Illuminate\Support\Facades\Auth;

class PesertaDidikController extends Controller
{
    public function index(Request $request)
    {
        //
        $keyword = $request->keyword;
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
                ->get();
        } else {
            $data = PesertaDidik::orderBy('nama', 'asc')->get();
        }

        return view('pages.pesertadidik', ['datasiswa' => $data]);
    }
}