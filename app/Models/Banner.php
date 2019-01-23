<?php

namespace App\Models;

use Spatie\Activitylog\Traits\LogsActivity;
use App\Models\BaseModel;
use App\Traits\Database\Slugger;
use App\Traits\Filer\Filer;
use App\Traits\Hashids\Hashids;
use App\Traits\Trans\Translatable;

class Banner extends BaseModel
{
    use Filer, Hashids, Slugger, Translatable, LogsActivity;

    public $timestamps = false;

    /**
     * Configuartion for the model.
     *
     * @var array
     */
    protected $config = 'model.banner.banner';

    public function getBannersBySlug($slug)
    {
        return $this->join('page_categories as p_cate','p_cate.id', '=', 'banners.category_id')
            ->where('p_cate.slug',$slug)
            ->orderBy('banners.order','asc')
            ->orderBy('banners.id','asc')
            ->select('banners.*')
            ->get();
    }

}