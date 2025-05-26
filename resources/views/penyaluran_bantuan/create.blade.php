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

        <!-- Jenis Bantuan -->
        <div class="mb-4">
            <label for="jenis_bantuan" class="block text-sm font-medium text-gray-700 mb-1">Jenis Bantuan</label>
            <select name="jenis_bantuan" class="w-full border rounded-md px-3 py-2" required>
                <option value="">-- Pilih Jenis --</option>
                <option value="SPP">SPP</option>
                <option value="Uang Pangkal">Uang Pangkal</option>
                <option value="Uang Kegiatan">Uang Kegiatan</option>
                <option value="Uang Seragam">Uang Seragam</option>
                <option value="Semesteran">Semesteran</option>
                <option value="Lainnya">Lainnya</option>
            </select>
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
            <select name="bulan_realisasi" class="w-full border rounded-md px-3 py-2" required>
                <option value="">-- Pilih Bulan --</option>
                @foreach(['Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember'] as $bulan)
                    <option value="{{ $bulan }}">{{ $bulan }}</option>
                @endforeach
            </select>
        </div>

        <!-- Keterangan -->
        <div class="mb-4">
            <label for="keterangan" class="block text-sm font-medium text-gray-700 mb-1">Keterangan (Opsional)</label>
            <textarea name="keterangan" rows="2" class="w-full border rounded-md px-3 py-2"></textarea>
        </div>

        <!-- Upload Kwitansi -->
        <div class="mb-6">
            <label for="kwitansi_image" class="block text-sm font-medium text-gray-700 mb-1">Upload Kwitansi</label>
            <input type="file" name="kwitansi_image" accept="image/*" class="w-full border rounded-md px-3 py-2">
        </div>

        <!-- Tombol Aksi -->
        <div class="flex justify-between">
            <a href="{{ route('penyaluran-bantuan.index') }}" class="bg-gray-300 text-gray-800 px-6 py-2 rounded-md hover:bg-gray-400 transition">
                Batal
            </a>
            <button type="submit" class="bg-green-600 text-white px-6 py-2 rounded-md hover:bg-green-700 transition">
                Simpan Bantuan
            </button>
        </div>
    </form>
</div>
@endsection
