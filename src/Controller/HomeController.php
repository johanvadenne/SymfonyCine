<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;


class HomeController extends AbstractController
{

    
    #[Route('/accueil2/film/{id}', name: 'app_movie_id_film', requirements: ['id' => '\d+'])]
    public function movieId(int $id): Response {
        $API_KEY_TMDB = $_ENV["TMDB_API_KEY"];
        $URL_TMDB = "https://api.themoviedb.org/3/search/movie/$id?api_key=" . $API_KEY_TMDB . "&&language=fr-FR&page=1";
        
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $URL_TMDB);
        curl_setopt($ch,  CURLOPT_RETURNTRANSFER, true);

        $resultat_curl = curl_exec($ch);
        $json = json_decode ( $resultat_curl);
        var_dump($URL_TMDB);
        return $this->render('home/chercheFilm.html.twig', ["results" => $json->results]);
    }

    #[Route('/accueil2/{term}', name: 'app_home2', requirements: ['term' => '.+'])]
    public function apiPMDB(String $term): Response
    {
        $API_KEY_TMDB = $_ENV["TMDB_API_KEY"];
        $URL_TMDB = "https://api.themoviedb.org/3/search/movie?api_key=" . $API_KEY_TMDB . "&query=" . $term . "&language=fr-FR&page=1";

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $URL_TMDB);
        curl_setopt($ch,  CURLOPT_RETURNTRANSFER, true);

        $resultat_curl = curl_exec($ch);
        // On transforme le résultat de cURL en un objet JSON utilisable
        $json = json_decode ( $resultat_curl);
        return $this->render('home/chercheFilm.html.twig', ["results" => $json->results]);
    }

    #[Route('/accueil2', name: 'app_home3')]
    public function index(Request $request): Response
    {
        $term = "";
        if ($request->getMethod() == "POST") {
            $term = $_POST["term"];
        }
        $API_KEY_TMDB = $_ENV["TMDB_API_KEY"];
        $URL_TMDB = "https://api.themoviedb.org/3/search/movie?api_key=" . $API_KEY_TMDB . "&&language=fr-FR&page=1&query=" . $term;

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $URL_TMDB);
        curl_setopt($ch,  CURLOPT_RETURNTRANSFER, true);

        $resultat_curl = curl_exec($ch);
        // On transforme le résultat de cURL en un objet JSON utilisable
        $json = json_decode ( $resultat_curl);
        return $this->render('home/chercheFilm.html.twig', ["results" => $json->results]);
    }

    #[Route('/accueil2/auCine', name: 'app_home4')]
    public function auCine(Request $request): Response
    {
        $API_KEY_TMDB = $_ENV["TMDB_API_KEY"];
        $URL_TMDB = "https://api.themoviedb.org/3/search/movie/0?api_key=" . $API_KEY_TMDB . "&&language=fr-FR&page=1";
        
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $URL_TMDB);
        curl_setopt($ch,  CURLOPT_RETURNTRANSFER, true);

        $resultat_curl = curl_exec($ch);
        $json = json_decode ( $resultat_curl);
        var_dump($URL_TMDB);
        return $this->render('home/chercheFilm.html.twig', ["results" => $json->results]);
    }
}
