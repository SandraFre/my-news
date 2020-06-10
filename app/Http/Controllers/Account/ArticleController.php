<?php

declare(strict_types=1);

namespace App\Http\Controllers\Account;

use App\Article;
use App\Http\Controllers\Controller;
use App\Http\Requests\Front\Account\ArticleStoreRequest;
use App\Http\Requests\Front\Account\ArticleUpdateRequest;
use App\Repositories\ArticleRepository;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ArticleController extends Controller
{
    private $articleRepository;

    public function __construct(ArticleRepository $articleRepository)
    {
        $this->articleRepository = $articleRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): View
    {
        $accountId = auth()->user()->getAuthIdentifier();
        $articles = $this->articleRepository->getPaginateByAccountId($accountId);
        return view('front.account.article.list', ['items' => $articles]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(): View
    {
        return view('front.account.article.form');
    }


    public function store(ArticleStoreRequest $request): RedirectResponse
    {
        try {
            $this->articleRepository->createNew($request->getData());

            return redirect()->route('account.article.index')
                ->with('success', 'Article created');
        } catch (Exception $exception) {
            logger()->error($exception->getMessage(), $exception->getTrace());
            return back()->with('danger', 'Something is wrong. Please try again later')
                ->withInput();
        }
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article): View
    {
        return view('front.account.article.form', ['item' => $article]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(ArticleUpdateRequest $request, Article $article): RedirectResponse
    {
        try {
            $article->update($request->getData());

            return redirect()->route('account.article.index')
                ->with('success', 'Article updated');
        } catch (Exception $exception) {
            logger()->error($exception->getMessage(), $exception->getTrace());
            return back()->with('danger', 'Something is wrong. Please try again later')
                ->withInput();
        }
    }


}
