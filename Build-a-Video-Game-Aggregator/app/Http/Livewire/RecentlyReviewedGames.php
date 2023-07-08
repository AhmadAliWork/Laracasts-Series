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
        $this->recentlyReviewedGames = (new GameService())->recentlyReviewedGames();
    }
    public function render()
    {
        return view('livewire.recently-reviewed-games');
    }
}
