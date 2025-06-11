@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6 min-h-screen">
    <h1 class="text-3xl font-semibold text-gray-800 mb-6">Tambah Siswa</h1>

    <form method="POST" action="{{ route('siswa.store') }}" enctype="multipart/form-data" class="bg-white p-6 rounded-xl shadow-md max-w-2xl">
        @csrf

        <!-- Nama -->
        <div class="mb-4">
            <label for="nama" class="block text-sm font-medium text-gray-700 mb-1">Nama Lengkap</label>
            <input type="text" name="nama" id="nama"
                class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring focus:ring-blue-200 focus:outline-none"
                value="{{ old('nama') }}" required>
            @error('nama')
                <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Tanggal Lahir -->
        <div class="mb-4">
            <label for="tanggal_lahir" class="block text-sm font-medium text-gray-700 mb-1">Tanggal Lahir</label>
            <input type="date" name="tanggal_lahir" id="tanggal_lahir"
                class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring focus:ring-blue-200 focus:outline-none"
                value="{{ old('tanggal_lahir') }}" required>
            @error('tanggal_lahir')
                <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Kelas -->
        <div class="mb-4">
            <label for="kelas" class="block text-sm font-medium text-gray-700 mb-1">Kelas</label>
            <input type="text" name="kelas" id="kelas"
                class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring focus:ring-blue-200 focus:outline-none"
                value="{{ old('kelas') }}" required>
            @error('kelas')
                <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Sekolah -->
        <div class="mb-4">
            <label for="sekolah" class="block text-sm font-medium text-gray-700 mb-1">Nama Sekolah</label>
            <input type="text" name="sekolah" id="sekolah" 
                class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring focus:ring-blue-200 focus:outline-none"
                value="{{ old('sekolah') }}" required>
            @error('sekolah')
                <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- He Qi -->
        <div class="mb-4">
            <label for="he_qi" class="block text-sm font-medium text-gray-700 mb-1">He Qi</label>
            @if(count($he_qis) === 1)
                <input type="text" id="he_qi" name="he_qi"
                    class="w-full px-4 py-2 bg-gray-100 border border-gray-300 rounded-md focus:outline-none cursor-not-allowed"
                    value="{{ $he_qis[0] }}" readonly>
            @else
                <select id="he_qi" name="he_qi"
                    class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring focus:ring-blue-200 focus:outline-none"
                    required>
                    <option value="">Pilih He Qi</option>
                    @foreach($he_qis as $heqi)
                        <option value="{{ $heqi }}" {{ old('he_qi') == $heqi ? 'selected' : '' }}>{{ $heqi }}</option>
                    @endforeach
                </select>
            @endif
            @error('he_qi')
                <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Foto Siswa -->
        <div class="mb-4">
            <label for="foto_siswa" class="block text-sm font-medium text-gray-700 mb-1">Foto Siswa</label>
            <input type="file" id="foto_siswa" name="foto_siswa"
                   class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-blue-200"
                   accept="image/*">
            @error('foto_siswa')
                <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Tanggal Dibantu -->
        <div class="mb-4">
            <label for="tanggal_dibantu" class="block text-sm font-medium text-gray-700 mb-1">Tanggal Dibantu</label>
            <input type="date" id="tanggal_dibantu" name="tanggal_dibantu"
                   class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-blue-200"
                   value="{{ old('tanggal_dibantu') }}">
            @error('tanggal_dibantu')
                <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Tombol Simpan -->
        <div class="mt-6 flex flex-wrap gap-4">
            <button type="submit"
                class="bg-indigo-600 text-white px-6 py-2 rounded-md hover:bg-indigo-700 transition duration-200">
                Simpan
            </button>
            <a href="{{ route('dashboard') }}"
               class="bg-gray-600 text-white px-6 py-2 rounded-md hover:bg-gray-700 transition duration-200">
                Kembali ke Dashboard
            </a>
        </div>

        <!-- Pesan Error Umum -->
        @if ($errors->any())
            <div class="mt-6 bg-red-100 border border-red-300 text-red-800 px-4 py-3 rounded">
                <ul class="list-disc list-inside text-sm">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

    </form>
</div>
@endsection
