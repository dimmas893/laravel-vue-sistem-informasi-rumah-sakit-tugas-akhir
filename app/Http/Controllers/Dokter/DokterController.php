<?php

namespace App\Http\Controllers\Dokter;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Dokter;
use Illuminate\Support\Str;
use App\Http\Resources\Resourcerumahsakit;

class DokterController extends Controller
{
    public function index()
    {
        return Dokter::latest()->get();
    }

    public function hitung(Dokter $dokter)
    {
        $dokter = Dokter::count();
        return $dokter;
    }
   
   
   
    public function store(Request $request)
    {
       
        sleep(1);
        request()->validate([
            'nama' => 'required',
            'specialis' => 'required',
            'jam' => 'required',
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
        $path = public_path() . '/img/dokter/' . $fileName;
        file_put_contents($path, $decoded);

 
       $dokter = Dokter::create([
            'nama' => request('nama'),
            'specialis' => request('specialis'),
            'jam' => request('jam'),
            'image' => $fileName,

        ]);

        return response()->json([
            'message' => 'secces',
            'dokter' => $dokter,
        ]);
    }


    public function show(Dokter $dokter)
    {
      return Resourcerumahsakit::make($dokter);
    }


    public function update(Dokter $dokter)
    {
      sleep(1);
        request()->validate([
            'nama' => 'required',
            'specialis' => 'required',
            'jam' => 'required',
        ]);

   

        $dokter->update([
            'nama' => request('nama'),
            'specialis' => request('specialis'),
            'jam' => request('jam'),

        ]);

        return response()->json([
            'message' => 'secces update',
            'dokter' => $dokter,
        ]);
    }
    


    public function destroy(Dokter $dokter)
    {
        $dokter->delete();

        return response()->json([
            'message' => 'secces delete',
        ], 200);
    }
}
