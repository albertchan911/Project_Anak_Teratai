@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6 max-w-4xl space-y-10">
    <h1 class="text-3xl font-bold text-gray-800">Tambah Catatan Penilaian untuk Siswa: {{ $siswa->nama }}</h1>

    <!-- Catatan Sebelumnya -->
    @if($catatanSebelumnya->count())
    <div class="bg-white shadow rounded-lg p-6 mb-6 mt-3" >
        <h2 class="text-xl font-semibold text-gray-700 mb-4">Catatan Sebelumnya</h2>
        <div class="overflow-x-auto">
            <table class="min-w-full text-sm text-left border border-gray-200 rounded-lg overflow-hidden">
                <thead class="bg-gray-100 text-gray-700">
                    <tr>
                        <th class="px-4 py-2 border-b">Kelas</th>
                        <th class="px-4 py-2 border-b">Semester</th>
                        <th class="px-4 py-2 border-b">Nilai</th>
                        <th class="px-4 py-2 border-b">Catatan</th>
                        <th class="px-4 py-2 border-b">Tanggal</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($catatanSebelumnya as $catatan)
                    <tr class="hover:bg-gray-50">
                        <td class="px-4 py-2 border-b">{{ $catatan->kelas }}</td>
                        <td class="px-4 py-2 border-b">{{ $catatan->semester }}</td>
                        <td class="px-4 py-2 border-b">{{ number_format($catatan->nilai_rata_rata, 2) }}</td>
                        <td class="px-4 py-2 border-b">{{ $catatan->catatan }}</td>
                        <td class="px-4 py-2 border-b">{{ $catatan->created_at->format('d M Y') }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @endif

    <!-- Form Tambah Catatan -->
    <div class="bg-white shadow rounded-lg p-6 mb-6">
        <h2 class="text-xl font-semibold text-gray-700 mb-6">Detail Catatan</h2>
        <form action="{{ route('nilai.store', $siswa->id) }}" method="POST" class="space-y-6">
            @csrf

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Nilai Rata-Rata -->
                <div>
                    <label for="nilai_rata_rata" class="block text-sm font-medium text-gray-700">Nilai Rata-Rata</label>
                    <input type="number" name="nilai_rata_rata" id="nilai_rata_rata" step="0.1"
                        class="mt-2 block w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500"
                        value="{{ old('nilai_rata_rata') }}" required>
                </div>

                <!-- Semester -->
                <div>
                    <label class="block text-sm font-medium text-gray-700">Semester</label>
                    <div class="mt-3 flex gap-4">
                        <label class="inline-flex items-center">
                            <input type="radio" name="semester" value="Semester 1" class="form-radio"
                                {{ old('semester') == 'Semester 1' ? 'checked' : '' }}>
                            <span class="ml-2">Semester 1</span>
                        </label>
                        <label class="inline-flex items-center">
                            <input type="radio" name="semester" value="Semester 2" class="form-radio"
                                {{ old('semester') == 'Semester 2' ? 'checked' : '' }}>
                            <span class="ml-2">Semester 2</span>
                        </label>
                    </div>
                </div>
            </div>

            <!-- Kelas -->
            <div>
                <label for="kelas" class="block text-sm font-medium text-gray-700">Kelas</label>
                <input type="number" name="kelas" id="kelas"
                    class="mt-2 block w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500"
                    value="{{ old('kelas') }}" required>
            </div>

            <!-- Catatan -->
            <div>
                <label for="catatan" class="block text-sm font-medium text-gray-700">Catatan untuk Anak</label>
                <textarea name="catatan" id="catatan"
                    class="mt-2 block w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500">{{ old('catatan') }}</textarea>
            </div>

            <!-- Submit -->
            <div>
                <button type="submit"
                    class="w-full bg-blue-600 hover:bg-blue-700 text-white py-2 rounded-md text-sm font-medium shadow">Simpan Catatan</button>
            </div>
        </form>
    </div>

    <!-- Kembali -->
    <div>
        <a href="{{ route('dashboard') }}"
            class="inline-block bg-gray-500 text-white px-5 py-2 rounded-md hover:bg-gray-600 transition">Kembali ke
            Dashboard</a>
    </div>
</div>
@endsection
