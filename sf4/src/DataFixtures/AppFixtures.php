<?php

namespace App\DataFixtures;

use App\Entity\Advert;
use App\Entity\User;
use App\Utils\CarPrice;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\ORM\EntityManagerInterface;
use Faker\Factory;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class AppFixtures extends Fixture
{
    private $passwordEncoder;
    private $price;

    public function __construct(UserPasswordEncoderInterface $userPasswordEncoderInterface, CarPrice $carPrice)
    {
        $this->passwordEncoder = $userPasswordEncoderInterface;
        $this->price = $carPrice;
    }

    public function load(ObjectManager $manager)
    {
        
        $faker = Factory::create();



         for ($i = 0 ; $i <= 100 ; $i++)
{        $advert = new Advert();
         $advert->setTitle($faker->word())
         ->setDescription($faker->realText($maxNbChars = 20, $indexSize = 2))
         ->setCity($faker->city())
         ->setCartYear($faker->randomDigitNotNull() )
         ->setNbKm($faker->numberBetween($min = 30000, $max = 300000))
         ->setNbDays($faker->numberBetween($min = 5, $max = 30))
         ->setPrice(452); 
        
         $manager->persist($advert);
}


$user = new User();
$user->setEmail('romain.trauchessec@ynov.com')
    ->setRoles(['ROLE_ADMIN'])
    ->setLogin('Romain')
    ->setPassword($this->passwordEncoder->encodePassword(
        $user,
        'Romain'
    ));

    $manager->persist($user);

    for ($i = 0 ; $i <= 20 ; $i++)
    {
        $user = new User();
        $user->setEmail($faker->email())
            ->setRoles(['ROLE_USER'])
            ->setLogin($faker->lastName())
            ->setPassword($this->passwordEncoder->encodePassword(
                $user,
                $faker->password()
            ));

        $manager->persist($user);
        
    }





        $manager->flush();
    }
}
