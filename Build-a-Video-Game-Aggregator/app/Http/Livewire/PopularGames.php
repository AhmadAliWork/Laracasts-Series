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
        $this->popularGames = $this->similarGames ?: (new GameService())->popularGames();
    }

    public function render()
    {
        return view('livewire.popular-games');
    }
}
