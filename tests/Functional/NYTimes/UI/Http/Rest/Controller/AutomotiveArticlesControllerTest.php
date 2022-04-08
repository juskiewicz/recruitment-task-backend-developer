<?php

namespace App\Tests\Functional\NYTimes\UI\Http\Rest\Controller;

use App\Tests\Functional\FunctionalTestCase;

class AutomotiveArticlesControllerTest extends FunctionalTestCase
{
    public function testGetArticleCollection(): void
    {
        $this->client->request('GET', '/nytimes');

        self::assertEquals(200, $this->client->getResponse()->getStatusCode());
    }
}
