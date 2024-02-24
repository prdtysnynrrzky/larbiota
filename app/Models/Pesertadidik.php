<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PesertaDidik extends Model
{
    use HasFactory;
    protected $table = 'tb_pesertadidik';

    protected $primaryKey = 'id_siswa';

    public $timestamps = false;
    protected $fillable = ['nama', 'jk', 'tanggal_lahir', 'tempat_lahir', 'agama', 'alamat', 'jarak', 'map', 'kelas', 'jurusan', 'status', 'profile_picture'];
}