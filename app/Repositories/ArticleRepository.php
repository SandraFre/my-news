<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Article;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class ArticleRepository
{
    public function createNew(array $data): Article
    {
        return Article::query()->create($data);
    }

    public function getActivePaginate(): LengthAwarePaginator
    {
        return Article::query()
            ->where('active', '=', true)
            ->orderBy('created_at', 'desc')
            ->paginate(10);
    }

    public function getActiveBySlug(string $slug): Article
    {
        return Article::query()
            ->where('active', '=', true)
            ->where('slug', '=', $slug)
            ->firstOrFail();
    }

    public function getPaginateByAccountId($accountId): LengthAwarePaginator
    {
        return Article::query()
            ->where('user_id', '=', $accountId)
            ->orderByDesc('created_at')
            ->paginate();
    }

    public function changeActive(int $id, bool $active = false): int
    {
        return Article::query()
            ->where('id', $id)
            ->update(['active' => $active]);
    }
}
