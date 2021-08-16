<?php

namespace App\DataFixtures;

use App\Entity\Categorie;
use App\Entity\Produit;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class AppFixtures extends Fixture
{
    private $encoder;

    public function __construct(UserPasswordHasherInterface $encoder)
    {
        $this->encoder = $encoder;
    }

    public function load(ObjectManager $manager)
    {
        //Utilisation de Faker
        $faker = Factory::create('fr_FR');

        //Création d'un utilisateur
        $user = new User();

        $user->setEmail('user@test.com')
            ->setPrenom($faker->firstName())
            ->setNom($faker->lastName())
            ->setTelephone($faker->phoneNumber())
            ->setFacebook('facebook');

        $password = $this->encoder->hashPassword($user, 'password');
        $user->setPassword($password);

        $manager->persist($user);

        //Création de 10 Catégorie
        for ($i = 0; $i < 10; $i++) {
            $categorie = new Categorie();

            $categorie->setDescription($faker->text(10, true))
                ->setSlug($faker->slug())
                ->setNom($faker->word());

            $manager->persist($categorie);
        }

        //Création de 5 Catégories
        for ($k = 0; $k < 5; $k++) {
            $categorie = new Categorie();

            $categorie->setNom($faker->word())
                ->setDescription($faker->text(10, true))
                ->setSlug($faker->slug());

            $manager->persist($categorie);

            //Création de 2 Produits/catégories
            for ($j = 0; $j < 2; $j++) {
                $produit = new Produit();

                $produit->setNom($faker->lastName())
                    ->setRefProd($faker->text())
                    ->setEnVente($faker->randomElement([true, false]))
                    ->setPrix($faker->randomFloat(2, 100, 9999))
                    ->setUser($user)
                    ->addCategorie($categorie)
                    ->setCreateAt($faker->dateTimeBetween('-6 month', 'now'))
                    ->setSlug($faker->slug())
                    ->setManuel($faker->randomElement([true, false]))
                    ->setFileAchat('/img/Reimpression-ticket-02.PNG')
                    ->setDateAchat($faker->dateTimeBetween('-6 month', 'now'));

                $manager->persist($produit);
            }
        }

        $manager->flush();
    }
}
