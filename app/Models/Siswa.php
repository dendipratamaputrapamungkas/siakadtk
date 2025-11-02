<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    //
    use HasFactory;

    protected $table    = "siswas";
    protected $guarded  = ["id"];
    protected $fillable = [
        'nisn',
        'nama_lengkap',
        'no_kk',
        'tempatlhr',
        'tanggal_lhr',
        'jk',
        'agama',
        'kelas_id',
        'rombel_id',
        'no_indukpd',
        'tgl_masuk',
        'alamat',
        'nama_ayah',
        'nama_ibu',
        'wali',
        'no_hp',
    ];
    // App\Models\Siswa.php
public function user()
{
    return $this->belongsTo(User::class);
}

    public function kelas()
    {
        return $this->belongsTo(Kelas::class);
    }

    public function rombel()
    {
        return $this->belongsTo(Rombel::class);
    }

}
