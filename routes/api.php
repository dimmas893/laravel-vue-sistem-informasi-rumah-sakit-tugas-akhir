<?php

use Illuminate\Support\Facades\Route;

route::namespace('dokter')->group(function (){
    route::prefix('dokter')->group(function (){
      route::post('createdokter' , 'DokterController@store');   
      route::get('ambildokter' , 'DokterController@index');  
      route::get('hitungdokter' , 'DokterController@hitung');  
      route::get('{dokter:nama}' , 'DokterController@show')->name('Dokters.show'); 
      route::patch('{dokter:nama}' , 'DokterController@update');
      route::delete('{dokter:nama}' , 'DokterController@destroy');
    });
});


route::namespace('kelas')->group(function (){
  route::prefix('kelas')->group(function (){
    route::post('createkelas' , 'KelasController@store');   
    route::get('ambilkelas' , 'KelasController@index');  
    route::get('hitungkelas' , 'KelasController@hitung');  
    route::get('{kelas:nama}' , 'KelasController@show')->name('kelasshow'); 
    route::patch('{kelas:nama}' , 'KelasController@update');
    route::delete('{kelas:nama}' , 'KelasController@destroy');
  });
});

route::namespace('obat')->group(function (){
  route::prefix('obat')->group(function (){
    route::post('createobat' , 'ObatContoller@store');   
    route::get('ambilobat' , 'ObatContoller@index');  
    route::get('hitungobat' , 'ObatContoller@hitung');  
    route::get('{obat:nama}' , 'ObatContoller@show')->name('obatshow'); 
    route::patch('{obat:nama}' , 'ObatContoller@update');
    route::delete('{obat:nama}' , 'ObatContoller@destroy');
  });
});

route::namespace('pasien')->group(function (){
  route::prefix('pasien')->group(function (){
    route::post('createpasien' , 'Pasiencontroller@store');   
    route::get('ambilpasien' , 'Pasiencontroller@index');  
    route::get('hitungpasien' , 'Pasiencontroller@hitung');  
    route::get('{pasien:nama}' , 'Pasiencontroller@show')->name('pasienshow'); 
    route::patch('{pasien:nama}/edit' , 'Pasiencontroller@update');
    route::delete('{pasien:nama}' , 'Pasiencontroller@destroy');
  });
});







      
      

