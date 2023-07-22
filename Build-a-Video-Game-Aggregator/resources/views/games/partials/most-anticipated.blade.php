<div class="most-anticipated-container space-y-10 mt-10">
    @forelse($mostAnticipatedGames as $game)
        <div class="game flex">
            <a href="{{ route("games.show", $game["slug"]) }}">
                <img src="{{ str_replace('thumb', 'cover_big', $game['cover']['url']) }}"
                     alt="game cover"
                     class="w-16 hover:opacity-75 transition ease-in-out duration-150">
            </a>
            <div class="ml-4">
                <a href="{{ route("games.show", $game["slug"]) }}" class="hover:text-gray-300">{{ $game["name"] }}</a>
                <div class="text-gray-400 text-sm mt-1">{{ Carbon\Carbon::parse($game["first_release_date"])->format("M d, Y") }}</div>
            </div>
        </div>
    @empty
        @foreach(range(1,4) as $skeleton)
            <div class="game flex">
                <div class="bg-gray-800 w-16 h-20 flex-none">img</div>
                <div class="ml-4">
                    <div class="text-transparent bg-gray-700 rounded leading-tight">Title Goes Here some more text</div>
                    <div class="text-transparent bg-gray-700 rounded inline-block text-sm mt-2">Sep 16, 2020</div>
                </div>
            </div>
        @endforeach
    @endforelse
</div>
