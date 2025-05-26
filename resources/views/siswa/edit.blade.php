@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6 min-h-screen">
    <h1 class="text-3xl font-semibold text-gray-800 mb-6">Edit Siswa</h1>

    <form method="POST" action="{{ route('siswa.update', $siswa->id) }}" class="bg-white p-6 rounded-xl shadow-md max-w-2xl">
        @csrf
        @method('PUT')

        <!-- Nama -->
        <div class="mb-4">
            <label for="nama" class="block text-sm font-medium text-gray-700 mb-1">Nama Lengkap</label>
            <input type="text" name="nama" id="nama"
                class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring focus:ring-blue-200 focus:outline-none"
                value="{{ old('nama', $siswa->nama) }}" required>
            @error('nama')
                <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Tanggal Lahir -->
        <div class="mb-4">
            <label for="tanggal_lahir" class="block text-sm font-medium text-gray-700 mb-1">Tanggal Lahir</label>
            <input type="date" name="tanggal_lahir" id="tanggal_lahir"
                class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring focus:ring-blue-200 focus:outline-none"
                value="{{ old('tanggal_lahir', $siswa->tanggal_lahir) }}" required>
            @error('tanggal_lahir')
                <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Kelas -->
        <div class="mb-4">
            <label for="kelas" class="block text-sm font-medium text-gray-700 mb-1">Kelas</label>
            <input type="text" name="kelas" id="kelas"
                class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring focus:ring-blue-200 focus:outline-none"
                value="{{ old('kelas', $siswa->kelas) }}" required>
            @error('kelas')
                <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- He Qi -->
        <div class="mb-4">
            <label for="he_qi" class="block text-sm font-medium text-gray-700 mb-1">He Qi</label>
            <input type="text" name="he_qi" id="he_qi"
                class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring focus:ring-blue-200 focus:outline-none"
                value="{{ old('he_qi', $siswa->he_qi) }}" required>
            @error('he_qi')
                <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Tombol Submit -->
        <div class="mt-6">
            <button type="submit"
                class="bg-indigo-600 text-white px-6 py-2 rounded-md hover:bg-indigo-700 transition duration-200">
                Simpan Perubahan
            </button>
        </div>
    </form>
</div>
@endsection
