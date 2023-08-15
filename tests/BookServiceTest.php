<?php

namespace App\Tests;

use App\Entity\BookCategory;
use App\Exception\BookCategoryNotFoundException;
use App\Repository\BookCategoryRepository;
use App\Repository\BookRepository;
use App\Service\BookService;
use DateTime;
use Doctrine\Common\Collections\ArrayCollection;
use PHPUnit\Framework\TestCase;
use App\Entity\Book;
use App\Model\BookListItem;
use App\Model\BookListResponse;

class BookServiceTest extends TestCase
{
    public function testGetBooksByCategoryNotFound(): void
    {
        $bookRepository = $this->createMock(BookRepository::class);
        $bookCategoryRepository = $this->createMock(BookCategoryRepository::class);
        $bookCategoryRepository->expects($this->once())
            ->method('find')
            ->with(130);

        $this->expectException(BookCategoryNotFoundException::class);

        (new BookService($bookRepository, $bookCategoryRepository))->getBookByCategory(130);
    }

    public function testGetBooksByCategory(): void
    {
        $bookRepository = $this->createMock(BookRepository::class);
        $bookRepository->expects($this->once())
            ->method('findByCategoryId')
            ->with(130)
            ->willReturn([$this->createBookEntity()]);

        $bookCategoryRepository = $this->createMock(BookCategoryRepository::class);
        $bookCategoryRepository->expects($this->once())
            ->method('find')
            ->with(130)
            ->willReturn(new BookCategory());

        $service = (new BookService($bookRepository, $bookCategoryRepository)); 

        $excepted = new BookListResponse([$this->createBookItemModel()]);

        $this->assertEquals($excepted, $service->getBookByCategory(130));
    }

    private function createBookEntity(): Book
    {
        return (new Book)
            ->setId(123)
            ->setTitle('Test Book')
            ->setSlug('test book')
            ->setMeap(false)
            ->setAuthors(['Tester'])
            ->setCategories(new ArrayCollection())
            ->setImage('test')
            ->setPublicationDate(new DateTime('2020-10-10'));
    }

    private function createBookItemModel(): BookListItem
    {
        return (new BookListItem)
            ->setId(123)
            ->setTitle('Test Book')
            ->setSlug('test book')
            ->setMeap(false)
            ->setAuthors(['Tester'])
            ->setImage('test')
            ->setPublicationDate(1602273600);
    }
}
