<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Spatie\SimpleExcel\SimpleExcelReader;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;


class SiswaController extends Controller
{
    // Menampilkan form untuk menambah siswa
    public function create()
    {
        $user = auth()->user();
    
        $he_qis = json_decode($user->he_qi, true);
        // Ubah jadi array meskipun hanya satu elemen
        if (!is_array($he_qis)) {
            $he_qis = [$he_qis];
        }
    
        return view('siswa.create', compact('he_qis'));
    }
    

public function store(Request $request)
{
    // Membatasi akses hanya untuk Super Admin dan Staff
    if (auth()->user()->role !== 'superadmin' && auth()->user()->role !== 'staff') {
        return redirect()->route('dashboard')->with('error', 'Anda tidak memiliki akses untuk menambah siswa.');
    }

    // Validasi dan simpan data siswa
    $request->validate([
        'nama' => 'required|string|max:255',
        'tanggal_lahir' => 'required|date',
        'kelas' => 'required|string|max:255',
        'sekolah' => 'required|string|max:255',
        'he_qi' => 'required|string|max:255',
        'foto_siswa' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:5012',
        'tanggal_dibantu' => 'nullable|date',
    ]);

    // Menyimpan foto jika ada
    if ($request->hasFile('foto_siswa')) {
        $fotoPath = $request->file('foto_siswa')->store('photos', 'public');  // Menyimpan foto ke storage/app/public/photos
    } else {
        $fotoPath = null;
    }

    // Membuat objek siswa baru
    $siswa = new Siswa();
    $siswa->nama = $request->nama;
    $siswa->tanggal_lahir = $request->tanggal_lahir;
    $siswa->kelas = $request->kelas;
    $siswa->sekolah = $request->sekolah;
    $siswa->he_qi = $request->he_qi;
    $siswa->foto_siswa = $fotoPath;
    $siswa->tanggal_dibantu = $request->tanggal_dibantu;

    // Menyimpan data siswa ke database
    $siswa->save();


    // Redirect dengan pesan sukses
    return redirect()->route('dashboard')->with('success', 'Siswa berhasil ditambahkan!');
}



    public function edit($id)
    {
        $siswa = Siswa::findOrFail($id);
    
        // Memastikan hanya Superadmin dan Staff yang bisa mengedit
        if (auth()->user()->role === 'superadmin' || auth()->user()->role === 'staff') {
            return view('siswa.edit', compact('siswa'));
        }
    
        return redirect()->route('dashboard')->with('error', 'Anda tidak memiliki akses untuk mengedit data siswa.');
    }
    
public function update(Request $request, $id)
{
    // Validasi input
    $request->validate([
        'nama' => 'required|string|max:255',
        'tanggal_lahir' => 'required|date',
        'kelas' => 'required|string|max:10',
        'sekolah' => 'required|string|max:255',
        'he_qi' => 'required|string|max:255',
        'foto_siswa' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:5000', // Validasi foto jika ada
    ]);

    // Ambil data siswa berdasarkan ID
    $siswa = Siswa::findOrFail($id);

    // Jika ada foto baru, simpan foto baru dan hapus foto lama
    if ($request->hasFile('foto_siswa')) {
        // Hapus foto lama jika ada
        if ($siswa->foto_siswa && file_exists(public_path('storage/' . $siswa->foto_siswa))) {
            unlink(public_path('storage/' . $siswa->foto_siswa)); // Hapus foto lama
        }

        // Menyimpan foto baru ke folder storage/public/photos
        $fotoPath = $request->file('foto_siswa')->store('photos', 'public');
        $siswa->foto_siswa = $fotoPath; // Update path foto siswa
    }

    // Memperbarui data siswa
    $siswa->update($request->except('foto_siswa')); // Pastikan 'foto_siswa' tidak ikut diupdate kecuali jika ada perubahan

    // Mengarahkan kembali ke dashboard dengan pesan sukses
    return redirect()->route('dashboard')->with('success', 'Siswa berhasil diperbarui!');
}

    
    public function destroy($id)
    {
        // Cari siswa berdasarkan ID
        $siswa = Siswa::findOrFail($id);

        // Memastikan hanya Superadmin dan Staff yang bisa menghapus data
        if (auth()->user()->role === 'superadmin' || auth()->user()->role === 'staff') {
            // Hapus data siswa
            $siswa->delete();

            // Redirect kembali ke dashboard dengan pesan sukses
            return redirect()->route('dashboard')->with('success', 'Siswa berhasil dihapus!');
        }

        // Jika role tidak sesuai, redirect dengan pesan error
        return redirect()->route('dashboard')->with('error', 'Anda tidak memiliki akses untuk menghapus data siswa.');
    }

    public function laporanBantuan()
    {
        $user = auth()->user();
        $he_qis = json_decode($user->he_qi, true);
        if (!is_array($he_qis)) {
            $he_qis = [$he_qis];
        }

        // Ambil siswa sesuai he_qi user
        $siswas = Siswa::with(['catatanAnak' => function ($query) {
            $query->orderBy('tanggal_catatan');
        }])->whereIn('he_qi', $he_qis)->get();

        return view('siswa.laporan_bantuan', compact('siswas'));
    }

public function import(Request $request)
{
    // Validasi file yang di-upload
    $request->validate([
        'excel_file' => 'required|file|mimes:xlsx,xls,csv',
    ]);

    // Simpan file ke folder storage/app/public/imports
    $path = $request->file('excel_file')->store('imports', 'public'); // Pastikan disimpan di 'public'

    // Dapatkan path lengkap
    $fullPath = storage_path('app/public/' . $path); // Ubah ke public path

    // Baca dan proses file
$rows = SimpleExcelReader::create($fullPath)->getRows();

foreach ($rows as $row) {
    // Membersihkan spasi ekstra pada setiap kolom
    $row['nama'] = trim($row['nama']);
    $row['tanggal_lahir'] = trim($row['tanggal_lahir']);
    $row['kelas'] = trim($row['kelas']);
    $row['sekolah'] = trim($row['sekolah']);
    $row['he_qi'] = trim($row['he_qi']);
    
    // Memeriksa apakah semua kolom ada
    if (isset($row['nama'], $row['tanggal_lahir'], $row['kelas'], $row['he_qi'], $row['sekolah'])) {
        try {
            $siswa = \App\Models\Siswa::create([
                'nama' => $row['nama'],
                'tanggal_lahir' => $row['tanggal_lahir'],
                'kelas' => $row['kelas'],
                'he_qi' => $row['he_qi'],
                'sekolah' => $row['sekolah'],
            ]);
            \Log::info('Data siswa berhasil disimpan: ' . $siswa->nama);
        } catch (\Exception $e) {
            \Log::error('Error saat menyimpan data siswa: ' . $e->getMessage());
        }
    } else {
        \Log::warning('Data tidak lengkap, tidak dapat disimpan: ', $row);
    }
}



    // Kembali ke dashboard dengan pesan sukses
    return redirect()->route('dashboard')->with('success', 'Data siswa berhasil diimport!');
}







}
