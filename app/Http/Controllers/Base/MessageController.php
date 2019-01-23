<?php

namespace App\Http\Controllers\Base;

use Log,Tree,Validator,Mail;
use Illuminate\Http\Request;
use App\Models\Nav;
use App\Http\Response\ResourceResponse;
use App\Http\Controllers\Base\BaseController;
use App\Repositories\Eloquent\MessageRepositoryInterface;

class MessageController extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        $this->message_repository = app(MessageRepositoryInterface::class);
        $this->response = app(ResourceResponse::class);
    }
    public function store(Request $request)
    {
        $rules = [
            'company' => 'required',
            'name' => 'required',
            'tel' =>  ['required', 'regex:/^(1[34578]\d{9})|((\(\d{3,4}\)|\d{3,4}-|\s)?\d{7,14})$/'],
            'content' => 'required',
        ];
        $messages = [
            'company.required' => '公司必填',
            'name.required' => '姓名必填',
            'tel.required' => '电话必填',
            'tel.regex' => '电话格式不正确',
            'content.required' => '内容必填',
        ];
        $validator = Validator::make($request->all(), $rules,$messages);
        if ($validator->fails()) {
            return $this->response->message($validator->errors()->first())
                ->status("error")
                ->code(400)
                ->url(url('/#contact'))
                ->redirect();
        }
        $data = $request->all();
        $data['ip'] = $request->getClientIp();

        $this->message_repository->create($data);

        $to = setting('email');
        $subject = '您收到一条来自'.$data['company'].'的留言信息';

        $flag = Mail::send('emails.message',['data' => $data],function($message) use($subject,$to)
        {
            $to = $to;
            $message ->to($to)->subject($subject);
        });

        return $this->response->message('感谢您的留言，信息已发送成功')
            ->status("success")
            ->url(url('/#contact'))
            ->redirect();
    }
}