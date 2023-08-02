<?php

namespace App\Tests;

use App\Entity\BookCategory;
use App\Model\BookCategoryListItem;
use App\Model\BookCategoryListResponse;
use App\Repository\BookCategoryRepository;
use App\Service\BookCategoryService;
use Doctrine\Common\Collections\Criteria;
use PHPUnit\Framework\TestCase;

class BookCategoryServiceTest extends TestCase
{
    public function testSomething(): void
    {
        $repository = $this->createMock(BookCategoryRepository::class);
        $repository->expects($this->once())
            ->method('findBy')
            ->with([], ['title' => Criteria::ASC])
            ->willReturn([(new BookCategory())->setId(8)->setTitle('Test')->setSlug('test')]);

        $service = new BookCategoryService($repository);
        $exptected = new BookCategoryListResponse([new BookCategoryListItem(8, 'Test', 'test')]);
        
        $this->assertEquals($exptected, $service->getCategories());
    }
} 