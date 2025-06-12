<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Siswa;
use Illuminate\Support\Facades\Auth; // Import Auth untuk mendapatkan user login

class DashboardController extends Controller
{
// Controller

public function index(Request $request)
{
    $user = auth()->user(); // Ambil data user yang login
    $search = $request->input('search');
    $kelas = $request->input('kelas');
    $heqi = $request->input('he_qi');
    $sekolah = $request->input('sekolah');

    // Dekode he_qi pengguna yang login
    $he_qis = json_decode($user->he_qi, true);

    // Filter data berdasarkan he_qi pengguna yang login
    if ($user->role === 'superadmin') {
        $query = Siswa::query();
    } else {
        if (is_array($he_qis)) {
            // Jika he_qi berupa array, ambil siswa dengan he_qi dalam array
            $query = Siswa::whereIn('he_qi', $he_qis);
        } else {
            // Jika hanya satu nilai he_qi
            $query = Siswa::where('he_qi', $user->he_qi);
        }
    }

    // Pencarian berdasarkan nama
    if (!empty($search)) {
        $query->where('nama', 'like', "%$search%");
    }

    // Filter berdasarkan kelas
    if (!empty($kelas)) {
        $query->where('kelas', $kelas);
    }

    // Filter berdasarkan he_qi jika ada dalam request
    if (!empty($heqi)) {
        $query->where('he_qi', $heqi);
    }

    // Filter berdasarkan sekolah
    if (!empty($sekolah)) {
        $query->where('sekolah', $sekolah);
    }

    // Ambil data siswa dengan paginasi
    $siswas = $query->paginate(10);

    // Hitung jumlah siswa yang sesuai dengan filter dan pencarian
    $totalSiswa = $query->count();

    // Ambil daftar sekolah yang terdaftar di kolom 'sekolah' dari tabel 'siswa'
    $sekolahs = Siswa::select('sekolah')->distinct()->get();

    // Manual sorting sekolah berdasarkan urutan yang diinginkan
    $orderedSekolah = ['SD', 'SMP', 'SMA', 'SMK'];
    $sekolahs = $sekolahs->sortBy(function ($sekolah) use ($orderedSekolah) {
        $key = array_search(explode(' ', $sekolah->sekolah)[0], $orderedSekolah); // Ambil jenjangnya (SD, SMP, SMA, SMK)
        return $key !== false ? $key : 999; // Jika tidak ditemukan, beri urutan paling belakang
    });

    return view('dashboard', compact('siswas', 'totalSiswa', 'sekolahs', 'sekolah'));
}







}
