<?php $__env->startSection('content'); ?>
<div class="container mx-auto px-4 sm:px-6 lg:px-8 py-8 space-y-6">
    <h1 class="text-3xl font-bold text-gray-900">Rekap Penyaluran Bantuan</h1>

    <!-- Form Filter -->
    <form method="GET" action="<?php echo e(route('penyaluran-bantuan.index')); ?>">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 items-end">
            <div>
                <input type="text" name="nama_siswa" placeholder="Cari Nama" value="<?php echo e(request('nama_siswa')); ?>"
                       class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring focus:ring-blue-300" />
            </div>

            <div>
                <select name="jenis_bantuan[]" id="jenis_bantuan"
                        class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring focus:ring-blue-300"
                        onchange="resetFilters()">
                    <option value="">Pilih Jenis Bantuan</option>
                    <?php $__currentLoopData = ['SPP', 'Uang Pangkal', 'Uang Kegiatan', 'Uang Seragam', 'Semesteran']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $jenisBantuanOption): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($jenisBantuanOption); ?>"
                            <?php if(in_array($jenisBantuanOption, old('jenis_bantuan', (array) request('jenis_bantuan')))): ?> selected <?php endif; ?>>
                            <?php echo e($jenisBantuanOption); ?>

                        </option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>

            <?php $userHeQi = json_decode(auth()->user()->he_qi, true); ?>
            <div>
                <select name="he_qi"
                        class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring focus:ring-blue-300"
                        onchange="resetFilters()">
                    <option value="">Pilih He Qi</option>
                    <?php $__currentLoopData = $userHeQi; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $heQiOption): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($heQiOption); ?>" <?php echo e(request('he_qi') == $heQiOption ? 'selected' : ''); ?>>
                            <?php echo e($heQiOption); ?>

                        </option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
                <input type="date" name="start_date" value="<?php echo e(request('start_date')); ?>"
                       class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring focus:ring-blue-300">
            </div>

            <div>
                <label for="end_date" class="block text-sm font-medium text-gray-700 mb-1">Tanggal Selesai</label>
                <input type="date" name="end_date" value="<?php echo e(request('end_date')); ?>"
                       class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring focus:ring-blue-300">
            </div>
        </div>
    </form>

    <div class="text-right">
        <a href="<?php echo e(route('penyaluran-bantuan.create')); ?>"
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
    <?php $__currentLoopData = $bantuans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bantuan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr class="hover:bg-gray-50 transition">
            <td class="px-4 py-3 text-center text-base text-gray-800 font-medium">
                <?php echo e($loop->iteration + ($bantuans->currentPage() - 1) * $bantuans->perPage()); ?>

            </td>
            <td class="px-4 py-3 text-base text-gray-800"><?php echo e($bantuan->siswa->nama); ?></td>

            <td class="px-4 py-3 text-base text-gray-700 ">
                <?php echo e($bantuan->sekolah); ?>

            </td>
            <td class="px-4 py-3 text-base text-gray-700">
                <?php $__currentLoopData = json_decode($bantuan->jenis_bantuan); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $jenis): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="inline-block bg-blue-100 text-blue-800 px-3 py-1 rounded text-sm font-medium mb-1">
                        <?php echo e($jenis); ?>

                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </td>
            <td class="px-4 py-3 text-base text-gray-800 text-right whitespace-nowrap">
                Rp <?php echo e(number_format($bantuan->jumlah, 0, ',', '.')); ?>

            </td>
            <td class="px-4 py-3 text-base text-gray-700 text-center">
                <?php echo e(\Carbon\Carbon::parse($bantuan->tanggal)->format('d F Y')); ?>

            </td>
            <td class="px-4 py-3 text-base text-gray-700">
                <?php $__currentLoopData = json_decode($bantuan->bulan_realisasi); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bulan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div><?php echo e(\Carbon\Carbon::parse($bulan)->format('F Y')); ?></div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </td>
            <td class="px-4 py-3 text-base text-gray-700">
                <?php echo e($bantuan->keterangan ?? 'Tidak ada keterangan'); ?>

            </td>
            <td class="px-4 py-3 text-center">
                <?php if($bantuan->bukti_pembayaran): ?>
                    <a href="<?php echo e(asset('storage/public/bukti_pembayaran/' . $bantuan->bukti_pembayaran)); ?>" download
                    class="block w-20 aspect-square bg-gray-100 rounded shadow-md overflow-hidden mx-auto">
                        <img src="<?php echo e(asset('storage/public/bukti_pembayaran/' . $bantuan->bukti_pembayaran)); ?>"
                            alt="Bukti Pembayaran" class="w-full h-full object-cover">
                    </a>
                <?php else: ?>
                    <span class="text-sm text-gray-500 block">Tidak ada bukti pembayaran</span>
                <?php endif; ?>
            </td>

            <td class="px-4 py-3 text-center">
                <?php if($bantuan->kwitansi_image): ?>
                    <a href="<?php echo e(asset('storage/public/kwitansi/' . $bantuan->kwitansi_image)); ?>" download
                    class="block w-20 aspect-square bg-gray-100 rounded shadow-md overflow-hidden mx-auto">
                        <img src="<?php echo e(asset('storage/public/kwitansi/' . $bantuan->kwitansi_image)); ?>"
                            alt="Kwitansi" class="w-full h-full object-cover">
                    </a>
                <?php else: ?>
                    <div class="space-y-2">
                        <a href="<?php echo e(route('penyaluran-bantuan.show_upload_kwitansi', $bantuan->id)); ?>"
                        class="inline-block bg-green-500 hover:bg-green-600 text-white text-sm font-semibold px-3 py-1 rounded shadow transition">
                            Upload Kwitansi
                        </a>
                    </div>
                <?php endif; ?>
            </td>

            <td class="px-4 py-3 text-center space-y-2">
                <a href="<?php echo e(route('penyaluran-bantuan.edit', $bantuan->id)); ?>"
                   class="inline-block bg-blue-600 hover:bg-blue-700 text-white text-sm font-semibold px-4 py-2 rounded shadow transition">
                    Edit
                </a>
                <form action="<?php echo e(route('penyaluran-bantuan.destroy', $bantuan->id)); ?>"
                      method="POST" class="inline-block"
                      onsubmit="return confirm('Yakin ingin menghapus data ini?');">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('DELETE'); ?>
                    <button type="submit"
                            class="bg-red-600 hover:bg-red-700 text-white text-sm font-semibold px-4 py-2 rounded shadow transition">
                        Hapus
                    </button>
                </form>
            </td>
        </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</tbody>

        </table>
    </div>

    <!-- Pagination -->
    <div class="mt-6">
        <?php echo e($bantuans->links()); ?>

    </div>

    <!-- Total Data -->
    <div class="bg-white rounded-xl shadow-md p-6 mt-6">
        <h2 class="text-xl font-semibold text-gray-800 mb-4">Total Data</h2>
        <p class="text-lg font-semibold">Total Jumlah Realisasi: <?php echo e($totalRealisasi); ?></p>
        <p class="text-lg font-semibold">Total Realisasi Nominal: Rp <?php echo e(number_format($totalNominalRealisasi, 0, ',', '.')); ?></p>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\tugas\Project_Anak_Teratai\resources\views/penyaluran_bantuan/index.blade.php ENDPATH**/ ?>