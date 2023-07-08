<x-app-layout>
    <div class="max-w-7xl mx-auto px-4">
        <h2 class="text-blue-500 uppercase tracking-wide font-semibold">Popular Games</h2>
        <livewire:popular-games />
        <div class="flex flex-col lg:flex-row my-10">
            <div class="recently-reviewed w-full lg:w-3/4 mr-0 lg:mr-32">
                <h2 class="text-blue-500 uppercase tracking-wide font-semibold">Recently Reviewed</h2>
                <livewire:recently-reviewed-games />
            </div>
            <div class="most-anticipated lg:w-1/4 mt-12 lg:mt-0">
                <h2 class="text-blue-500 uppercase tracking-wide font-semibold">Most Anticipated</h2>
                @include("games.partials.most-anticipated")
                <h2 class="text-blue-500 uppercase tracking-wide font-semibold mt-10">Coming Soon</h2>
                @include("games.partials.coming-soon")
            </div>

        </div>
    </div>
</x-app-layout>
