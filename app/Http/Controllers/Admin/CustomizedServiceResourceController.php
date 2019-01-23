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
class CustomizedServiceResourceController extends BaseController
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
        $this->category_slug = $this->main_url = 'customized_service';
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
    public function show(PageRequest $request,Page $customized_service)
    {
        return parent::show($request,$customized_service);
    }
    public function update(PageRequest $request,Page $customized_service)
    {
        return parent::update($request,$customized_service);
    }
    public function destroy(PageRequest $request,Page $customized_service)
    {
        return parent::destroy($request,$customized_service);
    }

}