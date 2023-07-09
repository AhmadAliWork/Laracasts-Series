<x-app-layout>
    <div class="max-w-7xl mx-auto px-4">
        <div class="game-details border-b border-gray-800 pb-12 flex flex-col lg:flex-row">
            <div class="flex-none">
                <img src="{{ str_replace('thumb', 'cover_big', $game['cover']['url']) }}" alt="cover">
            </div>
            <div class="lg:ml-12 lg:mr-64">
                <h2 class="font-semibold text-4xl leading-tight mt-1">{{ $game["name"]  }}</h2>
                <div class="text-gray-400">
                    <span>
                        @foreach($game["genres"] as $genre)
                            {{ $genre["name"] }}
                        @endforeach
                    </span>
                    &middot;
                    <span> {{ $game["involved_companies"][0]["company"]["name"] }}</span>
                    &middot;
                    <span>
                        @foreach($game['platforms'] as $platform)
                            {{ array_key_exists('abbreviation', $platform) ? $platform['abbreviation'] : [] }},
                        @endforeach
                    </span>
                </div>
                <div class="flex flex-wrap items-center mt-8 ">
                    <div class="flex items-center">
                        <div class="w-16 h-16 bg-gray-800 rounded-full">
                            <div class="font-semibold text-xs flex justify-center items-center h-full">
                                @if(array_key_exists('rating', $game))
                                    {{ round($game["rating"]). '%' }}
                                @else
                                    0%
                                @endif
                            </div>
                        </div>
                        <div class="ml-4 text-xs">Member <br> Score</div>
                    </div>

                    <div class="flex items-center ml-12">
                        <div class="w-16 h-16 bg-gray-800 rounded-full">
                            <div class="font-semibold text-xs flex justify-center items-center h-full">
                                @if(array_key_exists('aggregated_rating', $game))
                                    {{ round($game["aggregated_rating"]). '%' }}
                                @else
                                    0%
                                @endif
                            </div>
                        </div>
                        <div class="ml-4 text-xs">Critic <br> Score</div>
                    </div>
                    <div class="flex items-center mt-4 lg:mt-0 lg:ml-12">
                        <div class="w-8 h-8 bg-gray-800 rounded-full flex justify-center items-center">
                            <a href="" class="hover:text-gray-400">a</a>
                        </div>
                        <div class="w-8 h-8 bg-gray-800 rounded-full flex justify-center items-center">
                            <a href="" class="hover:text-gray-400">a</a>
                        </div>
                        <div class="w-8 h-8 bg-gray-800 rounded-full flex justify-center items-center">
                            <a href="" class="hover:text-gray-400">a</a>
                        </div>
                        <div class="w-8 h-8 bg-gray-800 rounded-full flex justify-center items-center">
                            <a href="" class="hover:text-gray-400">a</a>
                        </div>
                    </div>

                </div>
                <p class="mt-12">
                   {{ $game["summary"] }}
                </p>

                <div class="mt-12">
                   {{-- <button class="flex bg-blue-500 text-white font-semibold px-4 py-4 hover:bg-blue-600 rounded transition ease-in-out duration-150">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                             stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M5.25 5.653c0-.856.917-1.398 1.667-.986l11.54 6.348a1.125 1.125 0 010 1.971l-11.54 6.347a1.125 1.125 0 01-1.667-.985V5.653z"/>
                        </svg>
                        <span class="ml-2">Play Trailer</span>
                    </button>--}}
                    <a href="https://youtube.com/watch/{{$game['videos'][0]['video_id']}}" class="inline-flex bg-blue-500 text-white font-semibold px-4 py-4 hover:bg-blue-600 rounded transition ease-in-out duration-150">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                             stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M5.25 5.653c0-.856.917-1.398 1.667-.986l11.54 6.348a1.125 1.125 0 010 1.971l-11.54 6.347a1.125 1.125 0 01-1.667-.985V5.653z"/>
                        </svg>
                        <span class="ml-2">Play Trailer</span>
                    </a>
                </div>
            </div>
        </div>

        <div class="images-container  pb-12 mt-8">
            <h2 class="text-blue-500 uppercase tracking-wide font-semibold">Images</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-12 mt-8">
                @foreach($game["screenshots"] as $screenshot)
                <div>
                    <a href="{{ str_replace('thumb', 'screenshot_huge', $screenshot['url']) }}">
                        <img src="{{ str_replace('thumb', 'screenshot_big', $screenshot['url']) }}" alt="screenshot" class="hover:opacity-75 transition ease-in-out duration-150">
                    </a>
                </div>
                @endforeach
            </div>

        </div>
        <div class="images-container pb-12 mt-8">
            <h2 class="text-blue-500 uppercase tracking-wide font-semibold">Similar games</h2>

            <livewire:popular-games :similar-games="$similarGames" />
        </div>
</x-app-layout>
