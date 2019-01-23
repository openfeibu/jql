<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\ResourceController as BaseController;
use App\Models\Banner;
use App\Models\PageCategory;
use App\Repositories\Eloquent\BannerRepositoryInterface;
use Illuminate\Http\Request;
use Mockery\CountValidator\Exception;

/**
 * Resource controller class for page.
 */
class BannerResourceController extends BaseController
{
    /**
     * Initialize page resource controller.
     *
     * @param type BannerRepositoryInterface $banner
     *
     */
    public function __construct(BannerRepositoryInterface $banner)
    {
        parent::__construct();
        $this->repository = $banner;
        $this->repository
            ->pushCriteria(\App\Repositories\Criteria\RequestCriteria::class);
    }
    public function index(Request $request){
        if ($this->response->typeIs('json')) {
            $parent_category = app(PageCategory::class)->where('slug','banner')->first();
            $categories = app(PageCategory::class)->where('parent_id',$parent_category->id)->orderBy('order','asc')->orderBy('id','asc')->get();
            $data = [];
            foreach ($categories as $category_key => $category)
            {
                $banners = app(Banner::class)
                    ->join('page_categories','page_categories.id','=','banners.category_id')
                    ->where(['category_id' => $category->id])
                    ->orderBy('order','asc')
                    ->orderBy('id','asc')
                    ->select('banners.*','page_categories.name as category_name')
                    ->get()
                    ->toArray();
                $banners = list_image_url_absolute($banners);
                $data = array_merge($data,$banners);
            }
            return $this->response
                ->success()
                ->data($data)
                ->output();
        }
        return $this->response->title(trans('app.admin.panel'))
            ->view('banner.index')
            ->output();
    }
    public function create(Request $request)
    {
        $banner = $this->repository->newInstance([]);

        $parent_category = app(PageCategory::class)->where('slug','banner')->first();
        $categories = app(PageCategory::class)->where('parent_id',$parent_category->id)->orderBy('order','asc')->orderBy('id','asc')->get();

        return $this->response->title(trans('app.admin.panel'))
            ->view('banner.create')
            ->data(compact('banner','categories'))
            ->output();
    }
    public function store(Request $request)
    {
        try {
            $attributes = $request->all();

            $banner = $this->repository->create($attributes);

            return $this->response->message(trans('messages.success.created', ['Module' => trans('banner.name')]))
                ->code(0)
                ->status('success')
                ->url(guard_url('banner/banner/'))
                ->redirect();
        } catch (Exception $e) {
            return $this->response->message($e->getMessage())
                ->code(400)
                ->status('error')
                ->url(guard_url('banner/banner/'))
                ->redirect();
        }
    }
    public function show(Request $request,Banner $banner)
    {
        if ($banner->exists) {
            $view = 'banner.show';
        } else {
            $view = 'banner.new';
        }

        $parent_category = app(PageCategory::class)->where('slug','banner')->first();
        $categories = app(PageCategory::class)->where('parent_id',$parent_category->id)->orderBy('order','asc')->orderBy('id','asc')->get();

        return $this->response->title(trans('app.view') . ' ' . trans('banner.name'))
            ->data(compact('banner','categories'))
            ->view($view)
            ->output();
    }
    public function update(Request $request,Banner $banner)
    {
        try {
            $attributes = $request->all();

            $banner->update($attributes);

            return $this->response->message(trans('messages.success.created', ['Module' => trans('banner.name')]))
                ->code(0)
                ->status('success')
                ->url(guard_url('banner/banner/'))
                ->redirect();
        } catch (Exception $e) {
            return $this->response->message($e->getMessage())
                ->code(400)
                ->status('error')
                ->url(guard_url('banner/banner/'))
                ->redirect();
        }
    }
    public function destroy(Request $request,Banner $banner)
    {
        try {
            $banner->forceDelete();

            return $this->response->message(trans('messages.success.deleted', ['Module' => trans('banner.name')]))
                ->status("success")
                ->code(202)
                ->url(guard_url('banner'))
                ->redirect();

        } catch (Exception $e) {

            return $this->response->message($e->getMessage())
                ->status("error")
                ->code(400)
                ->url(guard_url('banner'))
                ->redirect();
        }
    }
    public function destroyAll(Request $request)
    {
        try {
            $data = $request->all();
            $ids = $data['ids'];
            $this->repository->forceDelete($ids);

            return $this->response->message(trans('messages.success.deleted', ['Module' => trans('banner.name')]))
                ->status("success")
                ->code(202)
                ->url(guard_url('banner'))
                ->redirect();

        } catch (Exception $e) {

            return $this->response->message($e->getMessage())
                ->status("error")
                ->code(400)
                ->url(guard_url('banner'))
                ->redirect();
        }
    }

}