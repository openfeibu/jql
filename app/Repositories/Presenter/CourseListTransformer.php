<?php

namespace App\Repositories\Presenter;

use League\Fractal\TransformerAbstract;

class CourseListTransformer extends TransformerAbstract
{
    public function transform(\App\Models\Course $course)
    {
        return [
            'id' => $course->id,
            'year' => $course->year,
            'month' => $course->month,
            'description' => $course->description,
            'date' => $course->year,
            'order' => $course->order,
            'image' => $course->image ? url("/image/sm".$course->image) : '',
        ];
    }
}
