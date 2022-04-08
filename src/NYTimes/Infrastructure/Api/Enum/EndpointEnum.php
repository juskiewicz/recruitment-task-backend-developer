<?php

declare(strict_types=1);

namespace App\NYTimes\Infrastructure\Api\Enum;

enum EndpointEnum: string
{
    case ARTICLE_SEARCH = '/svc/search/v2/articlesearch.json';
}
