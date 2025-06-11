<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;
use App\Models\PenyaluranBantuan;

class ProfileController extends Controller
{
    public function show($id)
    {
        // Ambil data siswa berdasarkan id
        $siswa = Siswa::with('nilais')->findOrFail($id); // Ambil data siswa beserta catatan nilai


        // Mengambil semua penyaluran bantuan yang terkait dengan siswa tersebut
        $penyaluranBantuan = PenyaluranBantuan::where('siswa_id', $id)->get();


        return view('profile.show', compact('siswa','penyaluranBantuan',));
    }
    

}
