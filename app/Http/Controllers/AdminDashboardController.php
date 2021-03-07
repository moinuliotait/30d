<?php

namespace App\Http\Controllers;

use App\Repositories\Content\ContentRepositoryInterface;
use App\Repositories\Hadith\HadithRepositoryInterface;
use App\Repositories\lifeStyle\LifeStyleRepositoryInterface;
use App\Repositories\NewsPortal\NewsPortalRepositoryInterface;
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

    public function __construct(
        ContentRepositoryInterface $contentRepository,
        HadithRepositoryInterface $hadithRepository,
        NewsPortalRepositoryInterface $newsPortalRepository
    )
    {
        $this->content = $contentRepository;
        $this->hadith = $hadithRepository;
        $this->news = $newsPortalRepository;
    }
    public function index()
    {
        $life = $this->content->contentTypeCount('lifestyle');
        $educate = $this->content->contentTypeCount('educative');
        $hadith =  $this->hadith->hadithCount();
        $news = $this->news->newsCount();
        return view('pages.newDashboard',[
            'life'=>$life,
            'educate'=>$educate,
            'hadith'=>$hadith,
            'news'=>$news
        ]);
    }
}
