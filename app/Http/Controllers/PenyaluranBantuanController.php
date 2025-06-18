<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Siswa;
use App\Models\PenyaluranBantuan;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;
use Spatie\SimpleExcel\SimpleExcelWriter;


class PenyaluranBantuanController extends Controller
{
    public function index(Request $request)
    {
        $user = auth()->user();
        $he_qis = json_decode($user->he_qi, true);

        if (!is_array($he_qis)) {
            $he_qis = [$he_qis];
        }

        $bantuans = PenyaluranBantuan::with('siswa')
            ->whereHas('siswa', function ($query) use ($he_qis, $request) {
                $query->whereIn('he_qi', $he_qis);

                // Filter by he_qi dari form
                if ($request->filled('he_qi')) {
                    $query->where('he_qi', $request->he_qi);
                }

                // Filter by nama_siswa
                if ($request->filled('nama_siswa')) {
                    $query->where('nama', 'like', '%' . $request->nama_siswa . '%');
                }
            });

        // Filter by jenis_bantuan
        if ($request->filled('jenis_bantuan') && is_array($request->jenis_bantuan)) {
            $filteredJenis = array_filter($request->jenis_bantuan, function ($item) {
                return !is_null($item) && trim($item) !== '' && $item !== 'null';
            });

            if (count($filteredJenis)) {
                $bantuans->where(function ($query) use ($filteredJenis) {
                    foreach ($filteredJenis as $jenis) {
                        $query->orWhereJsonContains('jenis_bantuan', trim($jenis));
                    }
                });
            }
        }

        // Filter by tanggal
        if ($request->has(['start_date', 'end_date']) && $request->start_date && $request->end_date) {
            $bantuans->whereBetween('tanggal', [
                Carbon::parse($request->start_date)->startOfDay(),
                Carbon::parse($request->end_date)->endOfDay()
            ]);
        }

        $bantuans = $bantuans->latest()->paginate(10);

        // Dropdown siswa
        $siswas = Siswa::whereIn('he_qi', $he_qis)
            ->orderBy('nama')
            ->get();

        // Dropdown jenis bantuan
        $jenisBantuanOptions = PenyaluranBantuan::select('jenis_bantuan')->distinct()->get();

        $totalRealisasi = $bantuans->total();
        $totalNominalRealisasi = $bantuans->sum('jumlah');
        $he_qis = json_decode($user->he_qi, true); // Ambil data he_qi dari user yang login


        return view('penyaluran_bantuan.index', compact(
            'bantuans',
            'siswas',
            'jenisBantuanOptions',
            'totalRealisasi',
            'totalNominalRealisasi',
            'he_qis' // Menambahkan he_qis ke dalam data view
        ));
    }

    public function create()
    {
        // Get students based on the logged-in user's 'he_qi'
        $user = auth()->user();
        $heqis = json_decode($user->he_qi);
        $siswas = Siswa::whereIn('he_qi', $heqis)->orderBy('nama')->get();


        return view('penyaluran_bantuan.create', compact('siswas'));
    }

