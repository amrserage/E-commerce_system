<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CategoryResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
        'id'=>$this ->id ,
        'name'=>$this ->name,
        'slug'=>$this ->slug  ,
        'is_showing'=>$this->is_showing,
        'is_popular'=>$this->is_popular,  
        'description'=>$this ->description   , 
        'meta_title'=>$this ->meta_title   , 
        'meta_keywords'=>$this ->meta_keywords,    

        
        ];
    }
}
