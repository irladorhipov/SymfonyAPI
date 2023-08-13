<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use DateTime;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Book;

class BookFixture extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $androidCategory = $this->getReference(BookCategoryFixture::ANDROID_CATEGORY);
        $devicesCategory = $this->getReference(BookCategoryFixture::DEVICES_CATEGORY);

        $book = (new Book)
                    ->setTitle('RxJava for android developers')
                    ->setPublicationDate(new DateTime('2019-04-01'))
                    ->setMeap(false)
                    ->setAuthors(['Timo Tuominen'])
                    ->setSlug('rxJava for android developers')
                    ->setCategories(new ArrayCollection([$androidCategory, $devicesCategory]))
                    ->setImage('');

        $manager->persist($book);
        $manager->flush();
    }

    public function getDependencies(): array
    {
        return [
            BookCategoryFixture::class
        ];
    }
}
