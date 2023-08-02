<?php

namespace App\Tests;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class BookCategoryControllerTest extends WebTestCase
{
    public function testCategory(): void
    {
        $client = static::createClient();
        $crawler = $client->request('GET', 'api/v1/book/categories');
        $responseContent = $client->getResponse()->getContent();

        $this->assertResponseIsSuccessful();
        $this->assertJsonStringEqualsJsonFile(
            __DIR__ . '/responses/BookCategoryControllerTest_testCategory.json',
            $responseContent
        );
    }
}
