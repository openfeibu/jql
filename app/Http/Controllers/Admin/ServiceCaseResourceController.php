<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\ResourceController as BaseController;
use App\Models\Page;
use App\Repositories\Eloquent\PageRepositoryInterface;
use App\Repositories\Eloquent\PageCategoryRepositoryInterface;
use App\Http\Requests\PageRequest;
use Mockery\CountValidator\Exception;

/**
 * Resource controller class for page.
 */
class ServiceCaseResourceController extends BaseController
{
    /**
     * Initialize page resource controller.
     *
     * @param type PageRepositoryInterface $page
     *
     */
    public function __construct(PageRepositoryInterface $page,
                                PageCategoryRepositoryInterface $category_repository)
    {
        parent::__construct();
        $this->repository = $page;
        $this->category_repository = $category_repository;
        $this->category_slug = 'service_case';
        $category_data = $category_repository->where(['slug' => $this->category_slug])->first();
        $this->category_data = $category_data;
        $this->category_id = $category_data['id'];
        $this->main_url = 'service_case/service_case';
        $this->slug = 'content';
        $this->view_floder = 'service.case.content.';
    }
    public function index(PageRequest $request,$order='asc'){
        $limit = $request->input('limit',config('app.limit'));

        $childs = $this->category_repository->where(['parent_id' => $this->category_id])->all(['id'])->toArray();
        if($childs){
            $child_ids = array_column($childs, 'id');
            $this->repository = $this->repository->whereIn('category_id' , $child_ids);
        }else{
            $this->repository = $this->repository->where(['category_id' => $this->category_id]);
        }

        if ($this->response->typeIs('json')) {
            $data = $this->repository
                ->where(['slug' => $this->slug])
                ->setPresenter(\App\Repositories\Presenter\PageListPresenter::class)
                ->orderBy('category_id','asc')
                ->orderBy('order',$order)
                ->orderBy('id',$order)
                ->all();
            return $this->response
                ->success()
                //->count($data['recordsTotal'])
                ->data($data['data'])
                ->output();
        }
        return $this->response->title(trans('app.admin.panel'))
            ->view($this->view_floder.'.index')
            ->output();
    }
    public function create(PageRequest $request)
    {
        $page = $this->repository->newInstance([]);

        $category_childs = $this->category_repository->where(['parent_id' => $this->category_id])->orderBy('order','asc')->orderBy('id','asc')->all()->toArray();

        return $this->response->title(trans('app.admin.panel'))
            ->view($this->view_floder.'.create')
            ->data(compact('page','category_childs'))
            ->output();
    }
    public function store(PageRequest $request)
    {
        try {
            $attributes = $request->all();
            $attributes['category_id'] = isset($attributes['category_id']) && !empty($attributes['category_id']) ? $attributes['category_id'] : $this->category_id;
            $attributes['recommend_type'] = isset($attributes['home_recommend']) && $attributes['home_recommend'] == 'on' ? 'home' : "";
            $attributes['slug'] = $this->slug;
            $page = $this->repository->create($attributes);

            return $this->response->message(trans('messages.success.created', ['Module' => trans($this->category_slug.'.name')]))
                ->code(0)
                ->status('success')
                ->url(guard_url($this->main_url.'/'))
                ->redirect();
        } catch (Exception $e) {
            return $this->response->message($e->getMessage())
                ->code(400)
                ->status('error')
                ->url(guard_url($this->main_url.'/'))
                ->redirect();
        }
    }
    public function show(PageRequest $request,Page $service_case)
    {
        $page = $service_case;
        if ($page->exists) {
            $view = $this->view_floder.'.show';
        } else {
            $view = $this->view_floder.'.create';
        }

        $category_childs = $this->category_repository->where(['parent_id' => $this->category_id])->orderBy('order','asc')->orderBy('id','asc')->all()->toArray();

        return $this->response->title(trans('app.view') . ' ' . trans($this->category_slug.'.name'))
            ->data(compact('page','category_childs'))
            ->view($view)
            ->output();
    }
    public function update(PageRequest $request,Page $service_case)
    {
        $page = $service_case;
        try {
            $attributes = $request->all();

            $attributes['recommend_type'] = isset($attributes['home_recommend']) && $attributes['home_recommend'] == 'on' ? 'home' : "";
            $page->update($attributes);

            return $this->response->message(trans('messages.success.created', ['Module' => trans($this->category_slug.'.name')]))
                ->code(0)
                ->status('success')
                ->url(guard_url($this->main_url.'/'))
                ->redirect();
        } catch (Exception $e) {
            return $this->response->message($e->getMessage())
                ->code(400)
                ->status('error')
                ->url(guard_url($this->main_url.'/'))
                ->redirect();
        }
    }
    public function destroy(PageRequest $request,Page $service_case)
    {
        $page = $service_case;
        try {
            $this->repository->forceDelete([$page->id]);

            return $this->response->message(trans('messages.success.deleted', ['Module' => trans($this->category_slug.'.name')]))
                ->status("success")
                ->code(202)
                ->url(guard_url($this->main_url))
                ->redirect();

        } catch (Exception $e) {

            return $this->response->message($e->getMessage())
                ->status("error")
                ->code(400)
                ->url(guard_url($this->main_url))
                ->redirect();
        }
    }
    public function destroyAll(PageRequest $request)
    {
        try {
            $data = $request->all();
            $ids = $data['ids'];
            $this->repository->forceDelete($ids);

            return $this->response->message(trans('messages.success.deleted', ['Module' => trans($this->category_slug.'.name')]))
                ->status("success")
                ->code(202)
                ->url(guard_url($this->main_url))
                ->redirect();

        } catch (Exception $e) {

            return $this->response->message($e->getMessage())
                ->status("error")
                ->code(400)
                ->url(guard_url($this->main_url))
                ->redirect();
        }
    }
    public function updateRecommend(PageRequest $request)
    {
        $attributes = $request->all();
        $data['recommend_type'] = isset($attributes['home_recommend']) && $attributes['home_recommend'] == "true" ? 'home' : "";
        $this->repository->update($data,$attributes['id']);

        return $this->response->message('')
            ->success()
            ->redirect();
    }

}