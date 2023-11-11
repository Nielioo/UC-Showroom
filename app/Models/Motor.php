<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphOne;

// Inherit from parent class "Kendaraan"
class Motor extends Kendaraan
{
    use HasFactory;

    protected $table = 'motors';

    protected $fillable =
    [
        'kapasitas_bensin',
        'ukuran_bagasi',
    ];

    // polymorphism
    public function kendaraan(): MorphOne
    {
        return $this->morphOne(Kendaraan::class, 'jenis_kendaraan');
    }
}
