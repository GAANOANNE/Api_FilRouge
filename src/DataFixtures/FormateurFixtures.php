<?php

namespace App\DataFixtures;

 
use Faker\Factory;
use App\Entity\formateur;
use App\DataFixtures\adminFixtures;
use App\DataFixtures\ProfileFixtures;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class FormateurFixtures extends Fixture implements DependentFixtureInterface
{
    private $encoder;
    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->encoder=$encoder;
    }
    public function load(ObjectManager $manager)
    {
        $faker = Factory::create('fr_FR');
        $password="gano";
      
        $formateur=new formateur();
     //   $profil=$this->getReference("Admin");
        $formateur->setPrenom("Babacar");
        $formateur->setNom("ANNE");
        $password =$this->encoder->encodePassword($formateur,$password);
        $formateur->setPassword($password);
        $formateur->setEmail($faker->email());
        $formateur->setArchived(False);
        $formateur->setProfil($this->getReference(ProfileFixtures::FORMATEUR));
        $formateur->setTelephone("774191179");
     //   $apprenant->setProfile($profil);
        $manager->persist($formateur);
 
       
        $manager->flush();
    }
    
    public function getDependencies()
    {
        return array(
            ProfileFixtures::class,
        );
    }
}
