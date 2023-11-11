<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Order extends Model
{
    use HasFactory;

    protected $table = 'orders';

    protected $fillable =
    [
        'jumlah_pesanan',
        'customer_id',
        'kendaraan_id',
    ];

    // relationship
    public function customers(): BelongsTo
    {
        return $this->belongsTo(Customer::class);
    }

    public function kendaraans(): BelongsTo
    {
        return $this->belongsTo(Kendaraan::class);
    }
}
