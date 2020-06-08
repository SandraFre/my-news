<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Article;

class ArticleRepository
{
    public function createNew(array $data): Article
    {
        return Article::query()->create($data);
    }
}
