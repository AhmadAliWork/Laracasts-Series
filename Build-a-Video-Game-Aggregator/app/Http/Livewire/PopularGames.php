<?php

namespace App\Http\Livewire;

use App\Services\GameService;
use Livewire\Component;

class PopularGames extends Component
{
    public $popularGames = [];
    public GameService $gameService;

    public function loadPopularGames()
    {
        $this->popularGames = (new GameService())->popularGames();
    }

    public function render()
    {
        return view('livewire.popular-games');
    }
}
