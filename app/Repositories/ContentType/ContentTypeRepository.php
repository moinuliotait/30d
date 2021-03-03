<?php


namespace App\Repositories\ContentType;


class ContentTypeRepository extends \App\Repositories\BasicRepository implements ContentTypeRepositoryInterface
{


    public function findData($data)
    {
        return $this->model->find($data);
    }

    public function lifeStyleType()
    {
        return $this->model->where('content_type','lifestyle')->first();
    }

    public function educativeType()
    {
        return $this->model->where('content_type','educative')->first();
    }
}
