<?php

namespace App\Http\Resources;

use Illuminate\Support\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {

        return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'status' => $this->status,
            'reports' => ReportResource::collection($this->whenLoaded('reports')),
            'supplies' => SupplyResource::collection($this->whenLoaded('supplies')),
            'doctoer' => new DoctoerResource($this->whenLoaded('doctoer')),
            'questions' => QuestionResource::collection($this->whenLoaded('questions')),
            'created_at'=> Carbon::parse($this->created_at)->toDateTimeString(),
            'updated_at'=> Carbon::parse($this->updated_at)->toDateTimeString(),
        ];
        return parent::toArray($request);
    }
}
