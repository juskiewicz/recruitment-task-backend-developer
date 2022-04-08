<?php

declare(strict_types=1);

namespace App\Tests\Functional;

use Symfony\Bundle\FrameworkBundle\KernelBrowser;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\DependencyInjection\ContainerInterface;

abstract class FunctionalTestCase extends WebTestCase
{
    protected KernelBrowser $client;
    protected string $apiKey;

    protected function setUp(): void
    {
        parent::setUp();
        $this->client = static::createClient();
        $this->apiKey = 'MY-PRIVATE-API-KEY';
    }
}
