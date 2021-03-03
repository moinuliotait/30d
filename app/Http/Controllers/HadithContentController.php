<?php

namespace App\Http\Controllers;

use App\Http\Requests\Hadith\HadithCreateRequest;
use App\Http\Requests\Hadith\HadithUpdateRequest;
use App\Repositories\Content\ContentRepositoryInterface;
use App\Repositories\Hadith\HadithRepositoryInterface;
use Illuminate\Http\Request;

class HadithContentController extends Controller
{
    /**
     * @var HadithRepositoryInterface
     */
    private $hadith;

    public function __construct(HadithRepositoryInterface $hadithRepository)
    {
        $this->hadith = $hadithRepository;
    }

    public function index()
    {
        $contents = $this->hadith->getAllHadith();
        return view('Hadith.index', ['contents' => $contents]);
    }

    public function createPageShow()
    {
        return view('Hadith.create-hadith');
    }

    public function createHadith(HadithCreateRequest $request)
    {
        $data = $request->only('title', 'short_description', 'medium_description', 'content', 'image', 'visible_time');
        try {
            $hadith = $this->hadith->createHadith($data);
            return redirect()->route('hadith')->with('message', 'Hadith add successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('message', 'Something went wrong Please try again');
        }
    }

    public function editHadithPageShow($id)
    {
        $data = $this->hadith->getItemWithId($id);
        return view('Hadith.edit-page', ['data' => $data]);
    }

    public function updateHadith(HadithUpdateRequest $request)
    {
        $data = $request->only('title', 'short_description', 'medium_description', 'content', 'image', 'visible_time', 'id');
        try {
            $update = $this->hadith->updateHadith($data);
            return redirect()->route('hadith')->with('message', 'Hadith add successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('message', 'Something went wrong Please try again');
        }
    }

    public function deleteHadith($id)
    {
        try {
            $this->hadith->deleteItemWithId($id);
            return redirect()->back()->with('message', 'Hadith delete successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('message', 'Something went wrong Please try again');
        }
    }
}
