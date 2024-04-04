<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use App\Factory\UserFactory;
use App\Factory\MakeFactory;
use App\Factory\PhoneFactory;
use App\Factory\SportFactory;
use App\Factory\ClubFactory;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        UserFactory::createOne([
            'email' => 'matt@matt.com',
            'password' => 'pass',
            'roles' => [
                'ROLE_ADMIN',
                'ROLE_TEACHER'
            ]
        ]);

        UserFactory::createOne([
            'email' => 'user@user.com',
            'password' => 'pass',
            'roles' => ['ROLE_USER']
        ]);

        UserFactory::createOne([
            'email' => 'joe@joe.com',
            'password' => 'password',
            'roles' => ['ROLE_ADMIN']
        ]);

        UserFactory::createOne([
            'email' => 'admin@admin.com',
            'password' => 'pass',
            'roles' => ['ROLE_ADMIN']
        ]);

//        MakeFactory::createOne(['name' => 'Apple']);
//        $samsung = MakeFactory::createOne(['name' => 'Samsung']);
//        MakeFactory::createOne(['name' => 'Sony']);
//
//        PhoneFactory::createOne([
//            'model' => 'iPhone X',
//            'memory' => '128',
//            'manufacturer' => MakeFactory::find(['name' => 'Apple']),
//        ]);
//
//        PhoneFactory::createOne([
//            'model' => 'Galaxy 21',
//            'memory' => '256',
//            'manufacturer' => $samsung,
//        ]);

        $running = SportFactory::createOne(['name' => 'running']);
        SportFactory::createOne(['name' => 'cycling']);
        $swimming = SportFactory::createOne(['name' => 'swimming']);

        ClubFactory::createOne([
            'title' => 'Lucan Harriers',
            'numMembers' => 775,
            'sport' => $running
        ]);

        ClubFactory::createOne([
            'title' => 'Dublin Dolphins',
            'numMembers' => 250,
            'sport' => $swimming
        ]);


    }
}
