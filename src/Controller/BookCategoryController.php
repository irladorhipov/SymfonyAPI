<?php

namespace App\Controller;

use App\Service\BookCategoryService;
use Nelmio\ApiDocBundle\Annotation\Model;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Model\BookCategoryListResponse;
use OpenApi\Annotations as OA;

class BookCategoryController extends AbstractController
{
    private BookCategoryService $bookCategoryService;

    public function __construct(BookCategoryService $bookCategoryService)
    {
        $this->bookCategoryService = $bookCategoryService;
    }

    /** 
     * @OA\Response(
     *      response=200, 
     *      description="Return book categories",
     *      @model(type=BookCategoryListResponse::class)
     * )
     */
    #[Route(path: 'api/v1/book/categories', methods: ['GET'])]
    public function categories(): Response
    {
        return $this->json($this->bookCategoryService->getCategories());
    }
}