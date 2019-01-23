<?php

namespace App\Http\Controllers\Base;

use Log,Tree;
use Illuminate\Http\Request;
use App\Models\Nav;
use App\Http\Controllers\Base\BaseController;
use App\Repositories\Eloquent\PageRepositoryInterface;
use App\Repositories\Eloquent\CourseRepositoryInterface;
use App\Repositories\Eloquent\RecruitCategoryRepositoryInterface;
use App\Repositories\Eloquent\PageRecruitRepositoryInterface;

class JoinController extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        $this->banner_image = app(Nav::class)->where('slug',app(Request::class)->route()->getName())->value('image');
        $this->banner = $this->banner_image ? url('image/original'.$this->banner_image) : '';
        $this->page_repository = app(PageRepositoryInterface::class);
        $this->recruit_category_repository = app(RecruitCategoryRepositoryInterface::class);
        $this->recruit_repository = app(PageRecruitRepositoryInterface::class);
        $this->view_prefix = 'join.';
    }
    public function home(Request $request)
    {
        $categories = $this->recruit_category_repository
            ->orderBy('order','asc')
            ->orderBy('id','asc')
            ->all()
            ->toArray();
        $recruit_list = [];
        $i = 1;
        foreach ($categories as $key => $category)
        {
            $recruits = $this->recruit_repository
                ->where(['category_id' => $category['id']])
                ->orderBy('order','asc')
                ->orderBy('id','asc')
                ->all()
                ->toArray();
            $recruit_list[$i]['category'] = $category;
            $recruit_list[$i]['recruits'] = $recruits;
            $i++;
        }
        return $this->response->title('加入我们')
            ->data([
                'banner' =>  $this->banner,
                'recruit_list' => $recruit_list,
            ])
            ->view($this->view_prefix.'home', true)
            ->output();
    }
}
