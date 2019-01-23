<?php

namespace App\Http\Controllers\Wap;

use Log;
use Illuminate\Http\Request;
use App\Http\Controllers\Base\ServiceController as BaseServiceController;

class ServiceController extends BaseServiceController
{
    public function __construct()
    {
        parent::__construct();
    }
    public function home(Request $request)
    {
        return parent::home($request);
    }
}
