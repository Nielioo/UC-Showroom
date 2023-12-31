<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Customer extends Model
{
    use HasFactory;

    protected $table = 'customers';

    protected $fillable =
    [
        'nama',
        'id_card',
        'alamat',
        'no_telepon',
    ];

    //relationship
    // public function users(): BelongsTo
    // {
    //     return $this->belongsTo(User::class);
    // }

    public function orders(): HasMany
    {
        return $this->hasMany(Order::class);
    }
}
