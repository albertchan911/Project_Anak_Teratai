@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6 max-w-4xl">
    <h1 class="text-3xl font-bold text-gray-800 mb-6">Profil Anak Teratai: {{ $siswa->nama }}</h1>

    <!-- Data Siswa -->
    <div class="bg-white shadow rounded-lg p-6 mb-8">
        <h2 class="text-xl font-semibold text-gray-700 mb-4">Data Siswa</h2>
        <div class="space-y-2 text-gray-700">
            <p><strong>Nama:</strong> {{ $siswa->nama }}</p>
            <p><strong>Tanggal Lahir:</strong> {{ \Carbon\Carbon::parse($siswa->tanggal_lahir)->translatedFormat('d F Y') }}</p>
            <p><strong>Kelas:</strong> {{ $siswa->kelas }}</p>
            <p><strong>He Qi:</strong> {{ $siswa->he_qi }}</p>
        </div>
    </div>

    <!-- Catatan Perkembangan Anak -->
    <div class="bg-white shadow rounded-lg p-6">
        <h2 class="text-xl font-semibold text-gray-700 mb-4">Catatan Perkembangan Anak</h2>

        @if($catatan && $catatan->isNotEmpty())
            <ul class="space-y-4">
                @foreach($catatan as $cat)
                    <li class="border border-gray-200 rounded-md p-4 bg-gray-50">
                        <div class="flex justify-between items-center">
                            <div>
                                <p class="text-gray-800"><strong>{{ \Carbon\Carbon::parse($cat->tanggal_catatan)->translatedFormat('d F Y') }}:</strong> {{ $cat->isi_catatan }}</p>
                                <p class="text-sm text-gray-500">Dicatat oleh: {{ $cat->user->name }}</p>
                            </div>

                            @if(in_array(Auth::user()->role, ['superadmin', 'staff']))
                                <div class="flex gap-2">
                                    <a href="{{ route('catatan-anak.edit', [$cat->siswa_id, $cat->id]) }}"
                                       class="bg-yellow-500 text-white px-3 py-1 rounded hover:bg-yellow-600 text-sm">
                                        Edit
                                    </a>
                                    <form action="{{ route('catatan-anak.destroy', [$cat->siswa_id, $cat->id]) }}"
                                          method="POST" onsubmit="return confirm('Yakin ingin menghapus catatan ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                                class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600 text-sm">
                                            Hapus
                                        </button>
                                    </form>
                                </div>
                            @endif
                        </div>
                    </li>
                @endforeach
            </ul>
        @else
            <p class="text-gray-600 italic">Belum ada catatan perkembangan yang tercatat.</p>
        @endif
    </div>

    <!-- Kembali -->
    <div class="mt-6">
        <a href="{{ route('dashboard') }}"
           class="inline-block bg-gray-500 text-white px-5 py-2 rounded-md hover:bg-gray-600 transition">
            Kembali ke Dashboard
        </a>
    </div>
</div>
@endsection
