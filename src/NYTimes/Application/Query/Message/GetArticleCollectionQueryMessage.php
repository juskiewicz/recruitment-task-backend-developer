<?php

declare(strict_types=1);

namespace App\NYTimes\Application\Query\Message;

use App\NYTimes\Application\Query\Filter\ArticleFilter;
use App\Shared\Infrastructure\CQRS\Contract\QueryMessage;

class GetArticleCollectionQueryMessage implements QueryMessage
{
    public function __construct(
        private ArticleFilter $articleFilter
    ) {
    }

    public function articleFilter(): ArticleFilter
    {
        return $this->articleFilter;
    }
}
