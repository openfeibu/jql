<?php

namespace App\Http\Controllers\Base;

use Log,Tree;
use Illuminate\Http\Request;
use App\Models\Nav;
use App\Http\Controllers\Base\BaseController;
use App\Repositories\Eloquent\PageRepositoryInterface;
use App\Repositories\Eloquent\CourseRepositoryInterface;

class AboutController extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        $this->banner_image = app(Nav::class)->where('slug',app(Request::class)->route()->getName())->value('image');
        $this->banner = $this->banner_image ? url('image/original'.$this->banner_image) : '';
        $this->page_repository = app(PageRepositoryInterface::class);
        $this->course_repository = app(CourseRepositoryInterface::class);
        $this->view_prefix = 'about.';
    }
    public function home(Request $request)
    {
        $company = $this->page_repository->findBySlug('about-company');
        $about_image = $this->page_repository->findBySlug('about-image');
        $courses =$this->course_repository->getCourses();

        return $this->response->title('关于我们')
            ->data([
                'banner' =>  $this->banner,
                'company' => $company,
                'about_image' => $about_image->image,
                'courses' => $courses,
            ])
            ->view($this->view_prefix.'home', true)
            ->output();
    }
}
