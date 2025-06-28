@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6 max-w-4xl">
    <h1 class="text-3xl font-bold text-gray-800 mb-6">Profil Anak Teratai: {{ $siswa->nama }}</h1>

<!-- Data Siswa -->
<div class="bg-white shadow rounded-lg p-6 mb-8">
    <h2 class="text-xl font-semibold text-gray-700 mb-4">Data Siswa</h2>
    <div class="flex items-start justify-start space-x-6"> <!-- Flexbox untuk sejajarkan nama dan foto -->
        <!-- Kolom kiri untuk data siswa -->
        <div class="text-gray-700 w-2/3">
            <div class="grid grid-cols-2 gap-2 mb-2">
                <p><strong>Nama </strong></p><p>: {{ $siswa->nama }}</p>
            </div>
            <div class="grid grid-cols-2 gap-2 mb-2">
                <p><strong>Tanggal Lahir </strong></p><p>: {{ \Carbon\Carbon::parse($siswa->tanggal_lahir)->translatedFormat('d F Y') }}</p>
            </div>
            <div class="grid grid-cols-2 gap-2 mb-2">
                <p><strong>Sekolah </strong></p><p>: {{ $siswa->sekolah }}</p>
            </div>
            <div class="grid grid-cols-2 gap-2 mb-2">
                <p><strong>Kelas </strong></p><p>: {{ $siswa->kelas }}</p>
            </div>
            <div class="grid grid-cols-2 gap-2 mb-2">
                <p><strong>He Qi </strong></p><p>: {{ $siswa->he_qi }}</p>
            </div>

            @if ($siswa->tanggal_dibantu)
                <div class="grid grid-cols-2 gap-2 mb-2">
                    <p><strong>Tanggal Dibantu </strong></p><p>: {{ \Carbon\Carbon::parse($siswa->tanggal_dibantu)->translatedFormat('d F Y') }}</p>
                </div>
            @else
                <div class="grid grid-cols-2 gap-2 mb-2">
                    <p><strong>Tanggal Dibantu </strong></p><p>Tanggal bantuan tidak tersedia.</p>
                </div>
            @endif
        </div>

        <!-- Kolom kanan untuk foto siswa -->
        <div class="w-1/3">
            <img src="{{ asset('storage/' . $siswa->foto_siswa) }}" alt="Foto Siswa"
                 class="max-w-[150px] h-auto rounded-lg border border-gray-300">
        </div>
    </div>
</div>



    <!-- Tabel Rekap Pembayaran per Anak -->
<div class="mb-6 bg-white shadow rounded-lg p-6">
    <h3 class="text-lg font-semibold text-gray-700 mb-4">Rekap Pembayaran per Anak</h3>
    <table class="min-w-full bg-white border border-gray-200 rounded-md shadow-md">
        <thead>
            <tr class="bg-gray-100">
                <th class="py-3 px-4 text-left border-b text-sm font-medium w-[60px]">No</th>
                <th class="py-3 px-4 text-left border-b text-sm font-medium w-[180px]">Kelas</th>
                <th class="py-3 px-4 text-left border-b text-sm font-medium w-[180px]">Jenis Bantuan</th>
                <th class="py-3 px-4 text-left border-b text-sm font-medium w-[150px]">Jumlah</th>
                <th class="py-3 px-4 text-left border-b text-sm font-medium w-[200px]">Tanggal</th>
                <th class="py-3 px-4 text-left border-b text-sm font-medium w-[200px]">Bulan Realisasi</th>
                <th class="py-3 px-4 text-left border-b text-sm font-medium">Bukti Pembayaran</th>
                <th class="py-3 px-4 text-left border-b text-sm font-medium">Kwitansi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($penyaluranBantuan as $index => $bantuan)
                <tr class="text-sm">
                    <td class="py-3 px-4 border-b">{{ $index + 1 }}</td>
                    <td class="py-3 px-4 border-b">{{ $bantuan->kelas }}</td>
                    <td class="py-3 px-4 border-b">
                        @if($bantuan->jenis_bantuan)
                            @foreach (json_decode($bantuan->jenis_bantuan) as $jenis)
                                <span class="inline-block bg-blue-100 text-blue-800 text-xs font-semibold px-2 py-1 rounded mr-1 mb-1">
                                    {{ $jenis }}
                                </span>
                            @endforeach
                        @else
                            <span class="text-sm text-gray-500">-</span>
                        @endif
                    </td>

                    <td class="py-3 px-4 border-b">Rp. {{ number_format($bantuan->jumlah, 0, ',', '.') }}</td>
                    <td class="py-3 px-4 border-b">{{ \Carbon\Carbon::parse($bantuan->tanggal)->format('d F Y') }}</td>
                    <td class="py-3 px-4 border-b">
                        @foreach(json_decode($bantuan->bulan_realisasi) as $bulan)
                            <span class="inline-block">{{ \Carbon\Carbon::parse($bulan)->format('F Y') }}</span>
                        @endforeach
                    </td>
                    <td class="py-3 px-4 border-b">
                        @if($bantuan->bukti_pembayaran)
                            <a href="{{ asset('storage/public/bukti_pembayaran/' . $bantuan->bukti_pembayaran) }}" target="_blank">
                                <img src="{{ asset('storage/public/bukti_pembayaran/' . $bantuan->bukti_pembayaran) }}" alt="Bukti Pembayaran" class="w-24 rounded shadow">
                            </a>
                        @else
                            <span class="text-gray-500">Tidak ada bukti</span>
                        @endif
                    </td>
                    <td class="py-3 px-4 border-b">
                        @if($bantuan->kwitansi_image)
                            <a href="{{ asset('storage/public/kwitansi/' . $bantuan->kwitansi_image) }}" target="_blank">
                                <img src="{{ asset('storage/public/kwitansi/' . $bantuan->kwitansi_image) }}" alt="Bukti Pembayaran" class="w-24 rounded shadow">
                            </a>
                        @else
                            <span class="text-gray-500">Tidak ada kwitansi</span>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

<!-- Tabel Catatan Siswa -->
<div class="mb-6 bg-white shadow rounded-lg p-6">
    <h3 class="text-lg font-semibold text-gray-700 mb-4">Catatan Siswa</h3>
    <table class="min-w-full bg-white border border-gray-200 rounded-md shadow-md">
        <thead>
            <tr class="bg-gray-100">

                <th class="py-3 px-4 text-left border-b text-sm font-medium w-[60px]">Kelas</th>
                <th class="py-3 px-4 text-left border-b text-sm font-medium w-[180px]">Semester</th>
                <th class="py-3 px-4 text-left border-b text-sm font-medium w-[150px]">Nilai Rata-Rata</th>
                <th class="py-3 px-4 text-left border-b text-sm font-medium">Catatan</th>
            </tr>
        </thead>
        <tbody>
            @foreach($siswa->nilais as $index => $nilai) <!-- Relasi ke tabel Nilai -->
                <tr class="text-sm">
                    <td class="py-3 px-4 border-b">{{ $nilai->kelas }}</td>
                    <td class="py-3 px-4 border-b">{{ $nilai->semester }}</td>
                    <td class="py-3 px-4 border-b">{{ number_format($nilai->nilai_rata_rata, 2, ',', '.') }}</td>
                    <td class="py-3 px-4 border-b">{{ $nilai->catatan }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
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
