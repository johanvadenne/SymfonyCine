<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MovieController extends AbstractController
{


    #[Route('/movie', name: 'app_movie')]
    public function index(): Response
    {
        return $this->render('movie/index.html.twig', [
            'controller_name' => 'MovieController',
        ]);
    }

    #[Route('/movies', name: 'app_movies')]
    public function list(): Response {

        return $this->render('movie/list.html.twig', [
            'variable' => 'le monde',
        ]);
    }

    #[Route('/movie/random', name: 'app_movie_random')]
    public function random(): Response {
        return new Response( content: "je suis une liste random", status: 200);
    }

    #[Route('/movie/{id}', name: 'app_movie_id', requirements: ['id' => '\d+'])]
    public function movieId(int $id): Response {
        $titre = "Super Mario Bros";
        $synopsis = "l'histoire de mario";
        return $this->render('movie/movie.html.twig', [
            'nom' => $titre,
            'histoire' => $synopsis,
        ]);
    }

    #[Route('/movie/rates', name: 'app_movie_rates')]
    public function movieRates(): Response {
        return new Response( content: "note: 5", status: 200);
    }

    #[Route('/movie/users', name: 'app_movie_users')]
    public function movieUsers(): Response {
        return new Response( content: "utilisateur: test", status: 200);
    }

    #[Route('/supermovie', name: 'app_super_movie')]
    public function superMovie(): Response {
        $superMovie = '{
            "adult": false,
              "backdrop_path": "/rwfuTHx9pHi40QnWLSiIPtYyQAs.jpg",
              "genre_ids": [
                  28,
                  878,
                  53
              ],
              "id": 865,
              "original_language": "en",
              "original_title": "The Running Man",
              "overview": "By 2017, the global economy has collapsed and U.S. society has become a totalitarian police state, censoring all cultural activity. The government pacifies the populace by broadcasting a number of game shows in which convicted criminals fight for their lives, including the gladiator-style The Running Man, hosted by the ruthless Damon Killian, where “runners” attempt to evade “stalkers” and certain death for a chance to be pardoned and set free.",
              "popularity": 32.631,
              "poster_path": "/GTAUOhO4BN0peJVvxGEQydJvUO.jpg",
              "release_date": "1987-11-13",
              "title": "The Running Man",
              "video": false,
              "vote_average": 6.535,
              "vote_count": 2114
          }';
        $superMovie = json_decode($superMovie, true);

        return $this->render('movie/supermovie.html.twig', $superMovie["results"]);
    }
}
