<?php

namespace App\Http\Resources;

use Illuminate\Support\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class SupplyResource extends JsonResource
{

    
    public function toArray($request)
    {
        return parent::toArray($request);

        return [
          'supplies' => $this->supplies,
          'state' => $this->state,
          'street'=> $this->street,
          'PLZcode'=>$this->PLZcode,
          'your WhatsApp'=>$this->yourWhatsApp,
          'created_at'=> Carbon::parse($this->created_at)->toDateTimeString(),
          'updated_at'=> Carbon::parse($this->updated_at)->toDateTimeString(),
        ];
    }
}
