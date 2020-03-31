<?php

namespace Domain\User\Models;

use Domain\Model;
use Domain\User\Models\User;

use Illuminate\Database\Eloquent\Relationships\BelongsToMany;

class Course extends Model
{
    protected $table = 'courses';

    public function authors(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'course_author', 'course_id', 'user_id')
            ->withTimestamps();
    }

    public function topics()
    {
        return $this->belongsToMany(\App\Models\Topic::class, 'course_topic', 'course_id', 'topic_id')
            ->withTimestamps();
    }
}
