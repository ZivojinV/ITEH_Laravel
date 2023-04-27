<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class StudentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        // return parent::toArray($request);

        return [
            'id' => $this->resource->id,
            'firstname' => $this->resource->firstname,
            'lastname' => $this->resource->lastname,
            'parent' => $this->resource->parent,
            'grade' => $this->resource->grade,
            'balance' => $this->resource->balance,
            'university' => $this->resource->university,
            'city' => new CityResource($this->resource->city)
        ];
    }

    public static $wrap = 'student';
}
