<?php

declare(strict_types=1);

namespace App\NYTimes\Domain\ReadModel\ViewModel;

use DateTimeInterface;
use Symfony\Component\Serializer\Annotation\Groups;

class ArticleViewModel
{
    #[Groups(['default'])]
    private string $title;
    #[Groups(['default'])]
    private string $lead;
    #[Groups(['default'])]
    private DateTimeInterface $publicationDate;
    #[Groups(['default'])]
    private ?string $image;
    #[Groups(['default'])]
    private string $url;
    #[Groups(['more'])]
    private string $section;
    #[Groups(['more'])]
    private ?string $subsection;

    public function __construct(
        string $title,
        DateTimeInterface $publicationDate,
        string $lead,
        ?string $image,
        string $url,
        string $section,
        ?string $subsection
    ) {
        $this->title = $title;
        $this->publicationDate = $publicationDate;
        $this->lead = $lead;
        $this->image = $image;
        $this->url = $url;
        $this->section = $section;
        $this->subsection = $subsection;
    }

    public function title(): string
    {
        return $this->title;
    }

    public function lead(): string
    {
        return $this->lead;
    }

    public function publicationDate(): DateTimeInterface
    {
        return $this->publicationDate;
    }

    public function image(): ?string
    {
        return $this->image;
    }

    public function url(): string
    {
        return $this->url;
    }

    public function section(): string
    {
        return $this->section;
    }

    public function subsection(): ?string
    {
        return $this->subsection;
    }
}
