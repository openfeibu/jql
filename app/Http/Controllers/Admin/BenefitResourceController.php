<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\PageBaseResourceController as BaseController;
use App\Models\Page;
use App\Repositories\Eloquent\PageRepositoryInterface;
use App\Repositories\Eloquent\PageCategoryRepositoryInterface;
use App\Http\Requests\PageRequest;
use Mockery\CountValidator\Exception;

/**
 * Resource controller class for page.
 */
class BenefitResourceController extends BaseController
{
    /**
     * Initialize page resource controller.
     *
     * @param type PageRepositoryInterface $page
     *
     */
    public function __construct(PageRepositoryInterface $page,
                                PageCategoryRepositoryInterface $category)
    {
        parent::__construct($page,$category);
        $this->category_slug = $this->main_url = 'benefit';
        $category_data = $category->where(['slug' => $this->category_slug])->first();
        $this->category_data = $category_data;
        $this->category_id = $category_data['id'];
        $this->repository = $page;
        $this->repository = $this->repository
            ->pushCriteria(\App\Repositories\Criteria\RequestCriteria::class)
            ->pushCriteria(\App\Repositories\Criteria\PageResourceCriteria::class);
    }
    public function index(PageRequest $request,$order='asc'){
        return parent::index($request,$order);
    }
    public function show(PageRequest $request,Page $benefit)
    {
        return parent::show($request,$benefit);
    }
    public function update(PageRequest $request,Page $benefit)
    {
        return parent::update($request,$benefit);
    }
    public function destroy(PageRequest $request,Page $benefit)
    {
        return parent::destroy($request,$benefit);
    }

}