<?php

declare(strict_types=1);

namespace App\NYTimes\Domain\ReadModel\ViewModel;

class ArticleCollectionViewModel
{
    public array $articles;

    public function __construct(
        array $articles
    ) {
        $this->articles = $articles;
    }

    public function toArray(): array
    {
        return $this->articles;
    }
}
