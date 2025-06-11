<?php

namespace App\Http\Controllers;

use App\Models\Nilai;
use App\Models\Siswa;
use Illuminate\Http\Request;

class NilaiController extends Controller
{
    public function create($siswaId)
    {
        $siswa = Siswa::findOrFail($siswaId);
        return view('nilai.create', compact('siswa'));
    }

public function store(Request $request, $siswaId)
{
    $request->validate([
        'nilai_rata_rata' => 'required|numeric',
        'semester' => 'required|in:Semester 1,Semester 2',
        'catatan' => 'nullable|string',
        'kelas' => 'required|integer', // Validasi kelas sebagai angka
    ]);

    $nilai = new Nilai();
    $nilai->siswa_id = $siswaId;
    $nilai->nilai_rata_rata = $request->nilai_rata_rata;
    $nilai->semester = $request->semester;
    $nilai->catatan = $request->catatan;
    $nilai->kelas = $request->kelas; // Menyimpan kelas sebagai angka
    $nilai->save();

    return redirect()->route('dashboard')->with('success', 'Nilai berhasil ditambahkan.');
}


}
