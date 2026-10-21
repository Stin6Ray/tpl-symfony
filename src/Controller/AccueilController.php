<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;


final class AccueilController extends AbstractController
{
    #[Route('/accueil', name: 'app_accueil')]
    public function index(): Response
    {
        return $this->render('accueil/index.html.twig', [
            'controller_name' => 'AccueilController',
        ]);
    }
     
    #[Route('/bonjour/{name}', name: 'app_bonjour')]
    public function bonjour(string $name): Response
    {
        return new Response("<h1>Bonjour $name ! Bienvenue sur Symfony 7.4</h1>");      
    }		
    
    #[Route('/profil/{id}', name: 'app_profil', requirements: ['id' => '\d+'], defaults:
    ['id' => 1])]
    public function profil(int $id): Response
    {
        return new Response("<h1>Profil de l'utilisateur n°$id</h1>");
    }
    
     #[Route('/articles', name: 'app_articles')]
    public function articles(): Response
    {
        $articles = [
            ['titre' => 'Introduction à Symfony', 'auteur' => 'Alice', 'publie' => true],
            ['titre' => 'Les bases de Twig', 'auteur' => 'Bob', 'publie' => true],
            ['titre' => 'Doctrine ORM en pratique', 'auteur' => 'Claire', 'publie' => false],
            ['titre' => 'Sécurité avec Symfony', 'auteur' => 'David', 'publie' => true],
            ['titre' => 'API Platform (brouillon)', 'auteur' => 'Eve', 'publie' => false],
        ];

        return $this->render('articles/index.html.twig', [
            'articles' => $articles,
        ]);
    }


}

