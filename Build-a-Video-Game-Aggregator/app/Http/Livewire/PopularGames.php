<?php

namespace App\Http\Livewire;

use App\Services\GameService;
use Livewire\Component;

class PopularGames extends Component
{
    public $popularGames = [];
    public GameService $gameService;
    public $similarGames;

    public function mount($similarGames = null)
    {
        $this->similarGames = $similarGames;
    }

    public function loadPopularGames()
    {
//        $this->popularGames = (new GameService())->popularGames();
        # we change $this->popularGames  👉🏻 to $popularGamesUnformated, so we can use logic of blade here
        $popularGamesUnformated = $this->similarGames ?: (new GameService())->popularGames();
        $this->popularGames = $this->formatForView($popularGamesUnformated);
        collect($this->popularGames)->filter(function ($game) {
            return $game['rating'];
        })->each(function ($game) {
            $this->emit("gameWithRatingAdded", [
              'slug' => $game["slug"],
              'rating' => $game["rating"] / 100,
            ]);
        });
    }

    public function render()
    {
        return view('livewire.popular-games');
    }

    private function formatForView($games): array
    {
        # we want to use logic of blade here that's why we did this 👇🏻
        return collect($games)->map(function($game) {
            return collect($game)->merge([
               # extra field in each game with our logic
                "coverImageUrl" =>  str_replace('thumb', 'cover_big', $game['cover']['url']),
                "rating" =>  isset($game['rating']) ? round($game['rating'])   :  null,
                "platforms" => collect($game["platforms"])->pluck("abbreviation")->implode(", ") # PS4, PC, Xbox
            ]);
        })->toArray();
    }
}
