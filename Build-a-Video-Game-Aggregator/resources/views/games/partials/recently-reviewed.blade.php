<div class="recently-reviewed-container space-y-12 mt-8">
    @foreach(range(1,3) as $item)
        <div class="game bg-gray-800 rounded-lg shadow-md flex px-6 py-6">
            <div class="relative flex-none">
                <a href="#">
                    <img src="https://tse2.mm.bing.net/th?id=OIP.B5cS_X7tv_zZFfEWXDkP9wAAAA&pid=Api&P=0&h=180"
                         alt="game cover"
                         class="w-48 hover:opacity-75 transition ease-in-out duration-150">
                </a>
                <div
                    class="absolute bottom-0 right-0 w-16 h-16 bg-gray-900 rounded-full"
                    style="right: -28px; bottom: -20px">
                    <div class="font-semibold text-xs flex justify-center items-center h-full">88%</div>
                </div>
            </div>

            <div class="ml-12">
                <a href="" class="block text-lg font-semibold leading-tight hover:text-gray-400 mt-4">Ahmad is Great
                    Programmer</a>
                <div class="text-gray-400 mt-1">Playstation 4</div>
                <p class="mt-6 text-gray-400 hidden lg:block">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab blanditiis ea
                    facere magni neque nesciunt numquam odit quia repudiandae. Adipisci atque corporis eaque eius et eum
                    excepturi incidunt libero maiores maxime non perferendis reiciendis, rem repellendus sint sit
                    tenetur ut? Beatae, deleniti dicta molestias nostrum quibusdam quos suscipit veritatis
                    voluptatibus.</p>
            </div>
        </div>
    @endforeach
</div>
