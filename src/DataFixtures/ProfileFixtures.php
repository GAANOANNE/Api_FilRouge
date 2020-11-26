<?php

namespace App\DataFixtures;

use App\Entity\Profil;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class ProfileFixtures extends Fixture
{
    public const CM = "CM";
    public const FORMATEUR = "FORMATEUR";
    public const APPRENANT = "APPRENANT";
    public const ADMIN = "ADMIN";
    public function load(ObjectManager $manager)
    {
       
       $profils=["ADMIN","FORMATEUR","APPRENANT","CM"];
       for($i=0; $i<count($profils); $i++)
       {
            $profile=new Profil();
            $profile->setLibelle($profils[$i]);
            $profile->setArchived(False);
            $manager->persist($profile);
            $manager->flush();
            if($profils[$i]=="CM"){
                $this->addReference(self::CM, $profile);
            }
            if($profils[$i]=="FORMATEUR"){
                $this->addReference(self::FORMATEUR, $profile);
            }
            if($profils[$i]=="APPRENANT"){
                $this->addReference(self::APPRENANT, $profile);
            }
            if($profils[$i]=="ADMIN"){
                $this->addReference(self::ADMIN, $profile);
            }
       }
       
       

    }
}
