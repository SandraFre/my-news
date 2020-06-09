<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Repositories\ArticleRepository;
use Exception;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ArticleController extends Controller
{
    private $articleRepository;

    public function __construct(ArticleRepository $articleRepository)
    {
        $this->articleRepository = $articleRepository;
    }

    public function show(string $slug): View
    {
        // try {
            $article = $this->articleRepository->getActiveBySlug($slug);

            return view('front.article', ['article' => $article]);
        // } catch (Exception $exception) {
        //     //throw $th;
        // }

    }
}
