<?php

namespace App\Repositories\Eloquent;

use App\Repositories\Eloquent\PageRepositoryInterface;
use App\Repositories\Eloquent\BaseRepository;
use App\Repositories\Eloquent\PageCategoryRepositoryInterface;

class PageRepository extends BaseRepository implements PageRepositoryInterface
{

    /**
     * Booting the repository.
     *
     * @return null
     */
    public function boot()
    {
        $this->fieldSearchable = config('model.page.page.search');
    }

    /**
     * Specify Model class name.
     *
     * @return string
     */
    public function model()
    {
        return config('model.page.page.model');
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
    public function getPagesByCategorySlug($slug,$where=[],$order='asc')
    {
        $page_category_repository = app(PageCategoryRepositoryInterface::class);
        $category = $page_category_repository->where(['slug' => $slug])->first();
        $where['category_id'] = $category['id'];
        $pages = $this
            ->where($where)
            ->orderBy('order',$order)
            ->orderBy('id',$order)
            ->all()->toArray();
        return $pages;
    }
    public function getPagesByCategoryId($id,$where=[],$order='asc')
    {
        $where['category_id'] = $id;
        $pages = $this
            ->where($where)
            ->orderBy('order',$order)
            ->orderBy('id',$order)
            ->all()->toArray();
        return $pages;
    }
}
