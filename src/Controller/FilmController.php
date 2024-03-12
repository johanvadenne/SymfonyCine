<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FilmController extends AbstractController
{
    #[Route('/film', name: 'app_film')]
    public function index(): Response
    {
        return $this->render('film/index.html.twig', [
            'controller_name' => 'FilmController',
        ]);
    }

    #[Route('/film/populaire', name: 'app_film_pop')]
    public function populaire(): Response
    {

        $client = new \GuzzleHttp\Client();
            
        $response = $client->request('GET', 'https://api.themoviedb.org/3/movie/popular?language=fr-FR&page=1', [
          'headers' => [
            'Authorization' => 'Bearer eyJhbGciOiJIUzI1NiJ9.eyJhdWQiOiIwZGZlNjA4NThlM2E4MjlhNWIwY2QyZjBiMjc3NDE5MSIsInN1YiI6IjY1Nzg2Y2FmNGJmYTU0NWQwMDFlYWVhMiIsInNjb3BlcyI6WyJhcGlfcmVhZCJdLCJ2ZXJzaW9uIjoxfQ.eojm5Og3cCeBIme1VmMMJVBOUWP-BobXLreogqdHt0M',
            'accept' => 'application/json',
          ],
        ]);

        $json = json_decode($response->getBody(), true);
        
        $films = $json["results"];

        return $this->render('film/film_pop.html.twig', [
            'films' => $films,
        ]);
    }

    #[Route('/film/{id}', name: 'app_film_select')]
    public function filmSelect($id): Response
    {
        $client = new \GuzzleHttp\Client();
            
        $response = $client->request('GET', 'https://api.themoviedb.org/3/movie/'. $id, [
          'headers' => [
            'Authorization' => 'Bearer eyJhbGciOiJIUzI1NiJ9.eyJhdWQiOiIwZGZlNjA4NThlM2E4MjlhNWIwY2QyZjBiMjc3NDE5MSIsInN1YiI6IjY1Nzg2Y2FmNGJmYTU0NWQwMDFlYWVhMiIsInNjb3BlcyI6WyJhcGlfcmVhZCJdLCJ2ZXJzaW9uIjoxfQ.eojm5Og3cCeBIme1VmMMJVBOUWP-BobXLreogqdHt0M',
            'accept' => 'application/json',
          ],
        ]);

        $film = json_decode($response->getBody(), true);
        $film["note"] = "4";


        return $this->render('film/film_select.html.twig', [
            'film' => $film,
        ]);
    }
}
