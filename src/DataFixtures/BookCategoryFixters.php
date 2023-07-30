<?php

namespace App\DataFixtures;

use App\Entity\BookCategory;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class BookCategoryFixters extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $book = new BookCategory();
        $manager->persist($book->setTitle('Android')->setSlug('android'));
        $manager->persist($book->setTitle('IOS')->setSlug('ios'));
        $manager->persist($book->setTitle('PHP')->setSlug('php'));
        $manager->flush();
    }
}
