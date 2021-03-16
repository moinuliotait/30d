<?php


namespace App\Repositories\Rules;


use App\Repositories\Content\ContentRepositoryInterface;
use App\Repositories\ContentTypeCategory\ContentTypeCategoryRepositoryInterface;
use Illuminate\Database\Eloquent\Model;

class RulesRepository extends \App\Repositories\BasicRepository implements RulesRepositoryInterface
{

    /**
     * @var ContentRepositoryInterface
     */
    private $content;
    /**
     * @var ContentTypeCategoryRepositoryInterface
     */
    private $categoryType;

    public function __construct(
        Model $model,
        ContentTypeCategoryRepositoryInterface $contentTypeCategoryRepository,
        ContentRepositoryInterface $contentRepository

    )
    {
        parent::__construct($model);
        $this->content = $contentRepository;
        $this->categoryType = $contentTypeCategoryRepository;
    }


    public function  createRulesNew($data)
    {
        $result = $this->model;

        $result['title'] = $data['title'];
        $result['description'] = $this->content->convertFile($data);

        $category = $this->categoryType->getWithId($data['category_id']);
        $result->categoryType()->associate($category);

        $result->save();
        return $result;

    }
    public function getRulesList()
    {
        return $this->model
            ->with('categoryType')
            ->OrderBy('created_at', 'asc')
            ->paginate(15);
    }
    public function getSingleItem($id)
    {
        return $this->model
            ->where('id', $id)
            ->first();
    }


}
