<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\JenisMaterial;

class StokMaterial extends Model
{
    use HasFactory;

    protected $table = 'stok_material_tambah';

    public function jenis_material(): BelongsTo
    {
        return $this->belongsTo(JenisMaterial::class, 'jenis_material_id');
    }
}
