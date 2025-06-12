<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo e(config('app.name', 'Laravel')); ?></title>
    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>
<style>
    /* Sidebar Styling */
    .sidebar {
        background-color: #1E2A47; /* Dark Blue */
        box-shadow: 2px 0 10px rgba(0, 0, 0, 0.1);
        border-radius: 0 10px 10px 0;
    }
    .sidebar a {
        color: white; /* Pastikan teks warna putih */
        font-weight: 600;
    }
    .sidebar a:hover {
        background-color: #3C4A75; /* Slate Blue hover effect */
        border-radius: 5px;
    }

    /* Content Styling */
    .content-container {
        background-color: white;
        border-radius: 10px;
        box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.1);
        padding: 30px;
        margin-top: 20px;
    }

    /* Navbar Styling */
    .navbar {
        background: #1E2A47; /* Dark Blue */
    }

    /* Optional - Font Style */
    body {
        font-family: 'Poppins', sans-serif;
        background-color: #F4F9FF; /* Soft White */
        color: #333333; /* Text color for body */
    }

    /* Additional styles to ensure all text is readable */
    .sidebar p, .sidebar li, .sidebar a {
        color: white; /* Make sure all text in sidebar is white */
    }
</style>

</head>
<body class="bg-gray-100">
    <div class="flex">
        <!-- Sidebar -->
        <div class="h-screen w-64 sidebar fixed top-0 left-0 flex flex-col justify-between">
            <div>
                <div class="flex flex-col items-center p-4">
                    <!-- Logo -->
                    <img src="<?php echo e(asset('storage/logo.png')); ?>" alt="Logo Kantor" class="h-20 w-auto mb-2">
                </div>

                <!-- Nama Dashboard -->
                <div class="p-4 text-xl font-semibold text-center">
                    <?php if(auth()->guard()->check()): ?>
                        <p>Login sebagai <?php echo e(auth()->user()->name); ?></p>
                    <?php else: ?>
                        <p>Anda belum login</p>
                    <?php endif; ?>
                </div>

                <ul class="mt-4">
                    <li class="px-4 py-2 hover:bg-gray-700">
                        <a href="<?php echo e(route('dashboard')); ?>">🏠 Dashboard</a>
                    </li>
                    <?php if(auth()->guard()->check()): ?>
                        <?php if(auth()->user()->role === 'superadmin' || auth()->user()->role === 'staff'): ?>
                            <li class="px-4 py-2 hover:bg-gray-700">
                                <a href="<?php echo e(route('siswa.create')); ?>">➕ Tambah Anak Teratai</a>
                            </li>
                        <?php endif; ?>
                    <?php endif; ?>
                    <li class="px-4 py-2 hover:bg-gray-700">
                        <a href="<?php echo e(route('penyaluran-bantuan.index')); ?>"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                        <path d="M11.25 4.533A9.707 9.707 0 0 0 6 3a9.735 9.735 0 0 0-3.25.555.75.75 0 0 0-.5.707v14.25a.75.75 0 0 0 1 .707A8.237 8.237 0 0 1 6 18.75c1.995 0 3.823.707 5.25 1.886V4.533ZM12.75 20.636A8.214 8.214 0 0 1 18 18.75c.966 0 1.89.166 2.75.47a.75.75 0 0 0 1-.708V4.262a.75.75 0 0 0-.5-.707A9.735 9.735 0 0 0 18 3a9.707 9.707 0 0 0-5.25 1.533v16.103Z" />
                        </svg> Catatan Penyaluran Bantuan Anak Teratai</a>
                    </li>    
                </ul>
            </div>

            <div class="mb-4 px-4">
                <?php if(auth()->guard()->check()): ?>
                    <form method="POST" action="<?php echo e(route('logout')); ?>">
                        <?php echo csrf_field(); ?>
                        <button type="submit" class="w-full text-center px-4 py-2 bg-red-600 hover:bg-red-700 rounded text-white">🚪 Log Out</button>
                    </form>
                <?php endif; ?>
            </div>
        </div>

        <!-- Konten Utama -->
        <div class="flex-1 ml-64 p-6 min-h-screen flex flex-col">
            <?php echo $__env->yieldContent('content'); ?>
        </div>
    </div>
</body>
</html>
<?php /**PATH C:\tugas\Project_Anak_Teratai\resources\views/layouts/app.blade.php ENDPATH**/ ?>