    public function store(Request $request)
    {
        // Validasi data yang diterima
        $validatedData = $request->validate([
            'siswa_id' => 'required|exists:siswas,id',
            'jenis_bantuan' => 'required|array',  // Mengubah validasi jenis_bantuan menjadi array
            'jenis_bantuan.*' => 'required|string', // Pastikan setiap elemen dalam array adalah string
            'jumlah' => 'required|numeric',
            'keterangan' => 'nullable|string',
            'tanggal' => 'required|date',
            'sekolah' => 'required|string|max:255',
            'bulan_realisasi' => 'required|array',
            'bulan_realisasi.*' => 'required|string',
            'bukti_pembayaran' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:5120',  // Validasi untuk bukti pembayaran
        ]);

        // Konversi nama bulan menjadi format Y-m
        $bulanRealisasi = [];
        $bulanNamaKeNomor = [
            'Januari' => '01',
            'Februari' => '02',
            'Maret' => '03',
            'April' => '04',
            'Mei' => '05',
            'Juni' => '06',
            'Juli' => '07',
            'Agustus' => '08',
            'September' => '09',
            'Oktober' => '10',
            'November' => '11',
            'Desember' => '12',
        ];

        foreach ($request->bulan_realisasi as $bulan) {
            // Menyesuaikan tahun dengan tahun saat ini
            $tahunSekarang = Carbon::now()->year;
            $bulanRealisasi[] = $tahunSekarang . '-' . $bulanNamaKeNomor[$bulan];
        }

        // Menyimpan data penyaluran bantuan ke database tanpa bukti pembayaran (hanya kwitansi)
        $penyaluran = PenyaluranBantuan::create([
            'siswa_id' => $validatedData['siswa_id'],
            'jenis_bantuan' => json_encode($validatedData['jenis_bantuan']),  // Menyimpan jenis bantuan sebagai array JSON
            'jumlah' => $validatedData['jumlah'],
            'keterangan' => $validatedData['keterangan'],
            'tanggal' => $validatedData['tanggal'],
            'sekolah' => $validatedData['sekolah'],
            'bulan_realisasi' => json_encode($bulanRealisasi),
        ]);

        // Jika ada bukti pembayaran, upload gambar
        if ($request->hasFile('bukti_pembayaran')) {
            $image = $request->file('bukti_pembayaran');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/bukti_pembayaran', $imageName);

            // Update data penyaluran dengan bukti pembayaran
            $penyaluran->update([
                'bukti_pembayaran' => $imageName,
            ]);
        }

        return redirect()->route('penyaluran-bantuan.index')->with('success', 'Bantuan berhasil dicatat.');
    }


    public function edit($id)
    {
        $bantuan = PenyaluranBantuan::findOrFail($id);

        // Mengambil bulan yang sudah dipilih dari database dan mengirimkannya ke view
        $bulanSelected = json_decode($bantuan->bulan_realisasi);

        return view('penyaluran_bantuan.edit', compact('bantuan', 'bulanSelected'));
    }


    public function update(Request $request, $id)
    {
        // Menemukan data bantuan berdasarkan ID
        $bantuan = PenyaluranBantuan::findOrFail($id);

        // Mendapatkan bulan realisasi yang dikirimkan
        $bulanRealisasi = $request->get('bulan_realisasi'); // Mendapatkan bulan realisasi yang dikirimkan

        // Pastikan bulan_realisasi adalah array dan tidak kosong
        if (empty($bulanRealisasi) || !is_array($bulanRealisasi)) {
            return redirect()->back()->withErrors(['bulan_realisasi' => 'Bulan Realisasi harus diisi dengan benar.']);
        }

        // Update data bantuan dengan data yang sudah diterima
        $bantuan->update([
            'bulan_realisasi' => json_encode($bulanRealisasi), // Simpan dalam format JSON
            'siswa_id' => $request->input('siswa_id'),
            'jenis_bantuan' => json_encode($request->input('jenis_bantuan')), // Simpan jenis bantuan sebagai JSON
            'jumlah' => $request->input('jumlah'),
            'tanggal' => $request->input('tanggal'),
            'sekolah' => $request->input('sekolah'),
            'keterangan' => $request->input('keterangan'),
        ]);

        // Jika ada file kwitansi di-upload
        if ($request->hasFile('kwitansi')) {
            $kwitansi = $request->file('kwitansi');
            $kwitansiName = time() . '.' . $kwitansi->getClientOriginalExtension();
            $kwitansi->storeAs('public/kwitansi', $kwitansiName);
            $bantuan->kwitansi = $kwitansiName;
        }

        // Jika ada file bukti pembayaran di-upload
        if ($request->hasFile('bukti_pembayaran')) {
            $image = $request->file('bukti_pembayaran');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/bukti_pembayaran', $imageName);
            $bantuan->bukti_pembayaran = $imageName;
        }

        // Simpan perubahan jika ada file yang di-upload
        if ($request->hasFile('kwitansi') || $request->hasFile('bukti_pembayaran')) {
            $bantuan->save();
        }

        return redirect()->route('penyaluran-bantuan.index')->with('success', 'Penyaluran bantuan berhasil diperbarui.');
    }

    public function showUploadKwitansi($id)
    {
        $bantuan = PenyaluranBantuan::findOrFail($id);
        return view('penyaluran_bantuan.upload_kwitansi', compact('bantuan'));
    }

