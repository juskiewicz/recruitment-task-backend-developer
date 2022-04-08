<?php

namespace App\Tests\Functional\NYTimes\UI\Http\Rest\Controller;

use App\Tests\Functional\FunctionalTestCase;

class AutomotiveArticlesSearchControllerTest extends FunctionalTestCase
{
    public function testGetArticleCollectionUnauthorized(): void
    {
        $this->client->request('GET', '/nytimes/testing');

        self::assertEquals(401, $this->client->getResponse()->getStatusCode());
    }

    public function testGetArticleCollectionAuthorized(): void
    {
        $this->client->request('GET', '/nytimes/testing', [], [], ['HTTP_X_API_KEY' => $this->apiKey]);

        self::assertEquals(200, $this->client->getResponse()->getStatusCode());
    }
}
