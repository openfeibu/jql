<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\ResourceController as BaseController;
use App\Models\Recruit;
use Illuminate\Http\Request;
use App\Repositories\Eloquent\PageRecruitRepositoryInterface;
use App\Repositories\Eloquent\RecruitCategoryRepositoryInterface;

class RecruitResourceController extends BaseController
{
    public function __construct(PageRecruitRepositoryInterface $recruit,
                                RecruitCategoryRepositoryInterface $recruit_category_repository)
    {
        parent::__construct();
        $this->repository = $recruit;
        $this->recruit_category_repository = $recruit_category_repository;
        $this->repository
            ->pushCriteria(\App\Repositories\Criteria\RequestCriteria::class);
    }
    public function index(Request $request)
    {
        $limit = $request->input('limit',config('app.limit'));
        if ($this->response->typeIs('json')) {
            $data = $this->repository
                ->setPresenter(\App\Repositories\Presenter\RecruitListPresenter::class)
                ->orderBy('order','asc')
                ->orderBy('id','asc')
                ->getDataTable($limit);
            return $this->response
                ->success()
                ->count($data['recordsTotal'])
                ->data($data['data'])
                ->output();
        }
        return $this->response->title(trans('app.admin.panel'))
            ->view('recruit.index')
            ->output();
    }
    public function create(Request $request)
    {
        $recruit = $this->repository->newInstance([]);

        $categories = $this->recruit_category_repository->orderBy('order','asc')->orderBy('id','asc')->all();

        return $this->response->title(trans('app.admin.panel'))
            ->view('recruit.create')
            ->data(compact('recruit','categories'))
            ->output();
    }
    public function store(Request $request)
    {
        try {
            $attributes = $request->all();

            $recruit = $this->repository->create($attributes);

            return $this->response->message(trans('messages.success.created', ['Module' => trans('recruit.name')]))
                ->code(0)
                ->status('success')
                ->url(guard_url('recruit/recruit/'))
                ->redirect();
        } catch (Exception $e) {
            return $this->response->message($e->getMessage())
                ->code(400)
                ->status('error')
                ->url(guard_url('recruit'))
                ->redirect();
        }
    }
    public function show(Request $request,Recruit $recruit)
    {
        if ($recruit->exists) {
            $view = 'recruit.show';
        } else {
            $view = 'recruit.create';
        }
        $categories = $this->recruit_category_repository->orderBy('order','asc')->orderBy('id','asc')->all();

        return $this->response->title(trans('app.view') . ' ' . trans('recruit.name'))
            ->data(compact('recruit','categories'))
            ->view($view)
            ->output();
    }
    public function update(Request $request,Recruit $recruit)
    {
        try {
            $attributes = $request->all();

            $recruit->update($attributes);

            return $this->response->message(trans('messages.success.created', ['Module' => trans('recruit.name')]))
                ->code(0)
                ->status('success')
                ->url(guard_url('recruit/recruit/'))
                ->redirect();
        } catch (Exception $e) {
            return $this->response->message($e->getMessage())
                ->code(400)
                ->status('error')
                ->url(guard_url('recruit/recruit/'))
                ->redirect();
        }
    }
    public function destroy(Request $request,Recruit $recruit)
    {
        try {
            $this->repository->forceDelete([$recruit->id]);

            return $this->response->message(trans('messages.success.deleted', ['Module' => trans('recruit.name')]))
                ->status("success")
                ->code(202)
                ->url(guard_url('recruit'))
                ->redirect();

        } catch (Exception $e) {

            return $this->response->message($e->getMessage())
                ->status("error")
                ->code(400)
                ->url(guard_url('recruit'))
                ->redirect();
        }
    }
    public function destroyAll(Request $request)
    {
        try {
            $data = $request->all();
            $ids = $data['ids'];
            $this->repository->forceDelete($ids);

            return $this->response->message(trans('messages.success.deleted', ['Module' => trans('recruit.name')]))
                ->status("success")
                ->code(202)
                ->url(guard_url('recruit'))
                ->redirect();

        } catch (Exception $e) {
            return $this->response->message($e->getMessage())
                ->status("error")
                ->code(400)
                ->url(guard_url('recruit'))
                ->redirect();
        }
    }
}
