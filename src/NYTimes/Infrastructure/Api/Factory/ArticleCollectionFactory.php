<?php

declare(strict_types=1);

namespace App\NYTimes\Infrastructure\Api\Factory;

use App\NYTimes\Domain\ReadModel\ViewModel\ArticleCollectionViewModel;
use App\NYTimes\Infrastructure\Api\Mapper\ArticleMapper;
use Symfony\Contracts\HttpClient\ResponseInterface;

class ArticleCollectionFactory
{
    public function __construct(
        private ArticleMapper $articleMapper
    ) {
    }

    public function createFromResponse(ResponseInterface $response): ArticleCollectionViewModel
    {
        return new ArticleCollectionViewModel(array_map(fn($data) => $this->articleMapper->mapDataToArticleViewModel($data), $this->responseData($response)));
    }

    private function responseData(ResponseInterface $response): array
    {
        return json_decode($response->getContent(), true)['response']['docs'];
    }
}
