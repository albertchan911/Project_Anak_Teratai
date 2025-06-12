@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6 max-w-4xl">
    <h1 class="text-3xl font-bold text-gray-800 mb-6">Tambah Catatan Penilaian untuk Siswa: {{ $siswa->nama }}</h1>

    <!-- Form Input Nilai -->
    <div class="bg-white shadow rounded-lg p-6 mb-8">
        <h2 class="text-xl font-semibold text-gray-700 mb-4">Detail Catatan</h2>
        <form action="{{ route('nilai.store', $siswa->id) }}" method="POST">
            @csrf
            <div class="space-y-6">
                <!-- Nilai Rata-Rata dan Semester Sejajar -->
                <div class="flex items-center space-x-6">
                    <!-- Nilai Rata-Rata -->
                    <div class="flex-1">
                        <label for="nilai_rata_rata" class="block text-sm font-medium text-gray-700">Nilai Rata-Rata</label>
                        <input type="number" name="nilai_rata_rata" id="nilai_rata_rata" class="mt-2 block w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500" step="0.1" value="{{ old('nilai_rata_rata') }}" required>
                    </div>

                    <!-- Semester -->
                    <div class="flex-1">
                        <label for="semester" class="block text-sm font-medium text-gray-700">Semester</label>
                        <div class="mt-2 space-x-4">
                            <label class="inline-flex items-center">
                                <input type="radio" name="semester" value="Semester 1" class="form-radio" {{ old('semester') == 'Semester 1' ? 'checked' : '' }}>
                                <span class="ml-2">Semester 1</span>
                            </label>
                            <label class="inline-flex items-center">
                                <input type="radio" name="semester" value="Semester 2" class="form-radio" {{ old('semester') == 'Semester 2' ? 'checked' : '' }}>
                                <span class="ml-2">Semester 2</span>
                            </label>
                        </div>
                    </div>
                </div>

                <!-- Input Kelas -->
                <div class="form-group">
                    <label for="kelas" class="block text-sm font-medium text-gray-700">Kelas</label>
                    <input type="number" name="kelas" id="kelas" class="mt-2 block w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500" value="{{ old('kelas') }}" required>
                </div>

                <!-- Catatan untuk Anak -->
                <div class="form-group">
                    <label for="catatan" class="block text-sm font-medium text-gray-700">Catatan untuk Anak</label>
                    <textarea name="catatan" id="catatan" class="mt-2 block w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500">{{ old('catatan') }}</textarea>
                </div>

                <!-- Tombol Simpan -->
                <div class="mt-6">
                    <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white py-2 rounded-md text-sm font-medium shadow-sm">Simpan Catatan</button>
                </div>
            </div>
        </form>
    </div>

    <!-- Kembali ke Dashboard -->
    <div class="mt-6">
        <a href="{{ route('dashboard') }}" class="inline-block bg-gray-500 text-white px-5 py-2 rounded-md hover:bg-gray-600 transition">Kembali ke Dashboard</a>
    </div>
</div>
@endsection
