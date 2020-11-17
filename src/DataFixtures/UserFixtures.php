<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\User;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
class UserFixtures extends Fixture
{
  private $passwordEncoder;

     public function __construct(UserPasswordEncoderInterface $passwordEncoder)
     {
         $this->passwordEncoder = $passwordEncoder;
     }
    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->persist($product);
        $user = new User();
        $roles[] = 'ROLE_ADMIN';
        $user->setEmail('karrab.miloud@yahoo.com');
        $user->setRoles($roles);
        $user->setPassword($this->passwordEncoder->encodePassword(
             $user,
             'webmaster2020'
         ));
        $manager->persist($user);

        $manager->flush();
    }
}
