<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Siswa;
use Illuminate\Support\Facades\Auth; // Import Auth untuk mendapatkan user login
use Spatie\SimpleExcel\SimpleExcelWriter;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $user = auth()->user(); // Ambil data user yang login
        $search = $request->input('search');
        $kelas = $request->input('kelas');
        $heqi = $request->input('he_qi');
        $sekolah = $request->input('sekolah');

        // Dekode he_qi pengguna yang login
        $he_qis = json_decode($user->he_qi, true);

        // Mulai query untuk data siswa berdasarkan filter
        $query = Siswa::query();

        // Filter data berdasarkan he_qi pengguna yang login
        if ($user->role !== 'superadmin') {
            if (is_array($he_qis)) {
                $query->whereIn('he_qi', $he_qis);
            } else {
                $query->where('he_qi', $user->he_qi);
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

        // Sorting sekolah berdasarkan jenjangnya
        $orderedSekolah = ['SD', 'SMP', 'SMA', 'SMK'];
        $sekolahs = $sekolahs->sortBy(function ($sekolah) use ($orderedSekolah) {
            $key = array_search(explode(' ', $sekolah->sekolah)[0], $orderedSekolah); // Ambil jenjangnya (SD, SMP, SMA, SMK)
            return $key !== false ? $key : 999; // Jika tidak ditemukan, beri urutan paling belakang
        });

        return view('dashboard', compact('siswas', 'totalSiswa', 'sekolahs', 'sekolah'));
    }
    
        // Fungsi untuk ekspor data siswa yang terfilter
    public function export(Request $request)
    {
        $search = $request->input('search');
        $kelas = $request->input('kelas');
        $heqi = $request->input('he_qi');
        $sekolah = $request->input('sekolah');

        // Mulai query untuk data siswa berdasarkan filter
        $query = Siswa::query();

        // Filter data berdasarkan pencarian dan filter
        if (!empty($search)) {
            $query->where('nama', 'like', "%$search%");
        }
        if (!empty($kelas)) {
            $query->where('kelas', $kelas);
        }
        if (!empty($heqi)) {
            $query->where('he_qi', $heqi);
        }
        if (!empty($sekolah)) {
            $query->where('sekolah', $sekolah);
        }

        // Ambil data siswa sesuai dengan filter
        $siswas = $query->get();

        // Menulis data ke dalam file Excel
        $filePath = public_path('siswa_export.xlsx');
        $writer = SimpleExcelWriter::create($filePath);
        $writer->addRows($siswas->toArray());
        $writer->close();

        // Mengunduh file yang sudah diekspor
        return response()->download($filePath);
    }
}
