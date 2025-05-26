<?php

namespace App\Http\Controllers;

use App\Models\CatatanAnak;
use App\Models\Siswa;
use Illuminate\Http\Request;

class CatatanAnakController extends Controller
{
    public function index($siswaId)
    {
        $siswa = Siswa::findOrFail($siswaId);
        $catatan = $siswa->catatan; // Ambil semua catatan untuk siswa ini
        return view('catatan_anak.index', compact('catatan', 'siswa'));
    }

    public function create($siswaId)
    {
        $siswa = Siswa::findOrFail($siswaId);
        return view('catatan_anak.create', compact('siswa'));
    }

    public function store(Request $request, $siswaId)
    {
        $request->validate([
            'isi_catatan' => 'required|string',
            'tanggal_catatan' => 'required|date',
        ]);

        // Simpan catatan baru
        CatatanAnak::create([
            'siswa_id' => $siswaId,
            'user_id' => auth()->id(),
            'isi_catatan' => $request->isi_catatan,
            'tanggal_catatan' => $request->tanggal_catatan,
        ]);

        // Redirect kembali ke dashboard setelah menyimpan
        return redirect()->route('dashboard')->with('success', 'Catatan berhasil ditambahkan.');
    }

    public function show($siswaId, $catatanId)
    {
        $siswa = Siswa::findOrFail($siswaId);
        $catatan = CatatanAnak::findOrFail($catatanId);
        return view('catatan_anak.show', compact('catatan', 'siswa'));
    }

    public function edit($siswaId, $catatanId)
    {
        $catatan = CatatanAnak::findOrFail($catatanId);
        return view('catatan_anak.edit', compact('catatan'));
    }


    public function update(Request $request, $siswaId, $catatanId)
    {
        $catatan = CatatanAnak::findOrFail($catatanId);

        // Validasi input
        $request->validate([
            'tanggal_catatan' => 'required|date',
            'isi_catatan' => 'required|string',
        ]);

        // Update catatan
        $catatan->update([
            'tanggal_catatan' => $request->tanggal_catatan,
            'isi_catatan' => $request->isi_catatan,
        ]);

        return redirect()->route('profile.show', [$catatan->siswa_id, $catatan->id])
            ->with('success', 'Catatan berhasil diperbarui.');
    }

    public function destroy($siswaId, $catatanId)
    {
        // Temukan catatan yang akan dihapus
        $catatan = CatatanAnak::findOrFail($catatanId);
        
        // Hapus catatan
        $catatan->delete();

        // Redirect ke profile.show dengan parameter siswaId
        return redirect()->route('profile.show', ['id' => $siswaId])
            ->with('success', 'Catatan berhasil dihapus.');
    }


}
