@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6 min-h-screen">
    <h2 class="text-2xl font-bold text-gray-800 mb-6">Tambah Penyaluran Bantuan Anak Teratai</h2>

    <form action="{{ route('penyaluran-bantuan.store') }}" method="POST" enctype="multipart/form-data"
        class="bg-white p-6 rounded-xl shadow-md max-w-3xl">
        @csrf

        <!-- Nama Anak -->
        <div class="mb-4">
            <label for="siswa_id" class="block text-sm font-medium text-gray-700 mb-1">Nama Anak</label>
            <select name="siswa_id" id="siswa_id" class="w-full border rounded-md px-3 py-2" required>
                <option value="">-- Pilih Anak --</option>
                @foreach($siswas as $siswa)
                    <option value="{{ $siswa->id }}">{{ $siswa->nama }} (Kelas {{ $siswa->kelas }})</option>
                @endforeach
            </select>
        </div>

        <!-- Input Sekolah -->
        <div class="mb-4">
            <label for="sekolah" class="block text-sm font-medium text-gray-700 mb-1">Sekolah</label>
            <input type="text" name="sekolah" id="sekolah" required class="w-full border rounded-md px-3 py-2">
        </div>

        <!-- Kelas -->
        <div class="mb-4">
            <label for="kelas" class="block text-sm font-medium text-gray-700 mb-1">Kelas</label>
            <input type="number" name="kelas" id="kelas"
                class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring focus:ring-blue-200 focus:outline-none"
                value="{{ old('kelas') }}" min="1" max="12" required>
            @error('kelas')
                <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Jenis Bantuan -->
        <div class="mb-4">
            <label for="jenis_bantuan" class="block text-sm font-medium text-gray-700 mb-1">Jenis Bantuan</label>
            <div id="jenis-bantuan-container">
                <div class="flex items-center space-x-4 mb-2">
                    <select name="jenis_bantuan[]" class="w-full border rounded-md px-3 py-2" required>
                        <option value="">-- Pilih Jenis Bantuan --</option>
                        <option value="SPP">SPP</option>
                        <option value="Uang Pangkal">Uang Pangkal</option>
                        <option value="Uang Seragam">Uang Seragam</option>
                        <option value="Uang Buku">Uang Buku</option>
                        <option value="Uang Ujian">Uang Ujian</option>
                        <option value="Semesteran">Semesteran</option>
                    </select>
                </div>
            </div>
        </div>

        <!-- Jumlah -->
        <div class="mb-4">
            <label for="jumlah" class="block text-sm font-medium text-gray-700 mb-1">Jumlah Bantuan (Rp)</label>
            <input type="number" name="jumlah" class="w-full border rounded-md px-3 py-2" required>
        </div>

        <!-- Tanggal -->
        <div class="mb-4">
            <label for="tanggal" class="block text-sm font-medium text-gray-700 mb-1">Tanggal Realisasi</label>
            <input type="date" name="tanggal" class="w-full border rounded-md px-3 py-2" required>
        </div>

<!-- Bulan Realisasi -->
<div class="mb-4">
    <label for="bulan_realisasi" class="block text-sm font-medium text-gray-700 mb-1">Bulan Realisasi</label>
    <div id="bulan-realisasi-container">
        <div class="flex items-center space-x-4 mb-2">
            <select name="bulan_realisasi[]" class="w-full border rounded-md px-3 py-2" required>
                <option value="">-- Pilih Bulan --</option>
                @foreach(['Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember'] as $bulan)
                    <option value="{{ $bulan }}">{{ $bulan }}</option>
                @endforeach
            </select>
            <button type="button" class="bg-red-600 text-white px-4 py-2 rounded" onclick="removeBulan(this)">Hapus</button>
        </div>
    </div>
    <button type="button" id="add-bulan-button" class="bg-blue-600 text-white px-4 py-2 rounded mt-2">
        Tambah Bulan
    </button>
</div>

<script>
    document.getElementById('add-bulan-button').addEventListener('click', function() {
        // Ambil container untuk input bulan
        const bulanRealisasiContainer = document.getElementById('bulan-realisasi-container');

        // Buat elemen input bulan baru
        const newBulanInput = document.createElement('div');
        newBulanInput.classList.add('flex', 'items-center', 'space-x-4', 'mb-2');

        // Buat dropdown bulan baru
        newBulanInput.innerHTML = `
            <select name="bulan_realisasi[]" class="w-full border rounded-md px-3 py-2" required>
                <option value="">-- Pilih Bulan --</option>
                @foreach(['Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember'] as $bulan)
                    <option value="{{ $bulan }}">{{ $bulan }}</option>
                @endforeach
            </select>
            <button type="button" class="bg-red-600 text-white px-4 py-2 rounded" onclick="removeBulan(this)">Hapus</button>
        `;

        // Masukkan elemen input bulan baru ke dalam container
        bulanRealisasiContainer.appendChild(newBulanInput);
    });

    // Fungsi untuk menghapus dropdown bulan
    function removeBulan(button) {
        const bulanRealisasiContainer = document.getElementById('bulan-realisasi-container');
        bulanRealisasiContainer.removeChild(button.parentNode);
    }
</script>




        <!-- Keterangan -->
        <div class="mb-4">
            <label for="keterangan" class="block text-sm font-medium text-gray-700 mb-1">Keterangan (Opsional)</label>
            <textarea name="keterangan" rows="2" class="w-full border rounded-md px-3 py-2"></textarea>
        </div>

        <!-- Upload Bukti Pembayaran -->
        <div class="mb-6">
            <label for="bukti_pembayaran" class="block text-sm font-medium text-gray-700 mb-1">Upload Bukti Pembayaran</label>
            <input type="file" name="bukti_pembayaran" accept="image/*" class="w-full border rounded-md px-3 py-2">
        </div>

        <!-- Tombol Aksi -->
        <div class="flex justify-between">
            <a href="{{ route('penyaluran-bantuan.index') }}" class="bg-gray-300 text-gray-800 px-6 py-2 rounded-md hover:bg-gray-400 transition">
                Batal
            </a>
            <button type="submit" class="bg-green-600 text-white px-6 py-2 rounded-md hover:bg-green-700 transition">
                Simpan Bantuan
            </button>

            @if($errors->any())
    <div class="bg-red-500 text-white p-3 rounded mb-4">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

        </div>
    </form>
</div>
@endsection
