<?php

namespace App\DataFixtures;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserFixtures extends Fixture

{
    private $passwordEncoder;

    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
        # code...
    }

    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->persist($product);
        $user= new User();
        $user->setEmail("junzgamos@gmail.com");
        $hashedPassword=$this->passwordEncoder->encodePassword( $user, "azerty");
        $user->setPassword("$hashedPassword");
        $manager->persist($user);
 
        $manager->flush();
    }
}
