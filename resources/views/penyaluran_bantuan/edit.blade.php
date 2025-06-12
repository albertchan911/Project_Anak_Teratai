@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6 min-h-screen">
    <h2 class="text-2xl font-bold text-gray-800 mb-6">Edit Penyaluran Bantuan</h2>

    <form action="{{ route('penyaluran-bantuan.update', $bantuan->id) }}" method="POST" enctype="multipart/form-data" class="bg-white p-6 rounded-xl shadow-md max-w-3xl">
        @csrf
        @method('PUT')

    <!-- Nama Anak -->
    <div class="mb-4">
        <label for="siswa_id" class="block text-sm font-medium text-gray-700 mb-1">Nama Anak</label>
        <input type="text" name="nama_anak" value="{{ $bantuan->siswa->nama }}" class="w-full border rounded-md px-3 py-2" readonly>

        <!-- Input Hidden untuk siswa_id -->
        <input type="hidden" name="siswa_id" value="{{ $bantuan->siswa_id }}">
    </div>

    <!-- Input Sekolah -->
    <div class="mb-4">
        <label for="sekolah" class="block text-sm font-medium text-gray-700 mb-1">Sekolah</label>
        <input type="text" name="sekolah" id="sekolah" value="{{ $bantuan->sekolah }}" required class="w-full border rounded-md px-3 py-2">
    </div>

<!-- Jenis Bantuan -->
<div class="mb-4">
    <label for="jenis_bantuan" class="block text-sm font-medium text-gray-700 mb-1">Jenis Bantuan</label>
    <div id="jenis-bantuan-container">
        @foreach(json_decode($bantuan->jenis_bantuan) as $index => $jenis)
        <div class="flex items-center space-x-4 mb-2" id="jenis-bantuan-{{ $index }}" style="display: flex; align-items: center;">
            <select name="jenis_bantuan[]" class="w-1/5 border rounded-md px-3 py-2" required>
                <option value="{{ $jenis }}" selected>{{ $jenis }}</option>
                @foreach(['SPP', 'Uang Pangkal', 'Uang Kegiatan', 'Uang Seragam', 'Semesteran'] as $jenisOption)
                    <option value="{{ $jenisOption }}" 
                        {{ in_array($jenisOption, json_decode($bantuan->jenis_bantuan)) ? 'disabled' : '' }}>
                        {{ $jenisOption }}
                    </option>
                @endforeach
            </select>
            <button type="button" class="bg-red-600 text-white px-4 py-2 rounded" onclick="removeJenisBantuan({{ $index }})">Hapus</button>
        </div>
        @endforeach
    </div>
    <button type="button" id="add-jenis-bantuan-button" class="bg-blue-600 text-white px-4 py-2 rounded mt-2" onclick="addJenisBantuan()">
        Tambah Jenis Bantuan
    </button>
</div>

<script>
    const jenisSelected = @json(json_decode($bantuan->jenis_bantuan)); // Ambil jenis bantuan yang sudah dipilih
    const jenisOptions = ['SPP', 'Uang Pangkal', 'Uang Kegiatan', 'Uang Seragam', 'Semesteran'];
    
    let jenisCount = jenisSelected.length;

    function addJenisBantuan() {
        jenisCount++;
        const container = document.getElementById('jenis-bantuan-container');
        const newJenis = document.createElement('div');
        newJenis.classList.add('flex', 'items-center', 'space-x-4', 'mb-2');
        newJenis.id = 'jenis-bantuan-' + jenisCount;

        // Get already selected jenis
        const selectedJenis = Array.from(document.querySelectorAll('select[name="jenis_bantuan[]"]')).map(select => select.value);

        // Filter out the selected jenis from options
        const availableJenis = jenisOptions.filter(jenis => !selectedJenis.includes(jenis));

        newJenis.innerHTML = `
            <select name="jenis_bantuan[]" class="w-1/5 border rounded-md px-3 py-2" required>
                <option value="">Pilih Jenis Bantuan</option>
                ${availableJenis.map(jenis => `
                    <option value="${jenis}">
                        ${jenis}
                    </option>
                `).join('')}
            </select>
            <button type="button" class="bg-red-600 text-white px-4 py-2 rounded" onclick="removeJenisBantuan(${jenisCount})">Hapus</button>
        `;

        container.appendChild(newJenis);
    }

    function removeJenisBantuan(index) {
        const jenisDiv = document.getElementById('jenis-bantuan-' + index);
        jenisDiv.remove();
    }
