<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'nama_proyek',
        'tanggal_mulai',
        'tanggal_selesai',
        'status',
        'departemen_id',
    ];

    public function departemen() {
        return $this->belongsTo(Departemen::class, 'departemen_id');
    }
}
