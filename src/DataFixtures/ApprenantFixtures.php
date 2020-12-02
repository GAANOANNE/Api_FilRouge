<?php

namespace App\DataFixtures;


use Faker\Factory;
use App\Entity\Apprenant;
use App\DataFixtures\ProfileFixtures;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class ApprenantFixtures extends Fixture implements DependentFixtureInterface
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
      
        $apprenant=new Apprenant();
     //   $profil=$this->getReference("Apprenant");
        $apprenant->setPrenom("Babacar");
        $apprenant->setNom("ANNE");
        $password=$this->encoder->encodePassword($apprenant,$password);
        $apprenant->setPassword($password);
        $apprenant->setEmail($faker->email());
        $apprenant->setArchived(False);
        $apprenant->setProfil($this->getReference(ProfileFixtures::APPRENANT));
        $apprenant->setTelephone("774191179");

     //   $apprenant->setProfile($profil);
        $manager->persist($apprenant);
 
       
        $manager->flush();
    }
    // recuperation de 
    public function getDependencies()
    {
        return array(
            ProfileFixtures::class,
        );
    }
}
