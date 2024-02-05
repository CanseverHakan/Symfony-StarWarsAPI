<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Contracts\HttpClient\HttpClientInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ActorController extends AbstractController
{
    #[Route('/Characters', name: 'app_actor')]
    public function showActor(HttpClientInterface $httpClientInterface): Response
    {

        $Characters = $httpClientInterface->request(
            'GET',
            'https://swapi.dev/api/people/'
        );

        $resultatsCharacters = $Characters->toArray()['results'];
        
        return $this->render('actor/index.html.twig', [
            'resultatsCharacters' => $resultatsCharacters,
        ]);
    }

    #[Route('/Characters/{id}', name: 'app_planet')]
    public function showPlanet($id, HttpClientInterface $httpClientInterface): Response
    {

        $Planet = $httpClientInterface->request(
            'GET',
            "https://swapi.dev/api/planet/{$id}"
        );

        $resultatsPlanet = $Planet->toArray()['results'];

        return $this->render('actor/index.html.twig', [
            'resultatsPlanet' => $resultatsPlanet,
        ]);
    }

}
