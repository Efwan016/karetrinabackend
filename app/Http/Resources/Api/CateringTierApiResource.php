<?php

namespace App\Http\Resources\Api;

use App\Models\TierBenefit;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CateringTierApiResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string,
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'price' => $this->price,
            'quantity' => $this->quantity,
            'duration' => $this->duration,
            'photo' => $this->photo,
            'benefits' => TierBenefitApiResource::collection($this->whenLoaded('benefits')),
            'cateringPackage' => new CateringPackageApiResource($this->whenLoaded('cateringPackage')),
        ];
    }
}
