<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

// je créé une classe avec le même nom que le fichier
// suffixée par controller

// Je fais hériter PokerController de la classe de Symfony AbstractController
// De cette manière, ma classe PokerController peut utiliser "toutes" les méthodes
// définies dans la classe AbstractController
// AbstractController fournit plusieurs méthodes pour faciliter la création de fonctionnalités
// dans nos contrôleurs (comme des redirections, la création de formulaires etc)
class PageController extends AbstractController
{

    /**
     * @Route("/", name="home")
     *
     * je créé une route, en utilisant des commentaires PHP
     * et "@Route" pour spécifier l'url de la page que je veux créer
     * La route est située au dessus de la méthode à appeler
     * pour la page
     */
    public function home()
    {
        // je renvoie une réponse HTTP grâce à l'objet Response
        // (du composant http foundation de Symfony)
        // Ca affichera donc 'hello accueil' quand
        // l'url "/" sera demandée
        return $this->render('home.html.twig');
    }

}
