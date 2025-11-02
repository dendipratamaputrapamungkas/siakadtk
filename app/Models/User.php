<?php
namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class User extends Authenticatable
{
    use Notifiable, HasFactory; // ⬅️ ini penting

    protected $fillable = [
        'username', 'password', 'role', 'guru_id', 'siswa_id',
    ];

    protected $hidden = ['password'];

    public function guru()
    {
        return $this->belongsTo(Guru::class);
    }

    public function siswa()
    {
        return $this->hasOne(Siswa::class);
    }

    public function isAdmin() { return $this->role === 'admin'; }
    public function isGuru() { return $this->role === 'guru'; }
    public function isOrtu() { return $this->role === 'ortu'; }
}
