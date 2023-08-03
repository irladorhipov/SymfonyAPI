<?php

namespace App\Service;

use App\Model\BookListResponse;
use App\Repository\BookCategoryRepository;
use App\Repository\BookRepository;

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
        $category = $this->bookCategoryRepository->find($category);
        if (null === $category) {
            
        }
    }
}