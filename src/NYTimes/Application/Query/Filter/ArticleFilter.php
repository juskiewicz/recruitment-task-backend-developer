<?php

declare(strict_types=1);

namespace App\NYTimes\Application\Query\Filter;

use App\NYTimes\Application\Query\Filter\Enum\SortEnum;
use App\NYTimes\Domain\SectionEnum;

class ArticleFilter
{
    public function __construct(
        private SectionEnum $section,
        private SortEnum $sort,
        private ?string $queryToFindInBody = null,
        private int $page = 1,
        private int $limit = 10,
    ) {
    }

    public function section(): SectionEnum
    {
        return $this->section;
    }

    public function sort(): SortEnum
    {
        return $this->sort;
    }

    public function queryToFindInBody(): ?string
    {
        return $this->queryToFindInBody;
    }

    public function page(): int
    {
        return $this->page;
    }

    public function limit(): int
    {
        return $this->limit;
    }
}
