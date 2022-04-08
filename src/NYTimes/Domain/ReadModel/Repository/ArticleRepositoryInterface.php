<?php

declare(strict_types=1);

namespace App\NYTimes\Domain\ReadModel\Repository;

use App\NYTimes\Application\Query\Filter\ArticleFilter;
use App\NYTimes\Domain\ReadModel\ViewModel\ArticleCollectionViewModel;

interface ArticleRepositoryInterface
{
    public function findArticleCollection(ArticleFilter $articleFilter): ArticleCollectionViewModel;
}
