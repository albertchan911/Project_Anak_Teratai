@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6 max-w-4xl">
    <h1 class="text-3xl font-bold text-gray-800 mb-6">Edit Siswa</h1>

    <form action="{{ route('siswa.update', $siswa->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        
        <div class="bg-white shadow rounded-lg p-6 mb-8">
            <div class="mb-4">
                <label for="nama" class="block text-sm font-medium text-gray-700">Nama Lengkap</label>
                <input type="text" id="nama" name="nama" class="form-input mt-1 block w-full" required value="{{ $siswa->nama }}">
                @error('nama') <div class="text-red-500 text-sm mt-1">{{ $message }}</div> @enderror
            </div>

            <div class="mb-4">
                <label for="sekolah" class="block text-sm font-medium text-gray-700">Sekolah</label>
                <input type="text" id="sekolah" name="sekolah" class="form-input mt-1 block w-full" required value="{{ $siswa->sekolah }}">
                @error('sekolah') <div class="text-red-500 text-sm mt-1">{{ $message }}</div> @enderror
            </div>

            <div class="mb-4">
                <label for="tanggal_lahir" class="block text-sm font-medium text-gray-700">Tanggal Lahir</label>
                <input type="date" id="tanggal_lahir" name="tanggal_lahir" class="form-input mt-1 block w-full" required value="{{ $siswa->tanggal_lahir }}">
                @error('tanggal_lahir') <div class="text-red-500 text-sm mt-1">{{ $message }}</div> @enderror
            </div>

            <div class="mb-4">
                <label for="kelas" class="block text-sm font-medium text-gray-700">Kelas</label>
                <input type="number" id="kelas" name="kelas" class="form-input mt-1 block w-full" required value="{{ $siswa->kelas }}">
                @error('kelas') <div class="text-red-500 text-sm mt-1">{{ $message }}</div> @enderror
            </div>

            <div class="mb-4">
                <label for="he_qi" class="block text-sm font-medium text-gray-700">He Qi</label>
                <select id="he_qi" name="he_qi" class="form-input mt-1 block w-full" required>
                    <option value="Barat 1" {{ $siswa->he_qi == 'Barat 1' ? 'selected' : '' }}>Barat 1</option>
                    <option value="Barat 2" {{ $siswa->he_qi == 'Barat 2' ? 'selected' : '' }}>Barat 2</option>
                    <option value="Utara 1" {{ $siswa->he_qi == 'Utara 1' ? 'selected' : '' }}>Utara 1</option>
                    <option value="Utara 2" {{ $siswa->he_qi == 'Utara 2' ? 'selected' : '' }}>Utara 2</option>
                    <option value="Tangerang" {{ $siswa->he_qi == 'Tangerang' ? 'selected' : '' }}>Tangerang</option>
                    <option value="Timur" {{ $siswa->he_qi == 'Timur' ? 'selected' : '' }}>Timur</option>
                    <option value="Cikarang" {{ $siswa->he_qi == 'Cikarang' ? 'selected' : '' }}>Cikarang</option>
                    <option value="Pusat" {{ $siswa->he_qi == 'Pusat' ? 'selected' : '' }}>Pusat</option>
                </select>
                @error('he_qi') <div class="text-red-500 text-sm mt-1">{{ $message }}</div> @enderror
            </div>

            <div class="mb-4">
                <label for="foto_siswa" class="block text-sm font-medium text-gray-700">Foto Siswa</label>
                <input type="file" id="foto_siswa" name="foto_siswa" class="form-input mt-1 block w-full" accept="image/*">
                @error('foto_siswa') <div class="text-red-500 text-sm mt-1">{{ $message }}</div> @enderror
                <div class="mt-2">
                    @if($siswa->foto_siswa)
                        <img src="{{ asset('storage/' . $siswa->foto_siswa) }}" alt="Foto Siswa" style="max-width: 200px; height: auto; border-radius: 10px;">
                    @endif
                </div>
            </div>

            <div class="mb-4">
                <label for="tanggal_dibantu" class="block text-sm font-medium text-gray-700">Tanggal Dibantu</label>
                <input type="date" id="tanggal_dibantu" name="tanggal_dibantu" class="form-input mt-1 block w-full" value="{{ $siswa->tanggal_dibantu }}">
                @error('tanggal_dibantu') <div class="text-red-500 text-sm mt-1">{{ $message }}</div> @enderror
            </div>

            <div class="flex justify-between">
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">Simpan Perubahan</button>
                <a href="{{ route('dashboard') }}" class="bg-gray-500 text-white px-4 py-2 rounded-md hover:bg-gray-600">Kembali ke Dashboard</a>
            </div>
        </div>
    </form>
</div>
@endsection
