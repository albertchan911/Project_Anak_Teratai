<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Siswa;

class CheckHeQiAccess
{
    public function handle(Request $request, Closure $next)
    {
        $user = auth()->user();

        // Ambil ID siswa dari URL (route) atau input
        $siswaId = $request->route('siswa') ?? $request->input('siswa_id');

        $siswa = Siswa::find($siswaId);

        // Jika siswa ada, dan he_qi user tidak sama, serta bukan superadmin
        if ($siswa && $user->he_qi !== $siswa->he_qi && !$user->hasRole('superadmin')) {
            abort(403, 'Anda tidak memiliki akses ke anak ini.');
        }

        return $next($request);
    }
}
