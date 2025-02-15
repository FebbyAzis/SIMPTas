<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\StokMaterial;
use App\Models\MaterialDiambil;
class JenisMaterial extends Model
{
    use HasFactory;

    protected $table = 'jenis_material';

    public function stok_material_tambah(): HasMany
    {
        return $this->hasMany(StokMaterial::class, 'jenis_material_id');
    }

    public function stok_material_ambil(): HasMany
    {
        return $this->hasMany(MaterialDiambil::class, 'jenis_material_id');
    }

    public function totalWarnaStok()
    {
        return $this->stok_material_tambah()
            ->selectRaw('warna, SUM(stok) as total_stok')
            ->groupBy('warna')
            ->pluck('total_stok', 'warna');
    }

    public function totalWarnaStokAmbil()
    {
        return $this->stok_material_ambil()
            ->selectRaw('warna, SUM(diambil) as total_stok')
            ->groupBy('warna')
            ->pluck('total_stok', 'warna');
    }

    public function sisaStok()
    {
        $totalStok = $this->totalWarnaStok();
        $totalDiambil = $this->totalWarnaStokAmbil();

        $sisa = [];
        
        foreach ($totalStok as $warna => $stok) {
            $diambil = $totalDiambil[$warna] ?? 0;
            
            $sisa[$warna] = $stok - $diambil;
        }

        return $sisa;
    }

}
