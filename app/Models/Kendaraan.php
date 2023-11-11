<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Kendaraan extends Model
{
    use HasFactory;

    protected $table = 'kendaraans';

    protected $fillable =
    [
        'model',
        'tahun',
        'jumlah_penumpang',
        'manufaktur',
        'harga',
        'jenis_kendaraan_id',
        'jenis_kendaraan_type',
    ];

    // polymorphism
    public function jenis_kendaraan(): MorphTo
    {
        return $this->morphTo('jenis_kendaraan');
    }
}
