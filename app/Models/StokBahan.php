<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\JenisBahan;

class StokBahan extends Model
{
    use HasFactory;

    protected $table = 'stok_bahan_tambah';

    public function jenis_bahan(): BelongsTo
    {
        return $this->belongsTo(JenisBahan::class, 'jenis_bahan_id');
    }
}
