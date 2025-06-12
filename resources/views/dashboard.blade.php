@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6 min-h-screen flex flex-col">
    <h1 class="text-3xl font-semibold text-gray-800 mb-6">Dashboard</h1>

<!-- Form Pencarian -->
<form method="GET" action="{{ route('dashboard') }}" class="flex flex-wrap gap-4 mb-6 items-center">
    <!-- Input Cari Nama (Lebar sama dengan filter lainnya) -->
    <div class="flex flex-col w-full sm:w-1/4">
        <input type="text" name="search" placeholder="Cari Nama" value="{{ request('search') }}"
            class="p-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-400 w-full" onchange="this.form.submit()" />
    </div>

    <!-- Filter Kelas (Lebar 5cm atau 50px) -->
    <div class="flex flex-col w-full sm:w-1/6">
        <select name="kelas" id="kelas" class="p-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-400 w-full" onchange="this.form.submit()">
            <option value="">Pilih Kelas</option>
            @for ($i = 1; $i <= 12; $i++)
                <option value="{{ $i }}" {{ request('kelas') == $i ? 'selected' : '' }}>{{ $i }}</option>
            @endfor
        </select>
    </div>

    <!-- Filter He Qi (Lebar 5cm atau 50px) -->
    @php
        $userHeQi = json_decode(auth()->user()->he_qi, true); // Ambil dan decode he_qi pengguna
    @endphp

    <div class="flex flex-col w-full sm:w-1/6">
        <select name="he_qi" id="he_qi" class="p-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-300 w-full" onchange="this.form.submit()">
            <option value="">Pilih He Qi</option>
            @foreach ($userHeQi as $heQiOption)
                <option value="{{ $heQiOption }}" {{ request('he_qi') == $heQiOption ? 'selected' : '' }}>
                    {{ $heQiOption }}
                </option>
            @endforeach
        </select>
    </div>

    <!-- Filter Sekolah -->
    <div class="flex flex-col w-full sm:w-1/4">
        <select name="sekolah" id="sekolah" class="p-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-400 w-full" onchange="this.form.submit()">
            <option value="">Pilih Sekolah</option>
            @foreach ($sekolahs as $sekolah)
                <option value="{{ $sekolah->sekolah }}" {{ request('sekolah') == $sekolah->sekolah ? 'selected' : '' }}>
                    {{ $sekolah->sekolah }}
                </option>
            @endforeach
        </select>
    </div>
</form>



    <script>
    // Fungsi untuk mereset filter jika opsi default dipilih
    function resetFilters() {
        const kelas = document.getElementById('kelas').value;
        const heQi = document.getElementById('he_qi').value;
        const sekolah = document.getElementById('sekolah').value;
        const search = document.querySelector('[name="search"]').value;

        // Reset halaman jika memilih opsi default
        if (kelas === "" && heQi === "" && sekolah === "" && search === "") {
            window.location.href = window.location.pathname; // Reload halaman tanpa parameter
        }
    }

    // Tambahkan event listeners untuk filter
    document.getElementById('kelas').addEventListener('change', resetFilters);
    document.getElementById('he_qi').addEventListener('change', resetFilters);
    document.getElementById('sekolah').addEventListener('change', resetFilters);
    document.querySelector('[name="search"]').addEventListener('input', resetFilters);
</script>

</form>

    <!-- Tabel Siswa -->
    <div class="overflow-x-auto bg-white rounded-xl shadow-md mt-6">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50 text-gray-700 uppercase text-sm font-semibold tracking-wide">
                <tr>
                    <th class="px-6 py-4 text-left">Nama</th>
                    <th class="px-6 py-4 text-left">Tanggal Lahir</th>
                    <th class="px-6 py-4 text-left">Kelas</th>
                    <th class="px-6 py-4 text-left">Sekolah</th>
                    <th class="px-6 py-4 text-left">He Qi</th>
                    <th class="px-6 py-4 text-left">Aksi</th>
                    <th class="px-6 py-4 text-left">Catatan</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200 text-gray-800">
                @foreach($siswas as $siswa)
                    <tr class="hover:bg-gray-100">
                        <td class="px-6 py-4 font-medium text-blue-600">
                            <a href="{{ route('profile.show', $siswa->id) }}" class="hover:underline">
                                {{ $siswa->nama }}
                            </a>
                        </td>
                        <td class="px-6 py-4">
                            {{ \Carbon\Carbon::parse($siswa->tanggal_lahir)->translatedFormat('d F Y') }}
                        </td>
                        <td class="px-6 py-4">{{ $siswa->kelas }}</td>
                        <td class="px-6 py-4">{{ $siswa->sekolah }}</td>
                        <td class="px-6 py-4">{{ $siswa->he_qi }}</td>
                        <td class="px-6 py-4">
                            @if(auth()->user()->role === 'superadmin' || auth()->user()->role === 'staff')
                                <div class="flex space-x-2">
                                    <a href="{{ route('siswa.edit', $siswa->id) }}"
                                        class="bg-yellow-500 hover:bg-yellow-600 text-white px-3 py-1 rounded-md text-sm font-medium shadow-sm">
                                        Edit
                                    </a>
                                    <form action="{{ route('siswa.destroy', $siswa->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded-md text-sm font-medium shadow-sm"
                                            onclick="return confirm('Yakin ingin menghapus siswa ini?')">
                                            Hapus
                                        </button>
                                    </form>
                                </div>
                            @endif
                        </td>
<td class="px-6 py-4">
        <a href="{{ route('nilai.create', $siswa->id) }}" 
           class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-md text-sm font-medium shadow-sm">
           Tambah Catatan
        </a>

</td>

                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Pagination -->
    <div class="mt-6">
        {{ $siswas->links() }}
    </div>

    <div class="bg-white rounded-xl shadow-md p-6 mt-6">
    <h2 class="text-xl font-semibold text-gray-800 mb-4">Total Data</h2>
    <p class="text-lg font-semibold">Total Siswa: {{ $totalSiswa }}</p>
</div>

<!-- Form Upload Excel dengan jarak tambahan -->
<div class="bg-white rounded-xl shadow-md p-6 mt-6"> <!-- Menambahkan mt-6 untuk margin top -->
    <h2 class="text-xl font-semibold text-gray-800 mb-4">Import Data Anak Teratai dari Excel</h2>

    <form action="{{ route('siswa.import') }}" method="POST" enctype="multipart/form-data" class="mb-6">
        @csrf
        <div class="flex items-center space-x-4">
            <!-- Input untuk file Excel -->
            <input type="file" name="excel_file" required class="border rounded px-3 py-2">
            <!-- Tombol Import -->
            <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
                Import Data Anak Teratai
            </button>
            <!-- Tombol Download Template -->
            <a href="{{ asset('storage/templates/Template_Excel.xlsx') }}" download>
                <button type="button" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                    Download Template Excel
                </button>
            </a>
        </div>
    </form>

    @if ($errors->has('file'))
        <p class="text-red-600 mt-2">{{ $errors->first('file') }}</p>
    @endif
</div>

</div>
@endsection
