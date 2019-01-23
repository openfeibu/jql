<?php

namespace App\Http\Controllers\Wap;

use App\Http\Controllers\Controller;
use Dingo\Api\Routing\Helpers;
use Illuminate\Support\Facades\Hash;
use App\Traits\Theme\ThemeAndViews;

class BaseController extends Controller
{
    use Helpers,ThemeAndViews;

    public function __construct()
    {
        $this->response = app(ResourceResponse::class);
        $this->setTheme();
    }
}
