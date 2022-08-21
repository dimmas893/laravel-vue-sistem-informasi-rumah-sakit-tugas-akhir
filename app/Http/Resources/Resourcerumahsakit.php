<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Resourcerumahsakit extends JsonResource
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
            'jam' => $this->jam,
            'specialis' => $this->specialis,
            'image' => $this->image,
            'publised' => $this->created_at->format('d F, Y'),
            'link' => route('Dokters.show' , $this->nama)
        ];
    }
}
