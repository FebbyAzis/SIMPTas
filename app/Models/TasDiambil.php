<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\JenisTas;

class TasDiambil extends Model
{
    use HasFactory;

    protected $table = 'stok_tas_ambil';

    public function jenis_tas(): BelongsTo
    {
        return $this->belongsTo(JenisTas::class);
    }
}
