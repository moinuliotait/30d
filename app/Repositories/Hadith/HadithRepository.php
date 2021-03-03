<?php


namespace App\Repositories\Hadith;


use App\Repositories\Content\ContentRepositoryInterface;
use App\Repositories\ContentType\ContentTypeRepositoryInterface;
use Illuminate\Database\Eloquent\Model;

class HadithRepository extends \App\Repositories\BasicRepository implements HadithRepositoryInterface
{
    /**
     * @var ContentTypeRepositoryInterface
     */
    private $content;
    public function __construct(Model $model,
                                ContentRepositoryInterface $contentRepository
        )
    {
        parent::__construct($model);
        $this->content = $contentRepository;
    }

    public function createHadith($data)
    {
        $value = $this->model;
        $value['title'] = $data['title'];
        $value['short_description'] = $data['short_description'];
        $value['medium_description'] = $data['medium_description'];
        $value['visible_time'] = $data['visible_time'];
        $value['description'] = $this->content->converFIle($data);
        $value['featured_image'] = $data['image']->store('hadith','public');
        $value->save();
        return $value;
    }

    public function getAllHadith()
    {
        return $this->model->orderBy('created_at','desc')->paginate(16);
    }

}
