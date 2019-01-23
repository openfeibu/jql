<?php

namespace App\Http\Controllers\Wap;

use Log;
use Illuminate\Http\Request;
use App\Http\Controllers\Base\MessageController as BaseMessageController;

class MessageController extends BaseMessageController
{
    public function __construct()
    {
        parent::__construct();
    }
    public function store(Request $request)
    {
        return parent::store($request);
    }
}
