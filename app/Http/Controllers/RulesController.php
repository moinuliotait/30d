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

        return view('rules.index', ['rules' => $rules]);
    }
    public function create(Request $request)
    {
        $category = $this->contentType->getCategoryList('rules');
        return view('rules.create',['category'=>$category]);
    }

    public function createRules(Request $request)
    {
        $data = $request->only('title','content','category_id');
        $result = $this->rules->createRulesNew($data);
        return redirect()->route('rules')->with('message','Rules create successful');
    }
    public function edit($id)
    {
        $rulesData = $this->rules->getSingleItem($id);
        $category = $this->contentType->getCategoryList('rules');
        return view('rules.edit', ['rulesData' => $rulesData,'category'=>$category]);
    }
    public function update(Request $request)
    {
        $data = $request->only('id','title','content','category_id');

        try {
            $result = $this->rules->updateRules($data);
            return redirect()->route('rules')->with('message', 'News Update successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('message', 'Something went wrong,Please try again letter');
        }
    }
    public function delete($id)
    {
        $delete = $this->rules->deleteItem($id);
        return redirect()->back()->with('message', 'Item delete successfully');
    }
}
