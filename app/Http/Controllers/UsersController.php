<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JenisMaterial;
use App\Models\StokMaterial;
use App\Models\MaterialDiambil;
use App\Models\JenisBahan;
use App\Models\StokBahan;
use App\Models\BahanDiambil;
use App\Models\JenisTas;
use App\Models\StokTas;
use App\Models\TasDiambil;
use App\Models\Users;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    public function index()
    {
        $jenis1 = JenisMaterial::with('stok_material_tambah', 'stok_material_ambil')->get();
        $jenis2 = JenisBahan::with('stok_bahan_tambah', 'stok_bahan_ambil')->get();
        $stok1 = StokMaterial::sum('stok');
        $stok2 = StokBahan::sum('stok');
        $stok3 = StokTas::sum('stok');
        $ambil1 = MaterialDiambil::sum('diambil');
        $ambil2 = BahanDiambil::sum('diambil');
        $ambil3 = TasDiambil::sum('diambil');
        $user = Auth::user();
        $users = Users::count('id');
        
        return view('admin.dashboard', compact('jenis1', 'jenis2', 'stok1', 'stok2', 'stok3', 'ambil1', 'ambil2', 'ambil3', 'user', 'users'));
    }

    public function stok_material()
    {
        $auth = Auth::user();
        $jenis = JenisMaterial::with('stok_material_tambah', 'stok_material_ambil')->orderBy('id', 'desc')->get();

        return view('admin.stok_material.index', compact('jenis', 'auth'));
    }

    public function stok_material_detail($id)
    {
        $jenis = JenisMaterial::find($id);
        $stok = StokMaterial::where('jenis_material_id', $id)->orderBy('id', 'desc')->get();
        $stok_ambil = MaterialDiambil::where('jenis_material_id', $id)->orderBy('id', 'desc')->get();
        $auth = Auth::user();

        return view('admin.stok_material.detail', compact('jenis', 'stok', 'stok_ambil', 'auth'));
    }


        //bahan

        public function stok_bahan()
    {
        $auth = Auth::user();
        $jenis = JenisBahan::with('stok_bahan_tambah', 'stok_bahan_ambil')->orderBy('id', 'desc')->get();

        return view('admin.stok_bahan.index', compact('jenis', 'auth'));
    }

    public function stok_bahan_detail($id)
    {
        $jenis = JenisBahan::find($id);
        $stok = StokBahan::where('jenis_bahan_id', $id)->orderBy('id', 'desc')->get();
        $stok_ambil = BahanDiambil::where('jenis_bahan_id', $id)->orderBy('id', 'desc')->get();
        $auth = Auth::user();

        return view('admin.stok_bahan.detail', compact('jenis', 'stok', 'stok_ambil', 'auth'));
    }


        public function stok_tas()
        {
            $auth = Auth::user();
            $jenis = JenisTas::with('stok_tas_tambah', 'stok_tas_ambil')->orderBy('id', 'desc')->get();
    
            return view('admin.stok_tas.index', compact('jenis', 'auth'));
        }
    
        public function stok_tas_detail($id)
        {
            $jenis = JenisTas::find($id);
            $stok = StokTas::where('jenis_tas_id', $id)->orderBy('id', 'desc')->get();
            $stok_ambil = TasDiambil::where('jenis_tas_id', $id)->orderBy('id', 'desc')->get();
            $auth = Auth::user();
    
            return view('admin.stok_tas.detail', compact('jenis', 'stok', 'stok_ambil', 'auth'));
        }
    
     

}
