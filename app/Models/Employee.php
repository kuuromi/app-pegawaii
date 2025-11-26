<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Departemen;
use App\Models\Position;
use App\Models\Attendance;

class Employee extends Model
{
    protected $fillable = [
        'nama_lengkap',
        'email',
        'departemen_id',
        'positions_id',
        'nomor_telepon',
        'tanggal_lahir',
        'alamat',
        'tanggal_masuk',
        'status',
        
    ];

    public function attendances()
    {
        return $this->hasMany(Attendance::class, 'karyawan_id');
    }

    public function departemen() {
    return $this->belongsTo(Departemen::class, 'departemen_id');
    }

    public function position() {
        return $this->belongsTo(Position::class, 'positions_id');
    }
}
