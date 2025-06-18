@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6 min-h-screen">
    <h1 class="text-3xl font-semibold text-gray-800 mb-6">Laporan Penyaluran Bantuan</h1>

    <!-- Form Filter -->
    <form method="GET" action="{{ route('penyaluran-bantuan.report') }}" class="mb-6">
        <div class="flex flex-wrap gap-4 items-center">
            <!-- Filter He Qi -->
            <div class="flex flex-col w-full sm:w-1/4">
                <select name="he_qi" class="p-2 rounded-lg border border-gray-300 w-full">
                    <option value="">Pilih He Qi</option>
                    @foreach($he_qis as $heQiOption)
                        <option value="{{ $heQiOption }}" {{ request('he_qi') == $heQiOption ? 'selected' : '' }}>
                            {{ $heQiOption }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Filter Jenis Bantuan -->
            <div class="flex flex-col w-full sm:w-1/4">
                <select name="jenis_bantuan" class="p-2 rounded-lg border border-gray-300 w-full">
                        <option value="">Pilih Jenis Bantuan</option>
                        <option value="SPP">SPP</option>
                        <option value="Uang Pangkal">Uang Pangkal</option>
                        <option value="Uang Seragam">Uang Seragam</option>
                        <option value="Uang Buku">Uang Buku</option>
                        <option value="Uang Ujian">Uang Ujian</option>
                        <option value="Uang Buku">Uang Buku</option>
                        <option value="Semesteran">Semesteran</option>
                </select>
            </div>

            <!-- Filter Tanggal -->
            <div class="flex flex-col w-full sm:w-1/4">
                <input type="date" name="start_date" value="{{ request('start_date') }}" class="p-2 rounded-lg border border-gray-300 w-full">
            </div>

            <div class="flex flex-col w-full sm:w-1/4">
                <input type="date" name="end_date" value="{{ request('end_date') }}" class="p-2 rounded-lg border border-gray-300 w-full">
            </div>

            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 mt-4">
                Filter
            </button>
        </div>
    </form>

    <!-- Tabel Laporan -->
    <div class="overflow-x-auto bg-white rounded-xl shadow-md">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50 text-gray-700 uppercase text-sm font-semibold">
                <tr>
                    <th class="px-6 py-4 text-left">No</th>
                    <th class="px-6 py-4 text-left">Nama Siswa</th>
                    <th class="px-6 py-4 text-left">Sekolah</th>
                    <th class="px-6 py-4 text-left">Jenis Bantuan</th>
                    <th class="px-6 py-4 text-left">Jumlah</th>
                    <th class="px-6 py-4 text-left">Tanggal</th>
                    <th class="px-6 py-4 text-left">Bulan Realisasi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @foreach ($bantuans as $index => $bantuan)
                    <tr>
                        <td class="px-6 py-4">{{ $index + 1 }}</td>
                        <td class="px-6 py-4">{{ $bantuan->siswa->nama }}</td>
                        <td class="px-6 py-4">{{ $bantuan->sekolah }}</td>
                        <td class="px-6 py-4">{{ implode(', ', json_decode($bantuan->jenis_bantuan)) }}</td>
                        <td class="px-6 py-4">{{ $bantuan->jumlah }}</td>
                        <td class="px-6 py-4">{{ \Carbon\Carbon::parse($bantuan->tanggal)->format('d F Y') }}</td>
                        <td class="px-6 py-4">{{ implode(', ', json_decode($bantuan->bulan_realisasi)) }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
            <!-- Tombol untuk Ekspor ke Excel -->
<form action="{{ route('penyaluran-bantuan.exportReport') }}" method="GET" class="mt-4">
    <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
        Export Laporan ke Excel
    </button>
</form>
</div>
@endsection

