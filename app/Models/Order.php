<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = 'orders';

    protected $fillable =
    [
        'isPaid',
    ];

    public function customers()
    {
        return $this->belongsTo(Customer::class);
    }

    public function kendaraans()
    {
        return $this->belongsTo(Kendaraan::class);
    }
}
