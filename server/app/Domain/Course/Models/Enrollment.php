<?php

namespace Domain\Course\Models;

use Domain\Model;
use Domain\User\Models\User;

class Enrollment extends Model
{
    protected $table = 'course_enrolled';

    public function student()
    {
        return $this->belongsToMany(User::class, 'course_enrolled', 'course_id', 'user_id');
    }

    public function course()
    {
        return $this->belongsToMany(Course::class, 'course_enrolled', 'user_id', 'course_id');
    }
}
