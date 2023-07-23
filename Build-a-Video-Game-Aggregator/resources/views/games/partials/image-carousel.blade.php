@section('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
@endsection

<div class="images-container pb-12 mt-8 "
     x-data="{ isImageModalVisible: false, image: '' }"
>
    <h2 class="text-blue-500 uppercase tracking-wide font-semibold">Images</h2>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-12 mt-8 owl-carousel owl-theme">
        @foreach($game["screenshots"] as $screenshot)
            <div class="item">
                <a href="{{ $screenshot["huge"]  }}"
                   @click.prevent="
                                isImageModalVisible = true
                                image='{{ $screenshot['big'] }}'
                            "
                >
                    <img src="{{ $screenshot["big"] }}" alt="screenshot" class="hover:opacity-75 transition ease-in-out duration-150">
                </a>
            </div>
        @endforeach
    </div>
    <template x-if="isImageModalVisible">
        <div
            style="background-color: rgba(0, 0, 0, .5);"
            class="z-50 fixed top-0 left-0 w-full h-full flex items-center shadow-lg overflow-y-auto"
        >
            <div class="container mx-auto lg:px-32 rounded-lg overflow-y-auto">
                <div class="bg-gray-900 rounded">
                    <div class="flex justify-end pr-4 pt-2">
                        <button
                            class="text-3xl leading-none hover:text-gray-300"
                            @click="isImageModalVisible = false"
                            @keydown.escape.window="isImageModalVisible = false"
                        >
                            &times;
                        </button>
                    </div>
                    <div class="modal-body px-8 py-8">
                        <img :src="image" alt="screenshot">
                    </div>
                </div>
            </div>
        </div>
    </template>
</div>
@push('scripts')
    <script>
        $(function() {
            // Owl Carousel
            var owl = $(".owl-carousel");
            // Check the number of screenshots
            var screenshotsCount = {{ count($game["screenshots"]) }}
            owl.owlCarousel({
                items:  screenshotsCount > 1 ? 3 : 1,
                margin: 10,
                loop: true,
                nav: false

            });
            // Keyboard arrow key navigation for Owl Carousel
            $(document).on('keydown', function(event) {
                if (event.keyCode === 37) {
                    // Left arrow key
                    owl.trigger('prev.owl.carousel');
                } else if (event.keyCode === 39) {
                    // Right arrow key
                    owl.trigger('next.owl.carousel');
                }
            });
        });
    </script>
@endpush
