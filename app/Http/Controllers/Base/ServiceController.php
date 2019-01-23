<?php

namespace App\Http\Controllers\Base;

use Log,Tree;
use Illuminate\Http\Request;
use App\Models\Nav;
use App\Http\Controllers\Base\BaseController;
use App\Repositories\Eloquent\PageRepositoryInterface;
use App\Repositories\Eloquent\PageCategoryRepositoryInterface;

class ServiceController extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        $this->banner_image = app(Nav::class)->where('slug',app(Request::class)->route()->getName())->value('image');
        $this->banner = $this->banner_image ? url('image/original'.$this->banner_image) : '';
        $this->page_repository = app(PageRepositoryInterface::class);
        $this->page_category_repository = app(PageCategoryRepositoryInterface::class);
        $this->view_prefix = 'service.';
    }
    public function home(Request $request)
    {
        $benefits = $this->page_repository->getPagesByCategorySlug('benefit');
        $intellects = $this->page_repository->getPagesByCategorySlug('intellect');
        $office_services = $this->page_repository->getPagesByCategorySlug('office_service');
        $customized_services = $this->page_repository->getPagesByCategorySlug('customized_service');

        $service_case_parent_category = $this->page_category_repository->where(['slug' => 'service_case'])->first();
        $service_case_categories = $this->page_category_repository->where(['parent_id' => $service_case_parent_category['id']])
            ->orderBy('order','asc')
            ->orderBy('id','asc')
            ->all()
            ->toArray();
        $service_case_data = [];
        $i = 1;
        foreach ($service_case_categories as $key => $service_case_category)
        {
            $service_case_data[$i]['categories'] =  $service_case_category;
            $pages = $this->page_repository->getPagesByCategoryId($service_case_category['id'],['slug' => 'content']);
            $service_case_data[$i]['pages'] = $pages;
            $images = $this->page_repository->getPagesByCategoryId($service_case_category['id'],['slug' => 'image']);
            $service_case_data[$i]['images'] = $images;
            $i++;
        }
        return $this->response->title('服务案例')
            ->data([
                'banner' =>  $this->banner,
                'benefits' => $benefits,
                'intellects' => $intellects,
                'office_services' => $office_services,
                'customized_services' => $customized_services,
                'service_case_data' => $service_case_data,
            ])
            ->view($this->view_prefix.'home', true)
            ->output();
    }
}
