<?php

namespace App\Http\Controllers\Base;

//use App\Http\Requests\Request;
use Route,Agent,URL,Redirect;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Dingo\Api\Routing\Helpers;
use Illuminate\Support\Facades\Hash;
use App\Traits\Theme\ThemeAndViews;
use App\Http\Response\ResourceResponse;

class BaseController extends Controller
{
    use Helpers,ThemeAndViews;

    public $response;

    public function __construct()
    {
        if(Agent::isMobile() && $_SERVER['HTTP_HOST'] != env('WAP_URL'))
        {
            header("location:".str_replace_first($_SERVER['HTTP_HOST'],env('WAP_URL'),URL::current()));
        }
        if(!Agent::isMobile() && $_SERVER['HTTP_HOST'] == env('WAP_URL'))
        {
            header("location:".str_replace_first($_SERVER['HTTP_HOST'],env('PC_URL'),URL::current()));
        }
        $this->response = app(ResourceResponse::class);
        // 根据路由分组命名决定调用视图模板
        $route = Route::currentRouteName();
        $prefix = strstr($route, '.', TRUE);
        set_route_guard('web','user');
        $this->setTheme($prefix);
    }
}
