<?php

namespace App\Api\Course\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Course extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'slug' => $this->slug,
            'title' => $this->title,
            'headline' => $this->headline,
            'description' => $this->description,
            'description_excerpt' => $this->description_excerpt,
            'learning_points' => $this->learning_points,
            'target_audience' => $this->target_audience,
            'level' => $this->level,
            'unique_views_count' => $this->getUniqueViewsCount(),
            'published_at' => $this->published_at,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
