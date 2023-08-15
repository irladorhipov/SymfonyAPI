<?php

namespace App\Tests;

use PHPUnit\Framework\TestCase;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class BookControllerTestPhpTest extends WebTestCase
{
    public function testBooksByCategory(): void
    {
        $client = static::createClient();
        $crawler = $client->request('GET', 'api/v1/category/1/books');
        $responseContent = $client->getResponse()->getContent();

        $this->assertResponseIsSuccessful();
        $this->assertJsonStringEqualsJsonFile(
            __DIR__ . '/responses/BookControllerTestPhpTest_testBooksByCategory.json',
            $responseContent
        );
    }
}
