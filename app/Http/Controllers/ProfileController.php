<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\CatatanAnak;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function show($id)
    {
        // Ambil data siswa berdasarkan id
        $siswa = Siswa::findOrFail($id);
    
        // Ambil semua catatan yang terkait dengan siswa ini
        $catatan = CatatanAnak::where('siswa_id', $siswa->id)->get(); // Pastikan menggunakan `get()`
    
        return view('profile.show', compact('siswa', 'catatan'));
    }
    

}
