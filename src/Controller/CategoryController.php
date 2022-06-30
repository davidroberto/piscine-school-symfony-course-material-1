<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CategoryController extends AbstractController
{

    /**
     * @Route("/category", name="category")
     */
    public function showCategory()
    {
        $name = 'David';

//        $category = [
//            'title' => 'Politique',
//            'color' => 'yellow',
//            'published' => true,
//            'description' => 'Decrypter l\'actualité politique avec le prisme de David Robert'
//        ];

        // récupére le fichier twig
        // le transforme "le compile" en HTML
        // créé une instance de la classe Response
        // et la retourne au navigateur

        return $this->render('show_category.html.twig', [
            'name' => $name
        ]);
    }



}
