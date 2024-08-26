<?php

namespace App\Http\Resources;

use Illuminate\Support\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class QuestionResource extends JsonResource
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
           'title'=> $this->title,
           'body'=>$this->body,
           'created_at'=> Carbon::parse($this->created_at)->toDateTimeString(),
            'updated_at'=> Carbon::parse($this->updated_at)->toDateTimeString(),
        ];
    }
}
