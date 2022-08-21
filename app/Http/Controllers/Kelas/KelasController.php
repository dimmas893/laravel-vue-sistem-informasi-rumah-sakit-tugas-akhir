<?php

namespace App\Http\Controllers\Kelas;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Kelas;
use Illuminate\Support\Str;
use App\Http\Resources\Resourcekelas;

class KelasController extends Controller
{
    public function index()
    {
        return Kelas::latest()->get();
    }

    public function hitung(Kelas $kelas)
    {
        $kelas = Kelas::count();
        return $kelas;
    }
   
   
   
    public function store(Request $request)
    {
       
        sleep(1);
        request()->validate([
            'nama' => 'required',
            'harga' => 'required',
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
        $path = public_path() . '/img/kelas/' . $fileName;
        file_put_contents($path, $decoded);
 
       $kelas = Kelas::create([
            'nama' => request('nama'),
            'harga' => request('harga'),
            'image' => $fileName,

        ]);

        return response()->json([
            'message' => 'secces',
            'kelas' => $kelas,
        ]);
    }


    public function show(Kelas $kelas)
    {
      return Resourcekelas::make($kelas);
    }


    public function update(Kelas $kelas)
    {
      sleep(1);
        request()->validate([
            'nama' => 'required',
            'harga' => 'required',
        ]);

   

        $kelas->update([
            'nama' => request('nama'),
            'harga' => request('harga'),

        ]);

        return response()->json([
            'message' => 'secces update',
            'kelas' => $kelas,
        ]);
    }
    


    public function destroy(Kelas $kelas)
    {
        $kelas->delete();

        return response()->json([
            'message' => 'secces delete',
        ], 200);
    }
}
