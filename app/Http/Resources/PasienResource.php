<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PasienResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'nama' => $this->nama,
            'alamat' => $this->alamat,
            'ttl' => $this->ttl,
            'image' => $this->image,
            'keluhan' => $this->keluhan,
            'nomor' => $this->nomor,
            'dokter_image' => $this->dokter->image,
            'dokter_nama' => $this->dokter->nama,
            'dokter_specialis' => $this->dokter->specialis,
            'kelasnama' => $this->kelas->nama,
            'kelasimage' => $this->kelas->image,
            'kelasharga' => $this->kelas->harga,
            'obatnama' => $this->obat->nama,
            'obatimage' => $this->obat->image,
            'obatharga' => $this->obat->harga,
            'dokterid' => $this->dokter->id,
            'dokternama' => $this->dokter->nama,
            'kelasid' => $this->kelas->id,
            'obatid' => $this->obat->id,
            'publised' => $this->created_at->format('d F, Y'),
            'link' => route('pasienshow' , $this->nama)
        ];
    }
}
