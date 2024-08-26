<?php

namespace App\Http\Resources;

use Illuminate\Support\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class ReportResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return parent::toArray($request);
        return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
            'gender' => $this->gender,
            'age' => $this->age,
            'weight' => $this->weight,
            'height' => $this->height,
            'address' => $this->height,
            'user_id'=>$this->user_id,
            'created_at'=> Carbon::parse($this->created_at)->toDateTimeString(),
            'updated_at'=> Carbon::parse($this->updated_at)->toDateTimeString(),

        ];
    }
}
