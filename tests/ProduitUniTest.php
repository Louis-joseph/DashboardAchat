<?php

namespace App\Tests;

use App\Entity\Categorie;
use App\Entity\Produit;
use App\Entity\User;
use DateTime;
use PHPUnit\Framework\TestCase;

class ProduitUniTest extends TestCase
{
    public function testIsTrue()
    {
        $produit = new Produit();
        $datetime = new DateTime();
        $categorie = new Categorie();
        $user = new User();

        $produit->setNom('nom')
            ->setEnVente(true)
            ->setPrix(20.20)
            ->setDateAchat($datetime)
            ->setCreateAt($datetime)
            ->setRefProd('refprod')
            ->setManuel(true)
            ->setSlug('slug')
            ->setFileAchat('fileachat')
            ->addCategorie($categorie)
            ->setUser($user);

        $this->assertTrue($produit->getNom() === 'nom');
        $this->assertTrue($produit->getEnVente() === true);
        $this->assertTrue($produit->getPrix() == 20.20);
        $this->assertTrue($produit->getDateAchat() === $datetime);
        $this->assertTrue($produit->getCreateAt() === $datetime);
        $this->assertTrue($produit->getRefProd() === 'refprod');
        $this->assertTrue($produit->getManuel() === true);
        $this->assertTrue($produit->getSlug() === 'slug');
        $this->assertTrue($produit->getFileAchat() === 'fileachat');
        $this->assertContains($categorie, $produit->getCategorie());
        $this->assertTrue($produit->getUser() === $user);
    }

    public function testIsfalse()
    {
        $produit = new Produit();
        $datetime = new DateTime();
        $categorie = new Categorie();
        $user = new User();

        $produit->setNom('nom')
            ->setEnVente(true)
            ->setPrix(20.20)
            ->setDateAchat($datetime)
            ->setCreateAt($datetime)
            ->setRefProd('refprod')
            ->setManuel(true)
            ->setSlug('slug')
            ->setFileAchat('fileachat')
            ->addCategorie($categorie)
            ->setUser($user);

        $this->assertFalse($produit->getNom() === 'false');
        $this->assertFalse($produit->getEnVente() === false);
        $this->assertFalse($produit->getPrix() == 22.20);
        $this->assertFalse($produit->getDateAchat() === new DateTime());
        $this->assertFalse($produit->getCreateAt() === new DateTime());
        $this->assertFalse($produit->getRefProd() === 'false');
        $this->assertFalse($produit->getManuel() === false);
        $this->assertFalse($produit->getSlug() === 'false');
        $this->assertFalse($produit->getFileAchat() === 'false');
        $this->assertNotContains(new Categorie(), $produit->getCategorie());
        $this->assertFalse($produit->getUser() === new User());
    }

    public function testIsEmpty()
    {
        $produit = new Produit();

        $this->assertEmpty($produit->getNom());
        $this->assertEmpty($produit->getEnVente());
        $this->assertEmpty($produit->getPrix());
        $this->assertEmpty($produit->getDateAchat());
        $this->assertEmpty($produit->getCreateAt());
        $this->assertEmpty($produit->getRefProd());
        $this->assertEmpty($produit->getManuel());
        $this->assertEmpty($produit->getSlug());
        $this->assertEmpty($produit->getFileAchat());
        $this->assertEmpty($produit->getCategorie());
        $this->assertEmpty($produit->getUser());
    }
}
