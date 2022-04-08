<?php

declare(strict_types=1);

namespace App\NYTimes\Application\Query\Filter\Enum;

Enum SortEnum: string
{
    case NEWEST = 'newest';
    case OLDEST = 'oldest';
}
