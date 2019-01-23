<?php

namespace App\Http\Controllers\Wap;

use Log;
use Illuminate\Http\Request;
use App\Http\Controllers\Base\HomeController as BaseHomeController;
use App\Repositories\Eloquent\BannerRepositoryInterface;
use App\Models\Banner;
use App\Models\Link;

class HomeController extends BaseHomeController
{
    public function __construct(BannerRepositoryInterface $banner_repository)
    {
        $this->banner_repository = $banner_repository;
        parent::__construct();
    }
    public function home(Request $request)
    {
        $banners = app(Banner::class)->getBannersBySlug('banner_pc');
        return $this->response->title(trans('app.home'))
            ->data(compact('banners'))
            ->view('home', true)
            ->layout('home')
            ->output();
    }
}
