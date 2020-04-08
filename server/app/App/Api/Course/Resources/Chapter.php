<?php

namespace App\Api\Course\Resources;

use App\Api\User\Resources\UserCollection;
use Illuminate\Http\Resources\Json\JsonResource;

class Chapter extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id'                     => $this->id,
            'slug'                   => $this->slug,
            'title'                  => $this->title,
            'description'            => $this->description,
            'course'                => new Course($this->whenLoaded('course')),
            'sections'                  => new SectionCollection($this->whenLoaded('section')),
            'created_at'             => $this->created_at,
            'updated_at'             => $this->updated_at,
        ];
    }
}
