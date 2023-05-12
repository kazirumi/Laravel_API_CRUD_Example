<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;


class ProductResource extends JsonResource
{


    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
//            'id'=> $this->id,
            'ProductName'=> $this->ProductName,
            'Price'=> $this->Price,
            'Amount'=> $this->Amount,
            'Available'=> $this->Available,
            'category_id'=> $this->category_id,
            'created_at'=>$this->created_at,
            'updated_at'=>$this->updated_at,
           // 'category' => new CategoryResource($this->Category)
        ];
    }
}
