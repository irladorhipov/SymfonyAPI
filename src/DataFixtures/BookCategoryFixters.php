<?php

namespace App\DataFixtures;

use App\Entity\BookCategory;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class BookCategoryFixters extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $bookCategory = new BookCategory();
        $manager->persist((new BookCategory())->setTitle('Android')->setSlug('android'));
        $manager->persist((new BookCategory())->setTitle('IOS')->setSlug('ios'));
        $manager->persist((new BookCategory())->setTitle('PHP')->setSlug('php'));
        $manager->flush();
    }
}
