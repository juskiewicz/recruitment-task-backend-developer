<?php

declare(strict_types=1);

namespace App\NYTimes\Infrastructure\Api;

use App\NYTimes\Application\Query\Filter\ArticleFilter;
use App\NYTimes\Domain\ReadModel\Repository\ArticleRepositoryInterface;
use App\NYTimes\Domain\ReadModel\ViewModel\ArticleCollectionViewModel;
use App\NYTimes\Infrastructure\Api\Enum\EndpointEnum;
use App\NYTimes\Infrastructure\Api\Factory\ArticleCollectionFactory;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class ArticleRepository implements ArticleRepositoryInterface
{
    public function __construct(
        private ArticleCollectionFactory $articleCollectionFactory,
        private HttpClientInterface $nytimesClient,
        private string $apiKey
    ) {
    }

    public function findArticleCollection(ArticleFilter $articleFilter): ArticleCollectionViewModel
    {
        $fq = sprintf('section_name:("%s")', $articleFilter->section()->value);

        if ($articleFilter->queryToFindInBody()) {
            $fq .= sprintf(' AND body:("%s")', $articleFilter->queryToFindInBody());
        }

        $response = $this->nytimesClient->request(
            'GET',
            EndpointEnum::ARTICLE_SEARCH->value,
            [
                'query' => [
                    'fl' => 'headline,multimedia,pub_date,lead_paragraph,web_url,section_name,subsection_name',
                    'fq' => $fq,
                    'page' => $articleFilter->page(),
                    'sort' => $articleFilter->sort()->value,
                    'api-key' => $this->apiKey,
                ],
            ]
        );

        return $this->articleCollectionFactory->createFromResponse($response);
    }
}
