<?php

namespace App\Repositories\Presenter;

use League\Fractal\TransformerAbstract;
use App\Models\RecruitCategory;

class RecruitListTransformer extends TransformerAbstract
{
    public function transform(\App\Models\Recruit $recruit)
    {
        return [
            'id' => $recruit->id,
            'title' => $recruit->title,
            'post' => $recruit->post,
            'reports_to' => $recruit->reports_to,
            'category_name' => app(RecruitCategory::class)->where('id',$recruit->category_id)->value('name'),
            //'image' => $recruit->image ? url("/image/sm".$recruit->image) : '',
            'requirement' => $recruit->requirement,
            'duty' => $recruit->duty,
        ];
    }
}
