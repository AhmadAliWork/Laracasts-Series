<x-app-layout>
    <div class="max-w-7xl mx-auto px-4">
        <div class="game-details border-b border-gray-800 pb-12 flex">
            <div class="flex-none">
                <img src="https://tse2.mm.bing.net/th?id=OIP.B5cS_X7tv_zZFfEWXDkP9wAAAA&pid=Api&P=0&h=350" alt="cover">
            </div>
            <div class="ml-12 mr-64">
                <h2 class="font-semibold text-4xl">Final Fantasy VII Remake</h2>
                <div class="text-gray-400">
                    <span>Adventure, RPG</span>
                    &middot;
                    <span>Square Enix</span>
                    &middot;
                    <span>Playstation 4</span>
                </div>
                <div class="flex flex-wrap items-center mt-8 ">
                    <div class="flex items-center">
                        <div class="w-16 h-16 bg-gray-800 rounded-full">
                            <div class="font-semibold text-xs flex justify-center items-center h-full">90%</div>
                        </div>
                        <div class="ml-4 text-xs">Member <br> Score</div>
                    </div>

                    <div class="flex items-center ml-12">
                        <div class="w-16 h-16 bg-gray-800 rounded-full">
                            <div class="font-semibold text-xs flex justify-center items-center h-full">92%</div>
                        </div>
                        <div class="ml-4 text-xs">Critic <br> Score</div>
                    </div>
                    <div class="flex items-center ml-12">
                        <div class="w-8 h-8 bg-gray-800 rounded-full flex justify-center items-center">
                            <a href="" class="hover:text-gray-400">a</a>
                        </div>
                    </div>

                </div>
                <p class="mt-12">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet aperiam at, doloribus est et in iusto
                    labore molestias obcaecati, omnis perspiciatis possimus quam quos rem reprehenderit temporibus
                    voluptas. Aperiam assumenda aut cum distinctio ex excepturi fugiat incidunt, ipsum natus nostrum
                    odio, possimus quae repudiandae temporibus ullam. Praesentium velit vitae voluptates!
                </p>

                <div class="mt-12">
                    <button class="flex bg-blue-500 text-white font-semibold px-4 py-4 hover:bg-blue-600 rounded transition ease-in-out duration-150">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                             stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M5.25 5.653c0-.856.917-1.398 1.667-.986l11.54 6.348a1.125 1.125 0 010 1.971l-11.54 6.347a1.125 1.125 0 01-1.667-.985V5.653z"/>
                        </svg>
                        <span class="ml-2">Play Trailer</span>
                    </button>
                </div>
            </div>
        </div>

        <div class="images-container  pb-12 mt-8">
            <h2 class="text-blue-500 uppercase tracking-wide font-semibold">Images</h2>
            <div class="grid grid-cols-3 gap-12 mt-8">
                <div>
                    <a href="">
                        <img src="https://tse2.mm.bing.net/th?id=OIP.B5cS_X7tv_zZFfEWXDkP9wAAAA&pid=Api&P=0&h=350" alt="screenshot" class="hover:opacity-75 transition ease-in-out duration-150">
                    </a>
                </div>
            </div>

        </div>
        <div class="images-container pb-12 mt-8">
            <h2 class="text-blue-500 uppercase tracking-wide font-semibold">Similar games</h2>
            @include("games.partials.popular-games", ['popularGames' => range(1,6)])

        </div>
</x-app-layout>
