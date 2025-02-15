<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\StokTas;
use App\Models\TasDiambil;
class JenisTas extends Model
{
    use HasFactory;

    protected $table = 'jenis_tas';

    public function stok_tas_tambah(): HasMany
    {
        return $this->hasMany(StokTas::class, 'jenis_tas_id');
    }

    public function stok_tas_ambil(): HasMany
    {
        return $this->hasMany(TasDiambil::class, 'jenis_tas_id');
    }

    public function totalWarnaStok()
    {
        return $this->stok_tas_tambah()
            ->selectRaw('warna, SUM(stok) as total_stok')
            ->groupBy('warna')
            ->pluck('total_stok', 'warna');
    }

    public function totalWarnaStokAmbil()
    {
        return $this->stok_tas_ambil()
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