    public function uploadKwitansi(Request $request, $id)
    {
        $request->validate([
            'kwitansi_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:5120',
        ]);

        $bantuan = PenyaluranBantuan::findOrFail($id);

        $image = $request->file('kwitansi_image');
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $image->storeAs('public/kwitansi', $imageName);

        $bantuan->kwitansi_image = $imageName;
        $bantuan->save();

        return redirect()->route('penyaluran-bantuan.index')->with('success', 'Kwitansi berhasil diupload.');
    }

    public function destroy($id)
    {
        $penyaluranBantuan = PenyaluranBantuan::findOrFail($id);

        // Delete the kwitansi image if it exists
        if ($penyaluranBantuan->kwitansi_image) {
            Storage::delete('public/kwitansi/' . $penyaluranBantuan->kwitansi_image);
        }

        // Delete the record from the database
        $penyaluranBantuan->delete();

        return redirect()->route('penyaluran-bantuan.index')->with('success', 'Bantuan berhasil dihapus.');
    }

public function report(Request $request)
{
    $user = auth()->user();
    $he_qis = json_decode($user->he_qi, true);
    if (!is_array($he_qis)) {
        $he_qis = [$he_qis];
    }

    // Ambil data yang terfilter sesuai dengan request
    $bantuans = PenyaluranBantuan::with('siswa')
        ->when($request->filled('he_qi'), function ($query) use ($request) {
            $query->whereHas('siswa', function ($query) use ($request) {
                $query->where('he_qi', $request->he_qi);
            });
        })
        ->when($request->filled('jenis_bantuan'), function ($query) use ($request) {
            $query->whereJsonContains('jenis_bantuan', $request->jenis_bantuan);
        })
        ->when($request->filled('start_date') && $request->filled('end_date'), function ($query) use ($request) {
            $query->whereBetween('tanggal', [
                Carbon::parse($request->start_date)->startOfDay(),
                Carbon::parse($request->end_date)->endOfDay(),
            ]);
        })
        ->get();

    // Dropdown siswa dan jenis bantuan
    $siswas = Siswa::whereIn('he_qi', $he_qis)->orderBy('nama')->get();
    $jenisBantuanOptions = PenyaluranBantuan::select('jenis_bantuan')->distinct()->get();

    return view('penyaluran_bantuan.report', compact('bantuans', 'siswas', 'jenisBantuanOptions', 'he_qis'));
}

public function exportReport(Request $request)
{
    $search = $request->input('search');
    $jenis_bantuan = $request->input('jenis_bantuan');
    $heqi = $request->input('he_qi');
    $tanggal_mulai = $request->input('start_date');
    $tanggal_selesai = $request->input('end_date');

    // Mulai query untuk data penyaluran bantuan berdasarkan filter
    $query = PenyaluranBantuan::with('siswa')
        ->when($request->filled('he_qi'), function ($query) use ($request) {
            $query->whereHas('siswa', function ($subQuery) use ($request) {
                $subQuery->where('he_qi', $request->he_qi);
            });
        })
        ->when($request->filled('jenis_bantuan'), function ($query) use ($request) {
            $query->whereJsonContains('jenis_bantuan', $request->jenis_bantuan);
        })
        ->when($request->filled('start_date') && $request->filled('end_date'), function ($query) use ($request) {
            $query->whereBetween('tanggal', [
                Carbon::parse($request->start_date)->startOfDay(),
                Carbon::parse($request->end_date)->endOfDay(),
            ]);
        })
        ->get();

    // Menyusun data untuk dimasukkan ke dalam file Excel
    $exportData = $query->map(function ($item, $index) {
        return [
            'No' => $index + 1,
            'Nama Siswa' => $item->siswa->nama,
            'Sekolah' => $item->sekolah,
            'Jenis Bantuan' => implode(', ', json_decode($item->jenis_bantuan)),
            'Jumlah' => $item->jumlah,
            'Tanggal' => Carbon::parse($item->tanggal)->format('d F Y'),
            'Bulan Realisasi' => implode(', ', json_decode($item->bulan_realisasi)),
        ];
    });

    // Menulis data ke dalam file Excel
    $filePath = public_path('penyaluran_bantuan_report.xlsx');
    $writer = SimpleExcelWriter::create($filePath);
    $writer->addRows($exportData);
    $writer->close();

    // Mengunduh file yang sudah diekspor
    return response()->download($filePath);
}



}
