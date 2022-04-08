<?php

declare(strict_types=1);

namespace App\NYTimes\Infrastructure\Api\Mapper;

use App\NYTimes\Domain\ReadModel\ViewModel\ArticleViewModel;
use App\NYTimes\Infrastructure\Api\Enum\MultimediaSubTypeEnum;
use DateTimeImmutable;

class ArticleMapper
{
    public function mapDataToArticleViewModel(array $data): ArticleViewModel
    {
        return new ArticleViewModel(
            $data['headline']['main'],
            new DateTimeImmutable($data['pub_date']),
            $data['lead_paragraph'],
            $this->findImageInMultimediaSuperJumbo($data['multimedia']),
            $data['web_url'],
            $data['section_name'],
            $data['subsection_name'] ?? null,
        );
    }

    private function findImageInMultimediaSuperJumbo(array $multimedia): ?string
    {
        foreach ($multimedia as $row) {
            if ($row['subType'] === MultimediaSubTypeEnum::SUPER_JUMBO->value) {
                return $row['url'];
            }
        }

        return null;
    }
}
