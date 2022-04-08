<?php

namespace App\Tests\NYTimes\Application\Query\Filter;

use App\NYTimes\Application\Query\Filter\ArticleFilter;
use App\NYTimes\Application\Query\Filter\Enum\SortEnum;
use App\NYTimes\Domain\SectionEnum;
use PHPUnit\Framework\TestCase;

class ArticleFilterTest extends TestCase
{
    public function testCreateArticleFilter(): void
    {
        $articleFilter = new ArticleFilter(
            SectionEnum::ADVENTURE_SPORTS,
            SortEnum::OLDEST,
            'paris',
            2,
            10
        );

        $this->assertEquals(SectionEnum::ADVENTURE_SPORTS, $articleFilter->section());
        $this->assertEquals(SortEnum::OLDEST, $articleFilter->sort());
        $this->assertEquals('paris', $articleFilter->queryToFindInBody());
        $this->assertEquals(2, $articleFilter->page());
        $this->assertEquals(10, $articleFilter->limit());
    }
}
