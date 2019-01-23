<?php

namespace App\Repositories\Eloquent;

use App\Repositories\Eloquent\MessageRepositoryInterface;
use App\Repositories\Eloquent\BaseRepository;

class MessageRepository extends BaseRepository implements MessageRepositoryInterface
{
    public $fieldSearchable = ['company'];
    public function model()
    {
        return config('model.message.message.model');
    }
}