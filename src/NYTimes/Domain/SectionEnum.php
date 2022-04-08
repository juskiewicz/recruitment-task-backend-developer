<?php

declare(strict_types=1);

namespace App\NYTimes\Domain;

enum SectionEnum: string
{
    case ADVENTURE_SPORTS = 'Adventure Sports';
    case ARTS_LEISURE = 'Arts & Leisure';
    case ARTS = 'Arts';
    case AUTOMOBILES = 'Automobiles';
}
