<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Repositories\ArticleRepository;
use Illuminate\Http\Request;
use Illuminate\View\View;

class HomeController extends Controller
{
    private $articleRepository;

    public function __construct(ArticleRepository $articleRepository) {
        $this->articleRepository = $articleRepository;
    }

    public function __invoke(): View
    {
        $articles = $this->articleRepository->getActivePaginate();

        return view ('front.welcome', ['articles'=>$articles]);
    }
}
