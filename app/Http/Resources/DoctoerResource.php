<?php

namespace App\Http\Resources;

use Illuminate\Support\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class DoctoerResource extends JsonResource
{

    public function toArray($request)
    {
        return parent::toArray($request);

        return [
          'name'=>$this->name,
          'specialization' => $this->specialization,
          'address' => $this->address,
           'price' => $this->price,
           'appointments' => $this->appointments,
           'languages'=> $this->languages,
           'created_at'=> Carbon::parse($this->created_at)->toDateTimeString(),
            'updated_at'=> Carbon::parse($this->updated_at)->toDateTimeString(),
        ];
    }
}
