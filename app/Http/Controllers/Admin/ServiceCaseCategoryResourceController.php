<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\ResourceController as BaseController;
use App\Http\Requests\PageCategoryRequest;
use App\Repositories\Eloquent\PageCategoryRepositoryInterface;
use App\Models\PageCategory;
use Tree;
/**
 * Resource controller class for page.
 */
class ServiceCaseCategoryResourceController extends BaseController
{
    /**
     * Initialize category resource controller.
     *
     * @param type PageCategoryRepositoryInterface $category
     *
     * @return null
     */
    public function __construct(PageCategoryRepositoryInterface $category)
    {
        parent::__construct();
        $this->repository = $category;
        $this->category_slug = 'service_case';
        $this->category = $this->repository->where(['slug' => $this->category_slug])->first();
        $this->repository
            ->pushCriteria(\App\Repositories\Criteria\RequestCriteria::class)
            ->pushCriteria(\App\Repositories\Criteria\PageCategoryResourceCriteria::class);
    }

    public function index(PageCategoryRequest $request)
    {
        if ($this->response->typeIs('json'))
        {
            $categories = $this->repository
                ->where(['parent_id' => $this->category['id']])
                ->orderBy('order','asc')
                ->orderBy('id','asc')
                ->all()
                ->toArray();
            $categories = list_image_url_absolute($categories);
            return $this->response
                ->success()
                ->data($categories)
                ->output();
        }
        return $this->response->title(trans('page::category.names'))
            ->view('service.case.category.index', true)
            ->output();
    }

    public function create(PageCategoryRequest $request)
    {
        $category = $this->repository->newInstance([]);

        return $this->response->title(trans('app.admin.panel'))
            ->view('service.case.category.create')
            ->data(compact('category'))
            ->output();
    }

    public function show(PageCategoryRequest $request,PageCategory $category)
    {
        if ($category->exists) {
            $view = 'service.case.category.show';
        } else {
            $view = 'service.case.category.create';
        }

        return $this->response->title(trans('app.view'))
            ->data(compact('category'))
            ->view($view)
            ->output();
    }

    public function store(PageCategoryRequest $request)
    {
        try {
            $attributes = $request->all();

            $attributes['parent_id'] = $this->category['id'];

            $page = $this->repository->create($attributes);

            return $this->response->message(trans('messages.success.created', ['Module' => trans('category.name')]))
                ->success()
                ->url(guard_url('service_case/category'))
                ->redirect();
        } catch (Exception $e) {
            return $this->response->message($e->getMessage())
                ->code(400)
                ->status('error')
                ->url(guard_url('service_case/category'))
                ->redirect();
        }
    }
    public function update(PageCategoryRequest $request,PageCategory $category)
    {
        try {
            $attributes = $request->all();
            $category->update($attributes);
            return $this->response->message(trans('messages.success.updated', ['Module' => trans('category.name')]))
                ->success()
                ->url(guard_url('service_case/category'))
                ->redirect();
        } catch (Exception $e) {
            return $this->response->message($e->getMessage())
                ->code(400)
                ->status('error')
                ->url(guard_url('service_case/category'))
                ->redirect();
        }
    }
    public function destroy(PageCategoryRequest $request,PageCategory $category)
    {
        try {
            $this->repository->forceDelete([$category->id]);

            return $this->response->message(trans('messages.success.deleted', ['Module' => trans('category.name')]))
                ->success()
                ->url(guard_url('service_case/category'))
                ->redirect();

        } catch (Exception $e) {

            return $this->response->message($e->getMessage())
                ->status("error")
                ->code(400)
                ->url(guard_url('service_case/category'))
                ->redirect();
        }
    }
    public function destroyAll(PageCategoryRequest $request)
    {
        try {
            $data = $request->all();
            $ids = $data['ids'];
            $this->repository->forceDelete($ids);

            return $this->response->message(trans('messages.success.deleted', ['Module' => trans('category.name')]))
                ->success()
                ->url(guard_url('service_case/category'))
                ->redirect();

        } catch (Exception $e) {

            return $this->response->message($e->getMessage())
                ->status("error")
                ->code(400)
                ->url(guard_url('service_case/category'))
                ->redirect();
        }
    }
}