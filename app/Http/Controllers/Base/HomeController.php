<?php

namespace App\Http\Controllers\Base;

use Log,Tree;
use Illuminate\Http\Request;
use App\Http\Controllers\Base\BaseController;
use App\Repositories\Eloquent\PageRepositoryInterface;

class HomeController extends BaseController
{
    public function __construct()
    {
        parent::__construct();
    }
    public function home(Request $request)
    {
        return $this->response->title('')
            ->view('home', true)
            ->output();
    }
}
