<div class="mt-12" x-data="{ isTrailerModalVisible: false }">
  <button
    @click="isTrailerModalVisible = true"
    class="flex bg-blue-500 text-white font-semibold px-4 py-4 hover:bg-blue-600 rounded transition ease-in-out duration-150"
  >
    <svg class="w-6 fill-current" viewBox="0 0 24 24"><path d="M0 0h24v24H0z" fill="none"></path><path d="M10 16.5l6-4.5-6-4.5v9zM12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8z"></path></svg>
    <span class="ml-2">Play Trailer</span>
  </button>

  <template x-if="isTrailerModalVisible">
    <div
      style="background-color: rgba(0, 0, 0, .5);"
      class="z-50 fixed top-0 left-0 w-full h-full flex items-center shadow-lg overflow-y-auto"
    >
      <div class="container mx-auto lg:px-32 rounded-lg overflow-y-auto">
        <div class="bg-gray-900 rounded">
          <div class="flex justify-end pr-4 pt-2">
            <button
              @click="isTrailerModalVisible = false"
              @keydown.escape.window="isTrailerModalVisible = false"
              class="text-3xl leading-none hover:text-gray-300"
            >
              &times;
            </button>
          </div>
          <div class="modal-body px-8 py-8">
            <div class="responsive-container overflow-hidden relative" style="padding-top: 56.25%">
              <iframe width="560" height="315" class="responsive-iframe absolute top-0 left-0 w-full h-full"
                      src="{{ $game['trailer'] }}" style="border:0;"
                      allow="autoplay; encrypted-media" allowfullscreen></iframe>
            </div>
          </div>
        </div>
      </div>
    </div>
  </template>
</div>