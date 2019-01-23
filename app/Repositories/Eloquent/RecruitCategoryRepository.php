<?php

namespace App\Repositories\Eloquent;

use App\Repositories\Eloquent\RecruitCategoryRepositoryInterface;
use App\Repositories\Eloquent\BaseRepository;

class RecruitCategoryRepository extends BaseRepository implements RecruitCategoryRepositoryInterface
{

    /**
     * Specify Model class name.
     *
     * @return string
     */
    public function model()
    {
        return config('model.page.recruit_category.model');
    }

    /**
     * Get page by id or slug.
     *
     * @return void
     */
    public function getPage($var)
    {
        return $this->findBySlug($var);
    }
}
