<?php


namespace App\Controller;


use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PokerController
{

    /**
     * @Route("/poker", name="poker")
     */
    // Je passe en parametre de la methode poker, la classe
    // Request suivie d'une variable $request
    // en faisant ça, je demande à Symfony de me récupérer
    // l'objet Request et de le stocker dans la variable
    public function poker(Request $request)
    {
        // j'utilise l'objet Request et la propriété query
        // pour récupérer le parametre GET d'âge
        // je le stocke dans une variable

        $age = $request->query->get('age');

        if ($request->query->has('name')) {
            $message = "Bienvenue ".$request->query->get('name')." sur le site de Poker";
        } else {
            $message = "Bienvenue inconnu sur le site de Poker";
        }

        // si l'âge est supérieur ou égal à 18, j'accepte l'utilisateur
        if ($age >= 18) {
            return new Response($message);
        // sinon je lui mets une message de refus
        } else {
            return new Response("Dégage morveux");
        }

    }


}
