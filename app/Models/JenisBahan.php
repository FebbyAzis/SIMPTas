<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\StokBahan;
use App\Models\BahanDiambil;
class JenisBahan extends Model
{
    use HasFactory;

    protected $table = 'jenis_bahan';

    public function stok_bahan_tambah(): HasMany
    {
        return $this->hasMany(StokBahan::class, 'jenis_bahan_id');
    }

    public function stok_bahan_ambil(): HasMany
    {
        return $this->hasMany(BahanDiambil::class, 'jenis_bahan_id');
    }

    public function totalWarnaStok()
    {
        return $this->stok_bahan_tambah()
            ->selectRaw('warna, SUM(stok) as total_stok')
            ->groupBy('warna')
            ->pluck('total_stok', 'warna');
    }

    public function totalWarnaStokAmbil()
    {
        return $this->stok_bahan_ambil()
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
