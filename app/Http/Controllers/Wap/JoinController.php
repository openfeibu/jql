<?php

namespace App\Http\Controllers\Wap;

use Log;
use Illuminate\Http\Request;
use App\Http\Controllers\Base\JoinController as BaseJoinController;

class JoinController extends BaseJoinController
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
