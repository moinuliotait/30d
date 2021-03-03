<?php

namespace App\Http\Controllers;

use App\Models\ContentType;
use Illuminate\Http\Request;
use App\Repositories\Content\ContentRepositoryInterface;


class ContentController extends Controller
{
    /**
     * @var ContentRepositoryInterface
     */
    private $content;

    public function __construct(ContentRepositoryInterface $contentRepository) {
        $this->content   = $contentRepository;
    }

    public function getContentByType(Request $request)
    {
        return $this->content->getContentByType($request->type);
    }
}
