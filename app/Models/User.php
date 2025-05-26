<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable; // Gunakan alias 'Authenticatable'
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory; // Tambahkan import untuk HasFactory

class User extends Authenticatable // Pastikan User mewarisi Authenticatable
{
    use Notifiable;
    use HasFactory; // Memastikan penggunaan HasFactory untuk factory

    public function catatanAnak()
    {
        return $this->hasMany(CatatanAnak::class, 'user_id');
    }

    protected $fillable = [
        'name',
        'email',
        'password',
        'he_qi',
        'role',
    ];
    
}
