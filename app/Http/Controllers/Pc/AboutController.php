<?php

namespace App\Http\Controllers\Pc;

use Log;
use Illuminate\Http\Request;
use App\Http\Controllers\Base\AboutController as BaseAboutController;

class AboutController extends BaseAboutController
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
