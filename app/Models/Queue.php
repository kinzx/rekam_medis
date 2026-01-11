<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Queue extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    // 1. Relasi ke User (Pasien)
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // 2. Relasi ke Dokter (User dengan role dokter)
    // Controller memanggil with('doctor'), jadi fungsi ini HARUS ADA.
    public function doctor()
    {
        return $this->belongsTo(User::class, 'doctor_id');
    }

    // 3. Relasi ke Poli
    // Controller memanggil with('poli'), jadi fungsi ini HARUS ADA.
    public function medicines()
{
    return $this->belongsToMany(Medicine::class, 'medicine_queue')
                ->withPivot('instruction')
                ->withTimestamps();
}
    
}
