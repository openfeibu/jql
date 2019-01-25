<?php

namespace App\Http\Controllers\Admin\Page;

use App\Http\Controllers\Admin\SinglePageResourceController as BaseController;
use App\Http\Requests\PageRequest;
use Illuminate\Http\Request;
use App\Repositories\Eloquent\PageRepositoryInterface;
use App\Models\Page;

/**
 * Resource controller class for page.
 */
class ServicePcResourceController extends BaseController
{
    public function __construct(PageRepositoryInterface $page)
    {
        parent::__construct($page);
        $this->slug = 'service-pc';
        $this->category_id = 25;
        $this->url = guard_url('page/service_pc/show');
        $this->title = trans('page.service_pc.name');
        $this->view_folder = 'page.service_pc';
    }
}