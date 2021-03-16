<?php

namespace App\Http\Controllers;

use App\Repositories\ContentTypeCategory\ContentTypeCategoryRepository;
use App\Repositories\ContentTypeCategory\ContentTypeCategoryRepositoryInterface;
use App\Repositories\Rules\RulesRepositoryInterface;
use Illuminate\Http\Request;

class RulesController extends Controller
{
    /**
     * @var RulesRepositoryInterface
     */
    private $rules;
    /**
     * @var ContentTypeCategoryRepository
     */
    private $contentType;

    public function __construct(
        RulesRepositoryInterface  $rulesRepository,
        ContentTypeCategoryRepositoryInterface $contentTypeCategoryRepository
    )
    {
        $this->rules = $rulesRepository;
        $this->contentType = $contentTypeCategoryRepository;
    }

    //
    public function index(Request $request)
    {
        $rules = $this->rules->getRulesList();

        return view('rules.index');
    }
    public function create(Request $request)
    {
        $cateroy = $this->contentType->getCategoryList('rules');
        return view('rules.create',['category'=>$cateroy]);
    }

    public function createRules(Request $request)
    {
        $data = $request->only('title','content','category_id');
        $result = $this->rules->createRulesNew($data);
        return redirect()->route('rules')->with('message','Rules create successful');
    }
}
