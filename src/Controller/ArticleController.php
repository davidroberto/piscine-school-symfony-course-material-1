<?php


namespace App\Controller;
// src/Controller

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

// Je fais hériter PokerController de la classe de Symfony AbstractController
// De cette manière, ma classe PokerController peut utiliser "toutes" les méthodes
// définies dans la classe AbstractController
// AbstractController fournit plusieurs méthodes pour faciliter la création de fonctionnalités
// dans nos contrôleurs (comme des redirections, la création de formulaires etc)
class ArticleController extends AbstractController
{

    // on définit une propriété $articles (une sorte de variable de classe)
    // pour éviter d'avoir à dupliquer la liste d'articles dans toutes les
    // méthodes
    //
    // "private" permet de dire qu'on ne peut utiliser cette propriété que dans notre classe ArticleController
    // "public" permettrait à d'autres classes d'utiliser cette propriété
    public $articles = [
        1 => [
            'title' => 'La canicule, il fait chaud',
            'content' => 'je transpire'
        ],
        2 => [
            'title' => 'Fin des moteurs thermiques en 2035',
            'content' => 'BROUM'
        ],
        3 => [
            'title' => "L'alcool c'est pas cool",
            'content' => "Pourquoi y'a cool dans alcool ?"
        ]
    ];

    /**
     * @Route("/article", name="article_show")
     */
    public function showArticle(Request $request)
    {

        // récupérer l'id dans l'url (parametre GET)
        $id = $request->query->get('id');

//        $ids = $request->query->get('id');
//        $titles = "";
//        foreach ($ids as $id) {
//            $titles .= " | " . $articles[$id]['title'];
//        }
//        return new Response($titles);

        // trouver dans la liste des articles l'article qui correspond à l'id récupéré
        $article = $this->articles[$id];

        // afficher son titre en réponse
        return new Response($article['title']);
    }

    // pour débuguer ses routes en utilisant la ligne de commandes :
    // se placer dans le projet en ligne de commandes
    // et taper "php bin/console debug:router"

    /**
     * @Route("/article/{id}", name="article_show_wildcard")
     * si je veux avoir une url plus "propre" je peux utiliser, au lieu d'un query parameter id,
     * une wildcard dans l'url
     * pour ça je créé mon url en précisant que l'id est variable en le passant entre accolades
     */
    // je demande à Symfony de récupérer la valeur de l'id en passant en parametre de la méthode
    // une variable qui a le même nom que la wildcard
    public function showArticleWildcard($id)
    {

        // trouver dans la liste des articles l'article qui correspond à l'id récupéré
        $article = $this->articles[$id];

        // afficher son titre en réponse
        return new Response($article['title']);
    }

}
