<?php

namespace App\DataFixtures;

 
use Faker\Factory;
use App\Entity\Admin;
use App\DataFixtures\adminFixtures;
use App\DataFixtures\ProfileFixtures;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class AdminFixtures extends Fixture implements DependentFixtureInterface
{
    private $encoder;
    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->encoder=$encoder;
    }
    public function load(ObjectManager $manager)
    {
      $faker = Factory::create('fr_FR');
        $admin=new Admin();
     //   $profil=$this->getReference("Admin");
        $admin->setPrenom($faker->firstname());
        $admin->setNom("ANNE");
        $password=$this->encoder->encodePassword($admin,"gano");
        $admin->setPassword($password);
        $admin->setEmail($faker->email());
        $admin->setArchived(False);
        $admin->setProfil($this->getReference(ProfileFixtures::ADMIN));
        $admin->setTelephone("774191179");

     //   $apprenant->setProfile($profil);
        $manager->persist($admin);
 
       
        $manager->flush();
    }
    
    public function getDependencies()
    {
        return array(
            ProfileFixtures::class,
        );
    }
}