</script>


    <!-- Jumlah -->
    <div class="mb-4">
        <label for="jumlah" class="block text-sm font-medium text-gray-700 mb-1">Jumlah Bantuan (Rp)</label>
        <input type="number" name="jumlah" value="{{ $bantuan->jumlah }}" class="w-full border rounded-md px-3 py-2" required>
    </div>

    <!-- Tanggal -->
    <div class="mb-4">
        <label for="tanggal" class="block text-sm font-medium text-gray-700 mb-1">Tanggal Realisasi</label>
        <input type="date" name="tanggal" value="{{ $bantuan->tanggal }}" class="w-full border rounded-md px-3 py-2" required>
    </div>

    <!-- Bulan Realisasi -->
    <div class="mb-4">
        <label for="bulan_realisasi" class="block text-sm font-medium text-gray-700 mb-1">Bulan Realisasi</label>
        <div id="bulan-realisasi-container">
            @foreach($bulanSelected as $index => $bulan)
            <div class="flex items-center space-x-4 mb-2" id="bulan-realisasi-{{ $index }}" style="display: flex; align-items: center;">
                <select name="bulan_realisasi[]" class="w-1/5 border rounded-md px-3 py-2" required>
                    <option value="{{ \Carbon\Carbon::parse($bulan)->format('Y-m') }}" selected>
                        {{ \Carbon\Carbon::parse($bulan)->format('F Y') }}
                    </option>
                    @foreach(['2025-01', '2025-02', '2025-03', '2025-04', '2025-05', '2025-06', '2025-07', '2025-08', '2025-09', '2025-10', '2025-11', '2025-12'] as $bulanOption)
                        <option value="{{ $bulanOption }}"
                            {{ in_array($bulanOption, $bulanSelected) ? 'disabled' : '' }}>{{ \Carbon\Carbon::parse($bulanOption)->format('F Y') }}</option>
                    @endforeach
                </select>
                <button type="button" class="bg-red-600 text-white px-4 py-2 rounded" onclick="removeBulan({{ $index }})">Hapus</button>
            </div>
            @endforeach
        </div>
        <button type="button" id="add-bulan-button" class="bg-blue-600 text-white px-4 py-2 rounded mt-2" onclick="addBulan()">
            Tambah Bulan
        </button>
    </div>

    <!-- Script untuk menambahkan dan menghapus bulan -->
    <script>
        const bulanSelected = @json($bulanSelected);
        let bulanCount = bulanSelected.length;

        const bulanOptions = [
            '2025-01', '2025-02', '2025-03', '2025-04', '2025-05', '2025-06', 
            '2025-07', '2025-08', '2025-09', '2025-10', '2025-11', '2025-12'
        ];

        function addBulan() {
            bulanCount++;
            const container = document.getElementById('bulan-realisasi-container');
            const newBulan = document.createElement('div');
            newBulan.classList.add('flex', 'items-center', 'space-x-4', 'mb-2');
            newBulan.id = 'bulan-realisasi-' + bulanCount;

            const availableMonths = bulanOptions.filter(bulan => !bulanSelected.includes(bulan));

            newBulan.innerHTML = `
                <select name="bulan_realisasi[]" class="w-1/5 border rounded-md px-3 py-2" required>
                    <option value="">Pilih Bulan</option>
                    ${availableMonths.map(month => `
                        <option value="${month}">
                            ${new Date(month).toLocaleString('default', { month: 'long', year: 'numeric' })}
                        </option>
                    `).join('')}
                </select>
                <button type="button" class="bg-red-600 text-white px-4 py-2 rounded" onclick="removeBulan(${bulanCount})">Hapus</button>
            `;

            container.appendChild(newBulan);
        }

        function removeBulan(index) {
            const bulanDiv = document.getElementById('bulan-realisasi-' + index);
            bulanDiv.remove();
        }
    </script>

    <!-- Input Keterangan -->
    <div class="mb-4">
        <label for="keterangan" class="block text-sm font-medium text-gray-700 mb-1">Keterangan</label>
        <input type="textbox" name="keterangan" id="keterangan" value="{{ $bantuan->keterangan }}" required class="w-full border rounded-md px-3 py-2">
    </div>

    <!-- Bukti Pembayaran -->
    <div class="mb-4">
        <input type="file" name="bukti_pembayaran" id="bukti_pembayaran" class="w-full border rounded-md px-3 py-2">
        @if($bantuan->bukti_pembayaran)
            <div class="mt-2">
                <p>Preview Bukti Pembayaran:</p>
                <img src="{{ asset('storage/public/bukti_pembayaran/' . $bantuan->bukti_pembayaran) }}" alt="Preview Bukti Pembayaran" class="max-w-xs">
            </div>
        @endif
    </div>

    <!-- Kwitansi -->
    <div class="mb-4">
        <input type="file" name="kwitansi_image" id="kwitansi_image" class="w-full border rounded-md px-3 py-2">
        @if($bantuan->kwitansi_image)
            <div class="mt-2">
                <p>Preview Kwitansi:</p>
                <img src="{{ asset('storage/public/kwitansi/' . $bantuan->kwitansi_image) }}" alt="Preview Kwitansi" class="max-w-xs">
            </div>
        @endif
    </div>

    <button type="submit" class="bg-green-600 text-white px-6 py-2 rounded-md hover:bg-green-700 transition">Update Bantuan</button>
</form>

@if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

</div>
@endsection
