<?php

namespace App\Http\Controllers\obat;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Obat;
use Illuminate\Support\Str;
use App\Http\Resources\Resourceobat;

class ObatContoller extends Controller
{
    public function index()
    {
        return Obat::latest()->get();
    }

    public function hitung(Obat $obat)
    {
        $obat = Obat::count();
        return $obat;
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
        $path = public_path() . '/img/obat/' . $fileName;
        file_put_contents($path, $decoded);
 
       $obat = Obat::create([
            'nama' => request('nama'),
            'harga' => request('harga'),
            'image' => $fileName,

        ]);

        return response()->json([
            'message' => 'secces',
            'obat' => $obat,
        ]);
    }


    public function show(Obat $obat)
    {
      return Resourceobat::make($obat);
    }


    public function update(Obat $obat)
    {
      sleep(1);
        request()->validate([
            'nama' => 'required',
            'harga' => 'required',
        ]);

   

        $obat->update([
            'nama' => request('nama'),
            'harga' => request('harga'),

        ]);

        return response()->json([
            'message' => 'secces update',
            'obat' => $obat,
        ]);
    }
    


    public function destroy(Obat $obat)
    {
        $obat->delete();

        return response()->json([
            'message' => 'secces delete',
        ], 200);
    }
}
