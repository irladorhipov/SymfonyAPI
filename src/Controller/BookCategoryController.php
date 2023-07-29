<?php

namespace App\Controller;

use App\Service\BookCategoryService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BookCategoryController extends AbstractController
{
    private BookCategoryService $bookCategoryService;

    public function __construct(BookCategoryService $bookCategoryService)
    {
        $this->bookCategoryService = $bookCategoryService;
    }

    #[Route('api/v1/book/categories')]
    public function categories(): Response
    {
        return $this->json($this->bookCategoryService->getCategories());
    }
}