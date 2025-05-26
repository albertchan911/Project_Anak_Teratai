<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Siswa;
use App\Models\PenyaluranBantuan;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class PenyaluranBantuanController extends Controller
{
public function index(Request $request)
{
    // Pastikan kita mendapatkan data penyaluran bantuan dengan benar
    $query = PenyaluranBantuan::with('siswa')->latest();
    
    // Filter berdasarkan 'jenis_bantuan'
    if ($request->filled('jenis_bantuan')) {
        $query->where('jenis_bantuan', $request->jenis_bantuan);
    }
    
    // Filter berdasarkan 'nama_siswa' (berdasarkan ID siswa)
    if ($request->filled('nama_siswa')) {
        $query->where('siswa_id', $request->nama_siswa);
    }

    // Ambil data bantuan dengan pagination
    $bantuans = $query->paginate(10);

    // *** Hanya ambil siswa sesuai he_qi user login ***
    $user = auth()->user();
    $heqis = json_decode($user->he_qi, true);
    if (!is_array($heqis)) {
        $heqis = [$heqis];
    }
    $siswas = Siswa::whereIn('he_qi', $heqis)
                   ->orderBy('nama')
                   ->get();

    // Kirim variabel yang benar ke view
    return view('penyaluran_bantuan.index', compact('bantuans', 'siswas'));
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
        // Validasi data yang masuk
        $request->validate([
            'siswa_id' => 'required|exists:siswas,id',
            'jenis_bantuan' => 'required|string',
            'jumlah' => 'required|numeric',
            'tanggal' => 'required|date',
            'kwitansi_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:5120',
        ]);
        
        $kwitansi_image = null;
        
        // Mengecek apakah ada file yang di-upload
        if ($request->hasFile('kwitansi_image')) {
            // Mengambil file gambar
            $image = $request->file('kwitansi_image');
            
            // Menyimpan gambar ke dalam storage/public/kwitansi
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/kwitansi', $imageName);
            
            // Menyimpan nama file gambar ke variabel
            $kwitansi_image = $imageName;
        }
    
        // Menyimpan data penyaluran bantuan ke database
        PenyaluranBantuan::create([
            'siswa_id' => $request->siswa_id,
            'jenis_bantuan' => $request->jenis_bantuan,
            'jumlah' => $request->jumlah,
            'tanggal' => $request->tanggal,
            'kwitansi_image' => $kwitansi_image,
        ]);
    
        return redirect()->route('penyaluran-bantuan.index')->with('success', 'Bantuan berhasil dicatat.');
    }
    

    public function edit($id)
    {
        $penyaluranBantuan = PenyaluranBantuan::findOrFail($id);
        $siswas = Siswa::all(); // Get all students for the dropdown
        return view('penyaluran_bantuan.edit', compact('penyaluranBantuan', 'siswas'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'siswa_id' => 'required|exists:siswas,id',
            'jenis_bantuan' => 'required|string',
            'jumlah' => 'required|numeric',
            'tanggal' => 'required|date',
            'kwitansi_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:5120',
        ]);

        $penyaluranBantuan = PenyaluranBantuan::findOrFail($id);
        $imageName = $penyaluranBantuan->kwitansi_image; // Use the existing image if not updated

        // If a new image is uploaded
        if ($request->hasFile('kwitansi_image')) {
            $image = $request->file('kwitansi_image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/kwitansi', $imageName);
        }

        // Update Penyaluran Bantuan data
        $penyaluranBantuan->update([
            'siswa_id' => $request->siswa_id,
            'jenis_bantuan' => $request->jenis_bantuan,
            'jumlah' => $request->jumlah,
            'tanggal' => $request->tanggal,
            'kwitansi_image' => $imageName,
        ]);

        return redirect()->route('penyaluran-bantuan.index')->with('success', 'Bantuan berhasil diperbarui.');
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
}
