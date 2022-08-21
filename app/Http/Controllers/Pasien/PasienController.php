<?php

namespace App\Http\Controllers\Pasien;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str; 
use App\Pasien;
use App\Dokter;
use App\Kelas;
use App\Obat;
use App\Http\Resources\PasienResource;

class PasienController extends Controller
{
    public function index()
    {
        
        return Pasien::latest()->get();
        
    }

    public function show(Dokter $dokter , Kelas $kelas , Obat $obat , Pasien $pasien)
    {
        return PasienResource::make($pasien);
    }

    public function hitung(Pasien $pasien)
    {
        $pasien = Pasien::latest()->count();
        return $pasien;
    }

    public function store(Request $request, Dokter $dokter , Kelas $kelas , Obat $obat , Pasien $pasien)
    {
       
        sleep(1);
        request()->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'keluhan' => 'required',
            'ttl' => 'required',
            'nomor' => 'required',
            'image' => 'required',
        ]);

        $random = Str::random(40);
        \Log::info($request->all());
        $exploded = explode(',', $request->image);
        $decoded = base64_decode($exploded[1]);
        if(str_contains($exploded[0], 'jpeg'))
          $extention = 'jpg';
        elseif(str_contains($exploded[0], 'gif'))
          $extention = 'gif';
        else
          $extention = 'png';
    
        $fileName = $random.'.'. $extention;
        $path = public_path() . '/img/pasien/' . $fileName;
        file_put_contents($path, $decoded);


       $dokter = Dokter::findOrFail(request('dokter'));
       $kelas = Kelas::findOrFail(request('kelas'));
       $obat = Obat::findOrFail(request('obat'));

       $random = Str::random(5);   
 
       $pasien = Pasien::create([
            'dokter_id' => $dokter->id,
            'kelas_id' => $kelas->id,
            'obat_id' => $obat->id,
            'nama' => request('nama'),
            'alamat' => request('alamat'),
            'keluhan' => request('keluhan'),
            'nomor' => request('nomor'),
            'ttl' => request('ttl'),
            'rekam' => $random,
            'image' => $fileName,

        ]);

        return response()->json([
            'message' => 'secces',
            'pasien' => $pasien,
        ]);
    }

    public function update(Pasien $pasien)
    {
        request()->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'keluhan' => 'required',
            'ttl' => 'required',
            'nomor' => 'required',
        ]);

       
        $dokter = Dokter::findOrFail(request('dokter'));
        $pasien->update([
            'dokter_id' => $dokter->id,
            'nama' => request('nama'),
            'alamat' => request('alamat'),
            'keluhan' => request('keluhan'),
            'nomor' => request('nomor'),
            'ttl' => request('ttl'),

        ]);

        return response()->json([
            'message' => 'secces update',
            'pasien' => $pasien,
        ]);
    }

    public function destroy(Pasien $pasien)
    {
        $pasien->delete();

        return response()->json([
            'message' => 'secces delete',
        ], 200);
    }
}
