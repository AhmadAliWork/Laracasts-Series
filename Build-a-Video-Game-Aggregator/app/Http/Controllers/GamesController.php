<?php

namespace App\Http\Controllers;

use App\Services\GameService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class GamesController extends Controller
{
    public GameService $gameService;

    public function __construct(GameService $gameService)
    {
        $this->gameService = $gameService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {


        return view("games.index", [
          "mostAnticipatedGames" => $this->gameService->mostAnticipatedGames(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $slug)
    {
        $game = current($this->gameService->showGame($slug)); # for first index we use current()
        $game = $this->formatGameForView($game);
        $similarGames = $game['similar_games'];
        abort_if(!$game, 404);
        return view("games.show", compact('game', 'similarGames'));
    }


    private function formatGameForView(mixed $game)
    {
        $temp = collect($game)->merge([
          "coverImageUrl" => str_replace('thumb', 'cover_big', $game['cover']['url']),
          "genres" => collect($game["genres"])->pluck("name")->implode(", "),
          "involvedCompanies" => $game["involved_companies"][0]["company"]["name"],
          "platforms" => collect($game["platforms"])->pluck("abbreviation")->implode(", "), # PS4, PC, Xbox
          "memberRating" => array_key_exists("rating", $game) ? round($game['rating']) . "%" : "0%",
          "criticRating" => array_key_exists("aggregated_rating", $game) ? round($game['aggregated_rating']) . "%" : "0%",
          "trailer" => "https://youtube.com/watch/" . $game['videos'][0]['video_id'],
          "screenshots" => collect($game["screenshots"])->map(fn ($screenshot) => [
            "big" =>  str_replace('thumb', 'screenshot_huge', $screenshot['url']),
            "huge" => str_replace('thumb', 'screenshot_big', $screenshot['url'])
          ])->take(9),
            'social' => [
              "website" => collect($game["websites"])
            ],
        ])->toArray();
        dump($temp);
        return $temp;
    }
}
