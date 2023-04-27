<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CityResource extends JsonResource
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
            'name' => $this->resource->name,
            'population' => $this->resource->population,
            'is_capital' => $this->resource->is_capital,
            'history' => $this->resource->history,
            'GDP' => $this->resource->GDP
        ];
    }

    public static $wrap = 'city';
}
