<div class="popular-games text-sm grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 xl:grid-cols-6 gap-12 border-b border-gray-800 pb-16">
    @foreach(range(1,10) as $item)
        <div class="game mt-8">
            <div class="relative inline-block">
                <a href="#">
                    <img src="https://tse2.mm.bing.net/th?id=OIP.B5cS_X7tv_zZFfEWXDkP9wAAAA&pid=Api&P=0&h=180" alt="game cover"
                         class="hover:opacity-75 transition ease-in-out duration-150">
                </a>
                <div
                    class="absolute bottom-0 right-0 w-16 h-16 bg-gray-800 rounded-full"
                    style="right: -28px; bottom: -20px">
                    <div class="font-semibold text-xs flex justify-center items-center h-full">88%</div>
                </div>
            </div>
            <a href="#" class="block text-base font-semibold leading-tight hover: text-gray-400 mt-8"> Final
                Fantasy 7 Remake</a>
            <div class="text-gray-400 mt-1">Playstation 4</div>
        </div>
    @endforeach
</div>
