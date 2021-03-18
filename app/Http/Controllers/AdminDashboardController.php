<?php

namespace App\Http\Controllers;

use App\Repositories\Content\ContentRepositoryInterface;
use App\Repositories\Hadith\HadithRepositoryInterface;
use App\Repositories\lifeStyle\LifeStyleRepositoryInterface;
use App\Repositories\NewsPortal\NewsPortalRepositoryInterface;
use App\Repositories\Rules\RulesRepositoryInterface;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    /**
     * @var LifeStyleRepositoryInterface
     */
    private $content;
    /**
     * @var HadithRepositoryInterface
     */
    private $hadith;
    /**
     * @var NewsPortalRepositoryInterface
     */
    private $news;
    /**
     * @var RulesRepositoryInterface
     */
    private $rules;

    public function __construct(
        ContentRepositoryInterface $contentRepository,
        HadithRepositoryInterface $hadithRepository,
        NewsPortalRepositoryInterface $newsPortalRepository,
        RulesRepositoryInterface $rulesRepository
    )
    {
        $this->content = $contentRepository;
        $this->hadith = $hadithRepository;
        $this->news = $newsPortalRepository;
        $this->rules =$rulesRepository;
    }
    public function index()
    {
        $life = $this->content->contentTypeCount('lifestyle');
        $educate = $this->content->contentTypeCount('educative');
        $hadith =  $this->hadith->hadithCount();
        $news = $this->news->newsCount();
        $rules = $this->rules->rulesCount();
        return view('pages.newDashboard',[
            'life'=>$life,
            'educate'=>$educate,
            'hadith'=>$hadith,
            'news'=>$news,
            'rules' => $rules
        ]);
    }
}
