<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use App\Entity\User;

class UserFixtures extends Fixture
{
    private $passwordEncoder;

        public function __construct(UserPasswordEncoderInterface $passwordEncoder)
        {
        $this->passwordEncoder = $passwordEncoder;
        } 


    public function load(ObjectManager $manager): void
    {
        $user = new User();
        $roles[] = 'ROLE_USER';
        $user-> setEmail('david.renault@gmail.com');
        $user-> setRoles($roles);
        $user-> setUsername('dRenault');
        $user-> setPassword($this->passwordEncoder->encodePassword(
            $user,
            'mpRenault'
        ));

        
        
        $manager->persist($user);
        $manager->flush();
    }
}

