<?php

namespace App\DataFixtures;

 
use App\Entity\Cm;
use Faker\Factory;
use App\DataFixtures\adminFixtures;
use App\DataFixtures\ProfileFixtures;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class CmFixtures extends Fixture implements DependentFixtureInterface
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
      
        $cm=new Cm();
     //   $profil=$this->getReference("Admin");
        $cm->setPrenom("Babacar");
        $cm->setNom("ANNE");
        $password=$this->encoder->encodePassword($cm,$password);
        $cm->setPassword($password);
        $cm->setEmail($faker->email());
        $cm->setArchived(False);
        $cm->setProfil($this->getReference(ProfileFixtures::CM));
        $cm->setTelephone("774191179");

     //   $apprenant->setProfile($profil);
        $manager->persist($cm);
 
       
        $manager->flush();
    }
    
    public function getDependencies()
    {
        return array(
            ProfileFixtures::class,
        );
    }
}
