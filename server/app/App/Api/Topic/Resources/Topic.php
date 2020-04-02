<?php

namespace App\Api\Topic\Resources;

use App\Api\Course\Resources\CourseCollection;
use Illuminate\Http\Resources\Json\JsonResource;

class Topic extends JsonResource
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
            'id'                 => $this->id,
            'display_name'       => $this->display_name,
            'slug'               => $this->slug,
            'description'        => $this->description,
            'status'             => $this->status,
            'unique_views_count' => $this->getUniqueViewsCount(),
            'courses'            => new CourseCollection($this->courses),
        ];
    }
}
