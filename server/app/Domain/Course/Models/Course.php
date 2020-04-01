<?php

namespace Domain\Course\Models;

use Domain\Model;
use Domain\User\Models\User;
use Domain\Topci\Models\Topic;
use Illuminate\Database\Eloquent\Relationships\BelongsToMany;

class Course extends Model
{
    protected $table = 'courses';

    protected $casts = [
        'learning_points' => 'array',
        'target_audience' => 'array',
    ];

    public function authors(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'course_author', 'course_id', 'user_id')
            ->withTimestamps();
    }

    public function topics()
    {
        return $this->belongsToMany(Topic::class, 'course_topic', 'course_id', 'topic_id')
            ->withTimestamps();
    }
}
