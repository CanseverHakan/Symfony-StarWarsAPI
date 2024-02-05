<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(HttpClientInterface $httpClientInterface): Response
    {

        $films = $httpClientInterface->request(
            'GET',
            'https://swapi.dev/api/films/'
        );

        $resultats = $films->toArray()['results'];
        
        return $this->render('home/index.html.twig', [
            'resultats' => $resultats,
        ]);
    }
}
