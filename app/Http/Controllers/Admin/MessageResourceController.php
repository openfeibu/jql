<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\ResourceController as BaseController;
use App\Models\Message;
use Illuminate\Http\Request;
use Mockery\CountValidator\Exception;
use App\Repositories\Eloquent\MessageRepositoryInterface;

/**
 * Resource controller class for page.
 */
class MessageResourceController extends BaseController
{
    /**
     * Initialize page resource controller.
     *
     * @param type MessageRepositoryInterface $message
     *
     */
    public function __construct(MessageRepositoryInterface $message)
    {
        parent::__construct();
        $this->repository = $message
            ->pushCriteria(\App\Repositories\Criteria\RequestCriteria::class)
            ->pushCriteria(\App\Repositories\Criteria\PageResourceCriteria::class);
    }
    public function index(Request $request){
        $limit = $request->input('limit',config('app.limit'));
        if ($this->response->typeIs('json')) {
            $data = $this->repository
                ->orderBy('id','desc')
                ->paginate($limit);

            return $this->response
                ->success()
                ->count($data->total())
                ->data($data->toArray()['data'])
                ->output();
        }
        return $this->response->title(trans('app.admin.panel'))
            ->view('message.index')
            ->output();
    }
    public function create(Request $request)
    {

    }
    public function store(Request $request)
    {

    }
    public function show(Request $request,Message $message)
    {

    }
    public function update(Request $request,Message $message)
    {

    }
    public function destroy(Request $request,Message $message)
    {
        try {
            $this->repository->forceDelete([$message->id]);

            return $this->response->message(trans('messages.success.deleted'))
                ->status("success")
                ->code(202)
                ->url(guard_url('/message'))
                ->redirect();

        } catch (Exception $e) {

            return $this->response->message($e->getMessage())
                ->status("error")
                ->code(400)
                ->url(guard_url('/message'))
                ->redirect();
        }
    }
    public function destroyAll(Request $request)
    {
        try {
            $data = $request->all();
            $ids = $data['ids'];
            $this->repository->forceDelete($ids);

            return $this->response->message(trans('messages.success.deleted'))
                ->status("success")
                ->code(202)
                ->url(guard_url('/message'))
                ->redirect();

        } catch (Exception $e) {

            return $this->response->message($e->getMessage())
                ->status("error")
                ->code(400)
                ->url(guard_url('/message'))
                ->redirect();
        }
    }

}