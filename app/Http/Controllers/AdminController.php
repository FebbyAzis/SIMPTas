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

class AdminController extends Controller
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

    public function tambah_jenis_material(Request $request)
        {
        $save = new JenisMaterial;
        $save->nama_material = $request->nama_material;
        $save->save(); 

            return redirect()->back()->with('Success', 'Data berhasil disimpan!');
        }

        public function tambah_stok(Request $request)
        {
        
                $save = new StokMaterial;
                $save->jenis_material_id = $request->jenis_material_id;
                $save->warna = $request->warna;
                $save->stok = $request->stok;
                $save->save(); 
       
            return redirect()->back()->with('Success', 'Stok material berhasil ditambahkan!');
        }

        public function ambil_stok(Request $request)
        {
        
                $save = new MaterialDiambil;
                $save->jenis_material_id = $request->jenis_material_id;
                $save->warna = $request->warna;
                $save->diambil = $request->diambil;
                $save->save(); 
       
            return redirect()->back()->with('Ssuccess', 'Stok material berhasil diambil!');
        }

        public function edit_stok_tambah(Request $request, $id)
        {

            StokMaterial::where('id', $id)->update([
            
                'stok' => $request->stok,
                
            ]);

        return redirect()->back()->with('Successs', 'Data berhasil diubah');
        }

        public function edit_stok_ambil(Request $request, $id)
        {

            MaterialDiambil::where('id', $id)->update([
            
                'diambil' => $request->diambil,
                
            ]);

        return redirect()->back()->with('Successs', 'Data berhasil diubah');
        }

        public function hapus_stok_tambah($id)
        {
            $pyb = StokMaterial::where('id', $id)->delete();
            return redirect()->back()->with('Successss', 'Data berhasil dihapus!');
        }

        public function hapus_stok_ambil($id)
        {
            $pyb = MaterialDiambil::where('id', $id)->delete();
            return redirect()->back()->with('Successss', 'Data berhasil dihapus!');
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

    public function tambah_jenis_bahan(Request $request)
        {
        $save = new JenisBahan;
        $save->nama_bahan = $request->nama_bahan;
        $save->save(); 

            return redirect()->back()->with('Success', 'Data berhasil disimpan!');
        }

        public function tambah_stok_bahan(Request $request)
        {
        
                $save = new StokBahan;
                $save->jenis_bahan_id = $request->jenis_bahan_id;
                $save->warna = $request->warna;
                $save->stok = $request->stok;
                $save->save(); 
       
            return redirect()->back()->with('Success', 'Stok bahan berhasil ditambahkan!');
        }

        public function ambil_stok_bahan(Request $request)
        {
        
                $save = new BahanDiambil;
                $save->jenis_bahan_id = $request->jenis_bahan_id;
                $save->warna = $request->warna;
                $save->diambil = $request->diambil;
                $save->save(); 
       
            return redirect()->back()->with('Ssuccess', 'Stok bahan berhasil diambil!');
        }

        public function edit_stok_tambah_bahan(Request $request, $id)
        {

            StokBahan::where('id', $id)->update([
            
                'stok' => $request->stok,
                
            ]);

        return redirect()->back()->with('Successs', 'Data berhasil diubah');
        }

        public function edit_stok_ambil_bahan(Request $request, $id)
        {

            BahanDiambil::where('id', $id)->update([
            
                'diambil' => $request->diambil,
                
            ]);

        return redirect()->back()->with('Successs', 'Data berhasil diubah');
        }

        public function hapus_stok_tambah_bahan($id)
        {
            $pyb = StokBahan::where('id', $id)->delete();
            return redirect()->back()->with('Successss', 'Data berhasil dihapus!');
        }

        public function hapus_stok_ambil_bahan($id)
        {
            $pyb = BahanDiambil::where('id', $id)->delete();
            return redirect()->back()->with('Successss', 'Data berhasil dihapus!');
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
    
        public function tambah_jenis_tas(Request $request)
            {
            $save = new JenisTas;
            $save->nama_tas = $request->nama_tas;
            $save->save(); 
    
                return redirect()->back()->with('Success', 'Data berhasil disimpan!');
            }
    
            public function tambah_stok_tas(Request $request)
            {
            
                    $save = new StokTas;
                    $save->jenis_tas_id = $request->jenis_tas_id;
                    $save->warna = $request->warna;
                    $save->stok = $request->stok;
                    $save->save(); 
           
                return redirect()->back()->with('Success', 'Stok tas berhasil ditambahkan!');
            }
    
            public function ambil_stok_tas(Request $request)
            {
            
                    $save = new TasDiambil;
                    $save->jenis_tas_id = $request->jenis_tas_id;
                    $save->warna = $request->warna;
                    $save->diambil = $request->diambil;
                    $save->save(); 
           
                return redirect()->back()->with('Ssuccess', 'Stok tas berhasil diambil!');
            }
    
            public function edit_stok_tambah_tas(Request $request, $id)
            {
    
                StokTas::where('id', $id)->update([
                
                    'stok' => $request->stok,
                    
                ]);
    
            return redirect()->back()->with('Successs', 'Data berhasil diubah');
            }
    
            public function edit_stok_ambil_tas(Request $request, $id)
            {
    
                TasDiambil::where('id', $id)->update([
                
                    'diambil' => $request->diambil,
                    
                ]);
    
            return redirect()->back()->with('Successs', 'Data berhasil diubah');
            }
    
            public function hapus_stok_tambah_tas($id)
            {
                $pyb = StokTas::where('id', $id)->delete();
                return redirect()->back()->with('Successss', 'Data berhasil dihapus!');
            }
    
            public function hapus_stok_ambil_tas($id)
            {
                $pyb = TasDiambil::where('id', $id)->delete();
                return redirect()->back()->with('Successss', 'Data berhasil dihapus!');
            }

    public function laporan()
    {
        return view('admin.laporan.index');
    }
    
    public function cetak_laporan($tglawal, $tglakhir)
    {

        $jenis1 = JenisMaterial::with('stok_material_tambah', 'stok_material_ambil')->whereDate('created_at', '>=', $tglawal)
        ->whereDate('created_at', '<=', $tglakhir)->orderBy('id', 'desc')->get();
        $jenis2= JenisBahan::with('stok_bahan_tambah', 'stok_bahan_ambil')->whereDate('created_at', '>=', $tglawal)
        ->whereDate('created_at', '<=', $tglakhir)->orderBy('id', 'desc')->get();
        $jenis3 = JenisTas::with('stok_tas_tambah', 'stok_tas_ambil')->whereDate('created_at', '>=', $tglawal)
        ->whereDate('created_at', '<=', $tglakhir)->orderBy('id', 'desc')->get();


        return view('admin.laporan.cetak_laporan', compact('jenis1', 'jenis2', 'jenis3'));
    }

    public function edit_jenis_material(Request $request, $id)
    {

        JenisMaterial::where('id', $id)->update([
        
            'nama_material' => $request->nama_material,
            
        ]);

    return redirect()->back()->with('Successs', 'Data berhasil diubah');
    }

    public function edit_jenis_bahan(Request $request, $id)
    {

        JenisBahan::where('id', $id)->update([
        
            'nama_bahan' => $request->nama_bahan,
            
        ]);

    return redirect()->back()->with('Successs', 'Data berhasil diubah');
    }

    public function edit_jenis_tas(Request $request, $id)
    {

        JenisTas::where('id', $id)->update([
        
            'nama_tas' => $request->nama_tas,
            
        ]);

    return redirect()->back()->with('Successs', 'Data berhasil diubah');
    }

}
