<?php

namespace App\DataFixtures;

use App\Entity\Etapes;
use App\Entity\Ingredients;
use App\Entity\Produits;
use App\Entity\Recettes;
use App\Entity\TypeRecette;
use App\Factory\RecettesFactory;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $typeRecette=new TypeRecette();
        $typeRecette->setNom("Dessert");

        $recette=new Recettes();
        $recette->setNom("Tarte aux pommes");
        $recette->setNbPersonnes(4);
        $recette->setTypeRecette($typeRecette);

        $produit=new Produits();
        $produit->setNom("pomme");

        $ingredient=new Ingredients();
        $ingredient->setProduits($produit);
        $ingredient->setRecette($recette);
        $ingredient->setQuantite(4);
        $ingredient->setMesure("pièces");
        $manager->persist($ingredient);
        $manager->flush();

        $etape=new Etapes();
        $etape->setOrdre(1);
        $etape->setDuree(3);
        $etape->setDescription("Abaisser la pâte");
        $etape->setRecette($recette);
        $etape->setTypeEtape("Préparation");
        $manager->persist($etape);
        $manager->flush();
    }
}
