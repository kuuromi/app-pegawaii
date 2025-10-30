<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Department;
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

    public function department() {
    return $this->belongsTo(Department::class, 'departemen_id');
    }

    public function position() {
        return $this->belongsTo(Position::class, 'positions_id');
    }
}
