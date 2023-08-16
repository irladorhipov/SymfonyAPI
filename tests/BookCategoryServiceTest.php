<?php

namespace App\Tests;

use App\Entity\BookCategory;
use App\Model\BookCategoryListItem;
use App\Model\BookCategoryListResponse;
use App\Repository\BookCategoryRepository;
use App\Service\BookCategoryService;
use Doctrine\Common\Collections\Criteria;

class BookCategoryServiceTest extends AbstractTestCase
{
    const ENTITY_ID = 7;

    public function testSomething(): void
    {
        $category = (new BookCategory())->setTitle('Test')->setSlug('test');
        $this->setEntityId($category, self::ENTITY_ID);

        $repository = $this->createMock(BookCategoryRepository::class);
        $repository->expects($this->once())
            ->method('findBy')
            ->with([], ['title' => Criteria::ASC])
            ->willReturn([]);

        $service = new BookCategoryService($repository);
        $exptected = new BookCategoryListResponse([new BookCategoryListItem(8, 'Test', 'test')]);
        
        $this->assertEquals($exptected, $service->getCategories());
    }
} 