<?php

declare(strict_types=1);

namespace App\NYTimes\Application\Query\Handler;

use App\NYTimes\Application\Query\Message\GetArticleCollectionQueryMessage;
use App\NYTimes\Domain\ReadModel\Repository\ArticleRepositoryInterface;
use App\NYTimes\Domain\ReadModel\ViewModel\ArticleCollectionViewModel;
use App\Shared\Infrastructure\CQRS\Contract\QueryHandler;

class GetArticleCollectionQueryHandler implements QueryHandler
{
    public function __construct(
        private ArticleRepositoryInterface $articleRepository
    ) {
    }

    public function __invoke(GetArticleCollectionQueryMessage $message): ArticleCollectionViewModel
    {
        return $this->articleRepository->findArticleCollection($message->articleFilter());
    }
}
