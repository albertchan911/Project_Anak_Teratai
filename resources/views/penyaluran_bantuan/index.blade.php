@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-2xl font-bold text-gray-800 mb-6">Rekap Penyaluran Bantuan</h1>

    <!-- Filter Form -->
    <form action="{{ route('penyaluran-bantuan.index') }}" method="GET" class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
        <div>
            <label for="jenis_bantuan" class="block text-sm font-medium text-gray-700 mb-1">Filter Jenis Bantuan</label>
            <select name="jenis_bantuan" id="jenis_bantuan" class="w-full border rounded-md px-3 py-2" onchange="this.form.submit()">
                <option value="">-- Pilih Jenis Bantuan --</option>
                @foreach(['SPP', 'Uang Pangkal', 'Uang Kegiatan', 'Uang Seragam', 'Semesteran', 'Lainnya'] as $jenis)
                    <option value="{{ $jenis }}" {{ request('jenis_bantuan') == $jenis ? 'selected' : '' }}>{{ $jenis }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label for="nama_siswa" class="block text-sm font-medium text-gray-700 mb-1">Filter Nama Siswa</label>
            <select name="nama_siswa" id="nama_siswa" class="w-full border rounded-md px-3 py-2" onchange="this.form.submit()">
                <option value="">-- Pilih Nama Siswa --</option>
                @foreach($siswas->sortBy('nama') as $siswa)
                    <option value="{{ $siswa->id }}" {{ request('nama_siswa') == $siswa->id ? 'selected' : '' }}>
                        {{ $siswa->nama }}
                    </option>
                @endforeach
            </select>
        </div>
    </form>

    <div class="mb-4">
        <a href="{{ route('penyaluran-bantuan.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-md shadow-sm transition">Tambah Penyaluran Bantuan</a>
    </div>

    <div class="overflow-x-auto bg-white rounded-lg shadow-md">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-100 text-gray-600 text-sm uppercase tracking-wide">
                <tr>
                    <th class="px-4 py-3 text-left">No</th>
                    <th class="px-4 py-3 text-left">Nama Siswa</th>
                    <th class="px-4 py-3 text-left">Jenis Bantuan</th>
                    <th class="px-4 py-3 text-left">Jumlah</th>
                    <th class="px-4 py-3 text-left">Tanggal</th>
                    <th class="px-4 py-3 text-left">Kwitansi</th>
                    <th class="px-4 py-3 text-left">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100 text-gray-800">
                @forelse ($bantuans as $index => $bantuan)
                    <tr class="hover:bg-gray-50">
                        <td class="px-4 py-3">{{ $loop->iteration + ($bantuans->currentPage() - 1) * $bantuans->perPage() }}</td>
                        <td class="px-4 py-3">{{ $bantuan->siswa->nama }}</td>
                        <td class="px-4 py-3">{{ $bantuan->jenis_bantuan }}</td>
                        <td class="px-4 py-3">Rp{{ number_format($bantuan->jumlah, 0, ',', '.') }}</td>
                        <td class="px-4 py-3">{{ \Carbon\Carbon::parse($bantuan->tanggal)->translatedFormat('d F Y') }}</td>
                        <td class="px-4 py-3">
                            @if($bantuan->kwitansi_image)
                                <a href="{{ asset('storage/public/kwitansi/' . $bantuan->kwitansi_image) }}" target="_blank">
                                    <img src="{{ asset('storage/public/kwitansi/' . $bantuan->kwitansi_image) }}" alt="Kwitansi" class="w-24 rounded shadow">
                                </a>
                            @else
                                <span class="text-sm text-gray-500 italic">Tidak ada</span>
                            @endif
                        </td>
                        <td class="px-4 py-3">
                            <div class="flex gap-2">
                                <a href="{{ route('penyaluran-bantuan.edit', $bantuan->id) }}" class="bg-yellow-500 hover:bg-yellow-600 text-white px-3 py-1 rounded-md text-sm">Edit</a>
                                <form action="{{ route('penyaluran-bantuan.destroy', $bantuan->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-600 hover:bg-red-700 text-white px-3 py-1 rounded-md text-sm">Hapus</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="px-4 py-6 text-center text-gray-500">Tidak ada data penyaluran bantuan.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-6">
        {{ $bantuans->links() }}
    </div>
</div>
@endsection
