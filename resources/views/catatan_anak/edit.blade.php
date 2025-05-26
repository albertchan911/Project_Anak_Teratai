@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6 min-h-screen">
    <h2 class="text-2xl font-bold text-gray-800 mb-6">Edit Penyaluran Bantuan</h2>

    <form action="{{ route('penyaluran-bantuan.update', $penyaluranBantuan->id) }}" method="POST" enctype="multipart/form-data"
        class="bg-white p-6 rounded-xl shadow-md max-w-3xl">
        @csrf
        @method('PUT')

        <!-- Nama Anak -->
        <div class="mb-4">
            <label for="siswa_id" class="block text-sm font-medium text-gray-700 mb-1">Nama Anak</label>
            <select name="siswa_id" class="w-full border rounded-md px-3 py-2" required>
                @foreach($siswas as $siswa)
                    <option value="{{ $siswa->id }}" {{ $penyaluranBantuan->siswa_id == $siswa->id ? 'selected' : '' }}>
                        {{ $siswa->nama }} (Kelas {{ $siswa->kelas }})
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Jenis Bantuan -->
        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700 mb-1">Jenis Bantuan</label>
            <select name="jenis_bantuan" class="w-full border rounded-md px-3 py-2" required>
                @foreach(['SPP','Uang Pangkal','Uang Kegiatan','Uang Seragam','Semesteran','Lainnya'] as $jenis)
                    <option value="{{ $jenis }}" {{ $penyaluranBantuan->jenis_bantuan == $jenis ? 'selected' : '' }}>{{ $jenis }}</option>
                @endforeach
            </select>
        </div>

        <!-- Jumlah -->
        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700 mb-1">Jumlah Bantuan (Rp)</label>
            <input type="number" name="jumlah" class="w-full border rounded-md px-3 py-2" value="{{ $penyaluranBantuan->jumlah }}" required>
        </div>

        <!-- Tanggal -->
        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700 mb-1">Tanggal Realisasi</label>
            <input type="date" name="tanggal" class="w-full border rounded-md px-3 py-2" value="{{ $penyaluranBantuan->tanggal }}" required>
        </div>

        <!-- Bulan Realisasi -->
        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700 mb-1">Bulan Realisasi</label>
            <select name="bulan_realisasi" class="w-full border rounded-md px-3 py-2" required>
                @foreach(['Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember'] as $bulan)
                    <option value="{{ $bulan }}" {{ $penyaluranBantuan->bulan_realisasi == $bulan ? 'selected' : '' }}>{{ $bulan }}</option>
                @endforeach
            </select>
        </div>

        <!-- Keterangan -->
        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700 mb-1">Keterangan</label>
            <textarea name="keterangan" class="w-full border rounded-md px-3 py-2" rows="2">{{ $penyaluranBantuan->keterangan }}</textarea>
        </div>

        <!-- Kwitansi Lama -->
        @if ($penyaluranBantuan->kwitansi_image)
        <div class="mb-4">
            <p class="text-sm text-gray-600 mb-2">Kwitansi Sebelumnya:</p>
            <img src="{{ asset('storage/kwitansi/' . $penyaluranBantuan->kwitansi_image) }}" alt="Kwitansi" class="w-40 h-auto border rounded-md">
        </div>
        @endif

        <!-- Ganti Kwitansi -->
        <div class="mb-6">
            <label class="block text-sm font-medium text-gray-700 mb-1">Ganti Kwitansi (opsional)</label>
            <input type="file" name="kwitansi_image" class="w-full border rounded-md px-3 py-2" accept="image/*">
        </div>

        <!-- Submit -->
        <button type="submit" class="bg-indigo-600 text-white px-6 py-2 rounded-md hover:bg-indigo-700 transition duration-200">
            Simpan Perubahan
        </button>
    </form>
</div>
@endsection
