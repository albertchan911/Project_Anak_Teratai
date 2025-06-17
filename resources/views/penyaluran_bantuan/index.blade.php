@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 sm:px-6 lg:px-8 py-8 space-y-6">
    <h1 class="text-3xl font-bold text-gray-900">Rekap Penyaluran Bantuan</h1>

    <!-- Form Filter -->
    <form method="GET" action="{{ route('penyaluran-bantuan.index') }}">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 items-end">
            <div>
                <input type="text" name="nama_siswa" placeholder="Cari Nama" value="{{ request('nama_siswa') }}"
                       class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring focus:ring-blue-300" />
            </div>

            <div>
                <select name="jenis_bantuan[]" id="jenis_bantuan"
                        class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring focus:ring-blue-300"
                        onchange="resetFilters()">
                    <option value="">Pilih Jenis Bantuan</option>
                    @foreach(['SPP', 'Uang Pangkal', 'Uang Seragam', 'Uang Buku', 'Uang Ujian', 'Uang Buku', 'Semesteran'] as $jenisBantuanOption)
                        <option value="{{ $jenisBantuanOption }}"
                            @if(in_array($jenisBantuanOption, old('jenis_bantuan', (array) request('jenis_bantuan')))) selected @endif>
                            {{ $jenisBantuanOption }}
                        </option>
                    @endforeach
                </select>
            </div>

            @php $userHeQi = json_decode(auth()->user()->he_qi, true); @endphp
            <div>
                <select name="he_qi"
                        class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring focus:ring-blue-300"
                        onchange="resetFilters()">
                    <option value="">Pilih He Qi</option>
                    @foreach ($userHeQi as $heQiOption)
                        <option value="{{ $heQiOption }}" {{ request('he_qi') == $heQiOption ? 'selected' : '' }}>
                            {{ $heQiOption }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="flex justify-end sm:justify-start">
                <button type="submit"
                        class="w-full sm:w-auto bg-blue-600 hover:bg-blue-700 text-white font-semibold px-4 py-2 rounded-md shadow transition duration-300">
                    Cari
                </button>
            </div>

            <div>
                <label for="start_date" class="block text-sm font-medium text-gray-700 mb-1">Tanggal Mulai</label>
                <input type="date" name="start_date" value="{{ request('start_date') }}"
                       class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring focus:ring-blue-300">
            </div>

            <div>
                <label for="end_date" class="block text-sm font-medium text-gray-700 mb-1">Tanggal Selesai</label>
                <input type="date" name="end_date" value="{{ request('end_date') }}"
                       class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring focus:ring-blue-300">
            </div>
        </div>
    </form>

    <div class="text-right">
        <a href="{{ route('penyaluran-bantuan.create') }}"
           class="inline-block bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-md shadow transition">
            Tambah Penyaluran Bantuan
        </a>
    </div>

    <div class="overflow-x-auto bg-white rounded-lg shadow-md">
        <table class="min-w-full table-fixed divide-y divide-gray-200">
            <thead class="bg-gray-100 text-gray-600 text-sm uppercase tracking-wide">
                <tr>
                    <th class="px-4 py-3 w-[5%] text-center">No</th>
                    <th class="px-4 py-3 w-[15%] text-left">Nama Siswa</th>
                    <th class="px-4 py-3 w-[15%] text-left">Sekolah</th>
                    <th class="px-4 py-3 w-[15%] text-left">Jenis Bantuan</th>
                    <th class="px-4 py-3 w-[10%] text-right">Jumlah</th>
                    <th class="px-4 py-3 w-[15%] text-center">Tanggal</th>
                    <th class="px-4 py-3 w-[15%] text-left">Bulan Realisasi</th>
                    <th class="px-4 py-3 w-[15%] text-left">Keterangan</th>
                    <th class="px-4 py-3 w-[15%] text-center">Bukti Pembayaran</th>
                    <th class="px-4 py-3 w-[15%] text-center">Kwitansi</th>
                    <th class="px-4 py-3 w-[10%] text-center">Aksi</th>
                </tr>
            </thead>
<tbody class="divide-y divide-gray-100">
    @foreach($bantuans as $bantuan)
        <tr class="hover:bg-gray-50 transition">
            <td class="px-4 py-3 text-center text-base text-gray-800 font-medium">
                {{ $loop->iteration + ($bantuans->currentPage() - 1) * $bantuans->perPage() }}
            </td>
            <td class="px-4 py-3 text-base text-gray-800">{{ $bantuan->siswa->nama }}</td>

            <td class="px-4 py-3 text-base text-gray-700 ">
                {{ $bantuan->sekolah }}
            </td>
            <td class="px-4 py-3 text-base text-gray-700">
                @foreach (json_decode($bantuan->jenis_bantuan) as $jenis)
                    <div class="inline-block bg-blue-100 text-blue-800 px-3 py-1 rounded text-sm font-medium mb-1">
                        {{ $jenis }}
                    </div>
                @endforeach
            </td>
            <td class="px-4 py-3 text-base text-gray-800 text-right whitespace-nowrap">
                Rp {{ number_format($bantuan->jumlah, 0, ',', '.') }}
            </td>
            <td class="px-4 py-3 text-base text-gray-700 text-center">
                {{ \Carbon\Carbon::parse($bantuan->tanggal)->format('d F Y') }}
            </td>
            <td class="px-4 py-3 text-base text-gray-700">
                @foreach (json_decode($bantuan->bulan_realisasi) as $bulan)
                    <div>{{ \Carbon\Carbon::parse($bulan)->format('F Y') }}</div>
                @endforeach
            </td>
            <td class="px-4 py-3 text-base text-gray-700">
                {{ $bantuan->keterangan ?? 'Tidak ada keterangan' }}
            </td>
            <td class="px-4 py-3 text-center">
                @if($bantuan->bukti_pembayaran)
                    <a href="{{ asset('storage/public/bukti_pembayaran/' . $bantuan->bukti_pembayaran) }}" download
                    class="block w-20 aspect-square bg-gray-100 rounded shadow-md overflow-hidden mx-auto">
                        <img src="{{ asset('storage/public/bukti_pembayaran/' . $bantuan->bukti_pembayaran) }}"
                            alt="Bukti Pembayaran" class="w-full h-full object-cover">
                    </a>
                @else
                    <span class="text-sm text-gray-500 block">Tidak ada bukti pembayaran</span>
                @endif
            </td>

            <td class="px-4 py-3 text-center">
                @if($bantuan->kwitansi_image)
                    <a href="{{ asset('storage/public/kwitansi/' . $bantuan->kwitansi_image) }}" download
                    class="block w-20 aspect-square bg-gray-100 rounded shadow-md overflow-hidden mx-auto">
                        <img src="{{ asset('storage/public/kwitansi/' . $bantuan->kwitansi_image) }}"
                            alt="Kwitansi" class="w-full h-full object-cover">
                    </a>
                @else
                    <div class="space-y-2">
                        <a href="{{ route('penyaluran-bantuan.show_upload_kwitansi', $bantuan->id) }}"
                        class="inline-block bg-green-500 hover:bg-green-600 text-white text-sm font-semibold px-3 py-1 rounded shadow transition">
                            Upload Kwitansi
                        </a>
                    </div>
                @endif
            </td>

            <td class="px-4 py-3 text-center space-y-2">
                <a href="{{ route('penyaluran-bantuan.edit', $bantuan->id) }}"
                   class="inline-block bg-blue-600 hover:bg-blue-700 text-white text-sm font-semibold px-4 py-2 rounded shadow transition">
                    Edit
                </a>
                <form action="{{ route('penyaluran-bantuan.destroy', $bantuan->id) }}"
                      method="POST" class="inline-block"
                      onsubmit="return confirm('Yakin ingin menghapus data ini?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                            class="bg-red-600 hover:bg-red-700 text-white text-sm font-semibold px-4 py-2 rounded shadow transition">
                        Hapus
                    </button>
                </form>
            </td>
        </tr>
    @endforeach
</tbody>

        </table>
    </div>

    <!-- Pagination -->
    <div class="mt-6">
        {{ $bantuans->links() }}
    </div>

    <!-- Total Data -->
    <div class="bg-white rounded-xl shadow-md p-6 mt-6">
        <h2 class="text-xl font-semibold text-gray-800 mb-4">Total Data</h2>
        <p class="text-lg font-semibold">Total Jumlah Realisasi: {{ $totalRealisasi }}</p>
        <p class="text-lg font-semibold">Total Realisasi Nominal: Rp {{ number_format($totalNominalRealisasi, 0, ',', '.') }}</p>
    </div>
</div>
@endsection