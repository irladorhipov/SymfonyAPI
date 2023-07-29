<?php

namespace App\Model;

class BookCategoryListResponse
{
    /**
     * @var BookCategoryListItem[]
     */
    private array $items;

    /**
     * @param BookCategoryListItem[] $item
     */
    public function __construct(array $items)
    {
        $this->items = $items;
    }

    /**
     * @return BookCategoryListItem[]
     */
    public function getItems()
    {
        return $this->items;
    }

}