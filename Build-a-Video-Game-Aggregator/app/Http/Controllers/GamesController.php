<?php

namespace App\Http\Controllers;

use App\Services\GameService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;
use function PHPUnit\Framework\stringContains;

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
        return collect($game)->merge([
          "coverImageUrl" =>  array_key_exists("cover", $game) ? str_replace('thumb', 'cover_big', $game['cover']['url']) : 'https://via.placeholder.com/264x352',
          "genres" => collect($game["genres"])->pluck("name")->implode(", "),
          "involvedCompanies" => array_key_exists("involved_companies", $game) ? $game["involved_companies"][0]["company"]["name"] : "No Company yet",
          "platforms" => collect($game["platforms"])->pluck("abbreviation")->implode(", "), # PS4, PC, Xbox
          "memberRating" => array_key_exists("rating", $game) ? round($game['rating']) : 0,
          "criticRating" => array_key_exists("aggregated_rating", $game) ? round($game['aggregated_rating']) : 0,
          "trailer" => array_key_exists('videos', $game) ?  "https://youtube.com/embed/" . $game['videos'][0]['video_id'] : '',
          "screenshots" => collect($game["screenshots"])->map(fn ($screenshot) => [
            "big" =>  str_replace('thumb', 'screenshot_huge', $screenshot['url']),
            "huge" => str_replace('thumb', 'screenshot_big', $screenshot['url'])
          ])->take(9),
            'social' => [
              "website" => collect($game["websites"])->first(),
              "facebook" => collect($game["websites"])->filter(fn ($website) => Str::contains($website["url"], 'facebook'))->first(),
              "instagram" => collect($game["websites"])->filter(fn ($website) => Str::contains($website["url"], 'instagram'))->first(),
              "twitter" => collect($game["websites"])->filter(fn ($website) => Str::contains($website["url"], 'twitter'))->first(),
            ],
        ])->toArray();
    }
}
