<?php

namespace App\Tests;

use App\Entity\User;
use PHPUnit\Framework\TestCase;

class UserUnitTest extends TestCase
{
    public function testIsTrue()
    {
        $user = new User();

        $user->setEmail('true@test.com') //Quand je "set"en utilisant les setter des données
            ->setPrenom('prenom')
            ->setNom('nom')
            ->setPassword('password')
            ->setFacebook('facebook');

        $this->assertTrue($user->getEmail() === 'true@test.com'); // je vérifie avec le getter associée que je retrouve la même valeur
        $this->assertTrue($user->getPrenom() === 'prenom');
        $this->assertTrue($user->getNom() === 'nom');
        $this->assertTrue($user->getPassword() === 'password');
        $this->assertTrue($user->getFacebook() === 'facebook');
    }

    public function testIsFalse()
    {
        $user = new User();

        $user->setEmail('true@test.com')
            ->setPrenom('prenom')
            ->setNom('nom')
            ->setPassword('password')
            ->setFacebook('facebook');

        $this->assertFalse($user->getEmail() === 'false@test.com'); //Si je compare a quelquechose de different il me retourne "false"
        $this->assertFalse($user->getPrenom() === 'false');
        $this->assertFalse($user->getNom() === 'false');
        $this->assertFalse($user->getPassword() === 'false');
        $this->assertFalse($user->getFacebook() === 'false');
    }

    public function testIsEmpty()
    {
        $user = new User();

        $this->assertEmpty($user->getEmail()); //Si je "set" aucune données, vérifier que je ne recupere rien
        $this->assertEmpty($user->getNom());
        // $this->assertEmpty($user->getPassword());
        $this->assertEmpty($user->getFacebook());
    }
}
