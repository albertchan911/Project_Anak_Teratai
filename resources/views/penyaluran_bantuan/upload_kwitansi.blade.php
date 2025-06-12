@extends('layouts.app')
@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-2xl font-bold text-gray-800 mb-6">Upload Kwitansi</h1>

    <div class="bg-white p-6 rounded shadow max-w-xl">
        <p class="mb-4"><strong>Nama Siswa:</strong> {{ $bantuan->siswa->nama }}</p>
        <p class="mb-4"><strong>Jenis Bantuan:</strong>@if($bantuan->jenis_bantuan)
        @foreach (json_decode($bantuan->jenis_bantuan) as $jenis)
            <span class="block">{{ $jenis }}</span>
        @endforeach
    @else
        <span>Tidak ada jenis bantuan</span>
    @endif</p>
        <p class="mb-4"><strong>Jumlah:</strong> Rp{{ number_format($bantuan->jumlah, 0, ',', '.') }}</p>

        <form action="{{ route('penyaluran-bantuan.upload_kwitansi', $bantuan->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-4">
                <label for="kwitansi_image" class="block text-sm font-medium text-gray-700 mb-1">Upload Kwitansi</label>
                <input type="file" name="kwitansi_image" accept="image/*" class="w-full border rounded px-3 py-2">required
            </div>
            <button type="submit" class="bg-green-600 text-white px-6 py-2 rounded hover:bg-green-700">
                Upload
            </button>
        </form>
    </div>
</div>
@endsection