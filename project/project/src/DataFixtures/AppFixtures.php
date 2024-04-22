<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use App\Factory\UserFactory;
//use App\Factory\MakeFactory;
//use App\Factory\PhoneFactory;
//use App\Factory\SportFactory;
//use App\Factory\ClubFactory;
use App\Factory\ItemFactory;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {

        UserFactory::createOne([
            'email' => 'user@user.com',
            'password' => 'pass',
            'roles' => ['ROLE_USER1']
        ]);

        UserFactory::createOne([
            'email' => 'user@user2.com',
            'password' => 'pass',
            'roles' => ['ROLE_USER2']
        ]);

        UserFactory::createOne([
            'email' => 'user@user3.com',
            'password' => 'pass',
            'roles' => ['ROLE_USER3']
        ]);

        UserFactory::createOne([
            'email' => 'admin@admin.com',
            'password' => 'pass',
            'roles' => ['ROLE_ADMIN']
        ]);

        ItemFactory::createOne(
            [
             'typeOfClothing' => 'jean',
                'material' => 'Cotton',
                'Colour' => 'Blue',
                'Damaged' => true,
                'price' => 39.99

            ]
        );
        ItemFactory::createOne(
            [
                'typeOfClothing' => 'Shirt',
                'material' => 'Wool',
                'Colour' => 'Grey',
                'Damaged' =>  false,
                'price' => 10.99
            ]
        );
        ItemFactory::createOne(
            [
                'typeOfClothing' => 'jacket',
                'material' => '',
                'Colour' => 'Grey',
                'Damaged' =>  false,
                'price' => 10.99
            ]
        );
//
//        $running = SportFactory::createOne(['name' => 'running']);
//        SportFactory::createOne(['name' => 'cycling']);
//        $swimming = SportFactory::createOne(['name' => 'swimming']);
//
//        ClubFactory::createOne([
//            'title' => 'Lucan Harriers',
//            'numMembers' => 775,
//            'sport' => $running
//        ]);
//
//        ClubFactory::createOne([
//            'title' => 'Dublin Dolphins',
//            'numMembers' => 250,
//            'sport' => $swimming
//        ]);


    }
}
