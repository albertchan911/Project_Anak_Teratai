@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6 max-w-3xl">
    <h2 class="text-2xl font-bold text-gray-800 mb-6">Tambah Catatan untuk: {{ $siswa->nama }}</h2>

    <form action="{{ route('catatan-anak.store', $siswa->id) }}" method="POST"
          class="bg-white p-6 rounded-xl shadow-md">
        @csrf

        <!-- Tanggal Catatan -->
        <div class="mb-4">
            <label for="tanggal_catatan" class="block text-sm font-medium text-gray-700 mb-1">Tanggal Catatan</label>
            <input type="date" name="tanggal_catatan" id="tanggal_catatan"
                   class="w-full border rounded-md px-3 py-2 focus:ring focus:ring-blue-200" required>
        </div>

        <!-- Isi Catatan -->
        <div class="mb-6">
            <label for="isi_catatan" class="block text-sm font-medium text-gray-700 mb-1">Isi Catatan</label>
            <textarea name="isi_catatan" id="isi_catatan" rows="4"
                      class="w-full border rounded-md px-3 py-2 focus:ring focus:ring-blue-200" required></textarea>
        </div>

        <!-- Tombol Aksi -->
        <div class="flex gap-3">
            <button type="submit"
                    class="bg-green-600 text-white px-5 py-2 rounded-md hover:bg-green-700 transition">
                Simpan Catatan
            </button>

            <a href="{{ route('dashboard') }}"
               class="bg-gray-500 text-white px-5 py-2 rounded-md hover:bg-gray-600 transition">
                Kembali ke Dashboard
            </a>
        </div>
    </form>
</div>
@endsection
