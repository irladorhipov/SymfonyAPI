<?php

namespace App\Service;

use App\Model\BookListResponse;
use App\Repository\BookCategoryRepository;
use App\Repository\BookRepository;
use App\Exception\BookCategoryNotFoundException;
use App\Model\BookListItem;
use App\Entity\Book;
 
class BookService
{
    private $bookRepository;
    private $bookCategoryRepository;

    public function __construct(BookRepository $bookRepository, BookCategoryRepository $bookCategoryRepository)
    {
        $this->bookRepository = $bookRepository;
        $this->bookCategoryRepository = $bookCategoryRepository;
    }

    public function getBookByCategory(int $categoryId): BookListResponse
    {
        $category = $this->bookCategoryRepository->find($categoryId);
        if (null === $category) {
            Throw new BookCategoryNotFoundException();
        }

        return new BookListResponse(array_map(
            [$this, 'map'],
            $this->bookRepository->findBooksByCategoryId($categoryId)
        ));
    }

    private function map(Book $book): BookListItem
    {
        return (new BookListItem)
            ->setId($book->getId())
            ->setTitle($book->getTitle())
            ->setSlug($book->getSlug())
            ->setImage($book->getIMage())
            ->setAuthors($book->getAuthors())
            ->setMeap($book->getMeap())
            ->setPublicationDate($book->getPublicationDate()->getTimestamp());


    // реализовать метод setId и дописать функцию
                            
    }
}