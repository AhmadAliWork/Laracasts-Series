<?php

namespace App\Http\Livewire;

use App\Services\GameService;
use Livewire\Component;

class RecentlyReviewedGames extends Component
{
    public $recentlyReviewedGames = [];
    public GameService $gameService;

    public function loadRecentReviewedGames()
    {
        $recentlyGamesUnformatted = (new GameService())->recentlyReviewedGames();
        $this->recentlyReviewedGames = $this->formatForView($recentlyGamesUnformatted);
        collect($this->recentlyReviewedGames)->filter(function ($game) {
            return $game['rating'];
        })->each(function ($game) {
            $this->emit("recentGameWithRatingAdded", [
              'slug' => 'recent_' . $game["slug"],
              'rating' => $game["rating"] / 100,
            ]);
        });
    }
    public function render()
    {
        return view('livewire.recently-reviewed-games');
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
