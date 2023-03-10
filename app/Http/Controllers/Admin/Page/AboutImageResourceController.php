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
class AboutImageResourceController extends BaseController
{
    public function __construct(PageRepositoryInterface $page)
    {
        parent::__construct($page);
        $this->slug = 'about-image';
        $this->category_id = 25;
        $this->url = guard_url('page/about_image/show');
        $this->title = '插图';
        $this->view_folder = 'page.about_image';
    }
}