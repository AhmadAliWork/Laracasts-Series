<?php

namespace App\Http\Livewire;

use App\Services\GameService;
use Livewire\Component;

class SearchDropdown extends Component
{
    public $search;
    public $searchResults = [];

    public function render()
    {
        if(strlen($this->search) >= 2) {
            $this->searchResults = (new GameService())->searchGames($this->search);
        }
        return view('livewire.search-dropdown');
    }
}
