<?php

declare(strict_types=1);

namespace App\NYTimes\UI\Http\Rest\Controller;

use App\NYTimes\Application\Query\Filter\ArticleFilter;
use App\NYTimes\Application\Query\Filter\Enum\SortEnum;
use App\NYTimes\Application\Query\Message\GetArticleCollectionQueryMessage;
use App\NYTimes\Domain\SectionEnum;
use App\Shared\Infrastructure\CQRS\Contract\QueryBus;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/nytimes', methods: 'GET',  name: 'nytimes_automotive_articles')]
class AutomotiveArticlesController extends AbstractController
{
    public function __construct(
        private QueryBus $queryBus,
    ) {
    }

    public function __invoke(): JsonResponse
    {
        $articleCollection = $this->queryBus->handle(new GetArticleCollectionQueryMessage(new ArticleFilter(SectionEnum::AUTOMOBILES, SortEnum::NEWEST)));

        return $this->json(
            $articleCollection->toArray(),
            Response::HTTP_OK,
            [],
            ['groups' => ['default']]
        );
    }
}
