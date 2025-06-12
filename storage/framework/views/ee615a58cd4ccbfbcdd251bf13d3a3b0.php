<?php $__env->startSection('content'); ?>
<div class="container mx-auto p-6 min-h-screen">
    <h2 class="text-2xl font-bold text-gray-800 mb-6">Tambah Penyaluran Bantuan Anak Teratai</h2>

    <form action="<?php echo e(route('penyaluran-bantuan.store')); ?>" method="POST" enctype="multipart/form-data"
        class="bg-white p-6 rounded-xl shadow-md max-w-3xl">
        <?php echo csrf_field(); ?>

        <!-- Nama Anak -->
        <div class="mb-4">
            <label for="siswa_id" class="block text-sm font-medium text-gray-700 mb-1">Nama Anak</label>
            <select name="siswa_id" id="siswa_id" class="w-full border rounded-md px-3 py-2" required>
                <option value="">-- Pilih Anak --</option>
                <?php $__currentLoopData = $siswas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $siswa): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($siswa->id); ?>"><?php echo e($siswa->nama); ?> (Kelas <?php echo e($siswa->kelas); ?>)</option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>

        <!-- Input Sekolah -->
        <div class="mb-4">
            <label for="sekolah" class="block text-sm font-medium text-gray-700 mb-1">Sekolah</label>
            <input type="text" name="sekolah" id="sekolah" required class="w-full border rounded-md px-3 py-2">
        </div>

        <!-- Jenis Bantuan -->
        <div class="mb-4">
            <label for="jenis_bantuan" class="block text-sm font-medium text-gray-700 mb-1">Jenis Bantuan</label>
            <div id="jenis-bantuan-container">
                <div class="flex items-center space-x-4 mb-2">
                    <select name="jenis_bantuan[]" class="w-full border rounded-md px-3 py-2" required>
                        <option value="">-- Pilih Jenis Bantuan --</option>
                        <option value="SPP">SPP</option>
                        <option value="Uang Pangkal">Uang Pangkal</option>
                        <option value="Uang Kegiatan">Uang Kegiatan</option>
                        <option value="Uang Seragam">Uang Seragam</option>
                        <option value="Semesteran">Uang Buku</option>
                        <option value="Semesteran">Uang Ujian</option>
                        <option value="Semesteran">Semesteran</option>
                    </select>
                </div>
            </div>
            <button type="button" id="add-jenis-bantuan-button" class="bg-blue-600 text-white px-4 py-2 rounded mt-2">
                Tambah Jenis Bantuan
            </button>
        </div>

        <script>
        // Tambah Jenis Bantuan
        document.getElementById('add-jenis-bantuan-button').addEventListener('click', function() {
        // Ambil container untuk input jenis bantuan
        const jenisBantuanContainer = document.getElementById('jenis-bantuan-container');

        // Buat elemen input jenis bantuan baru
        const newJenisBantuanInput = document.createElement('div');
        newJenisBantuanInput.classList.add('flex', 'items-center', 'space-x-4', 'mb-2');

        // Buat dropdown jenis bantuan baru
        newJenisBantuanInput.innerHTML = `
            <select name="jenis_bantuan[]" class="w-full border rounded-md px-3 py-2" required>
                <option value="">-- Pilih Jenis Bantuan --</option>
                <option value="SPP">SPP</option>
                <option value="Uang Pangkal">Uang Pangkal</option>
                <option value="Uang Kegiatan">Uang Kegiatan</option>
                <option value="Uang Seragam">Uang Seragam</option>
                <option value="Semesteran">Semesteran</option>
            </select>
        `;

        // Masukkan elemen input jenis bantuan baru ke dalam container
        jenisBantuanContainer.appendChild(newJenisBantuanInput);
    });
        </script>

        <!-- Jumlah -->
        <div class="mb-4">
            <label for="jumlah" class="block text-sm font-medium text-gray-700 mb-1">Jumlah Bantuan (Rp)</label>
            <input type="number" name="jumlah" class="w-full border rounded-md px-3 py-2" required>
        </div>

        <!-- Tanggal -->
        <div class="mb-4">
            <label for="tanggal" class="block text-sm font-medium text-gray-700 mb-1">Tanggal Realisasi</label>
            <input type="date" name="tanggal" class="w-full border rounded-md px-3 py-2" required>
        </div>

<!-- Bulan Realisasi -->
<div class="mb-4">
    <label for="bulan_realisasi" class="block text-sm font-medium text-gray-700 mb-1">Bulan Realisasi</label>
    <div id="bulan-realisasi-container">
        <div class="flex items-center space-x-4 mb-2">
            <select name="bulan_realisasi[]" class="w-full border rounded-md px-3 py-2" required>
                <option value="">-- Pilih Bulan --</option>
                <?php $__currentLoopData = ['Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bulan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($bulan); ?>"><?php echo e($bulan); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>
    </div>
    <button type="button" id="add-bulan-button" class="bg-blue-600 text-white px-4 py-2 rounded mt-2">
        Tambah Bulan
    </button>
</div>

<script>
    document.getElementById('add-bulan-button').addEventListener('click', function() {
        // Ambil container untuk input bulan
        const bulanRealisasiContainer = document.getElementById('bulan-realisasi-container');

        // Buat elemen input bulan baru
        const newBulanInput = document.createElement('div');
        newBulanInput.classList.add('flex', 'items-center', 'space-x-4', 'mb-2');

        // Buat dropdown bulan baru
        newBulanInput.innerHTML = `
            <select name="bulan_realisasi[]" class="w-full border rounded-md px-3 py-2" required>
                <option value="">-- Pilih Bulan --</option>
                <?php $__currentLoopData = ['Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bulan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($bulan); ?>"><?php echo e($bulan); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        `;

        // Masukkan elemen input bulan baru ke dalam container
        bulanRealisasiContainer.appendChild(newBulanInput);
    });
</script>



        <!-- Keterangan -->
        <div class="mb-4">
            <label for="keterangan" class="block text-sm font-medium text-gray-700 mb-1">Keterangan (Opsional)</label>
            <textarea name="keterangan" rows="2" class="w-full border rounded-md px-3 py-2"></textarea>
        </div>

        <!-- Upload Bukti Pembayaran -->
        <div class="mb-6">
            <label for="bukti_pembayaran" class="block text-sm font-medium text-gray-700 mb-1">Upload Bukti Pembayaran</label>
            <input type="file" name="bukti_pembayaran" accept="image/*" class="w-full border rounded-md px-3 py-2">
        </div>

        <!-- Tombol Aksi -->
        <div class="flex justify-between">
            <a href="<?php echo e(route('penyaluran-bantuan.index')); ?>" class="bg-gray-300 text-gray-800 px-6 py-2 rounded-md hover:bg-gray-400 transition">
                Batal
            </a>
            <button type="submit" class="bg-green-600 text-white px-6 py-2 rounded-md hover:bg-green-700 transition">
                Simpan Bantuan
            </button>

            <?php if($errors->any()): ?>
    <div class="bg-red-500 text-white p-3 rounded mb-4">
        <ul>
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li><?php echo e($error); ?></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </div>
<?php endif; ?>

        </div>
    </form>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\tugas\Project_Anak_Teratai\resources\views/penyaluran_bantuan/create.blade.php ENDPATH**/ ?>