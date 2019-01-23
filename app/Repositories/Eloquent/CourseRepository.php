<?php

namespace App\Repositories\Eloquent;

use App\Repositories\Eloquent\CourseRepositoryInterface;
use App\Repositories\Eloquent\BaseRepository;

class CourseRepository extends BaseRepository implements CourseRepositoryInterface
{
    public function model()
    {
        return config('model.course.course.model');
    }
    public function getCourses()
    {
        return $this
            ->orderBy('order','asc')
            ->orderBy('year','asc')
            ->orderBy('id','asc')
            ->get();
    }
}