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
        return view('livewire.search-dropdown');
    }
}
