<?php

namespace App\Api\Course\Resources;

use App\Api\Topic\Resources\Topic;
use App\Api\User\Resources\UserCollection;
use Illuminate\Http\Resources\Json\JsonResource;

class Course extends JsonResource
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
            'headline'               => $this->headline,
            'description'            => $this->description,
            'description_excerpt'    => $this->description_excerpt,
            'learning_points'        => $this->learning_points,
            'target_audience'        => $this->target_audience,
            'level'                  => $this->level,
            'language'               => $this->language,
            'estimated_duration'     => $this->estimated_duration,
            'unique_views_count'     => $this->getUniqueViewsCount(),
            'published_at'           => $this->published_at,
            'authors'                => new UserCollection($this->whenLoaded('authors')),
            'topic'                  => new Topic($this->whenLoaded('topic')),
            'tags'                   => $this->whenLoaded('tags'),
            'chapters'               => $this->whenLoaded('chapters'),
            'created_at'             => $this->created_at,
            'updated_at'             => $this->updated_at,
        ];
    }
}
