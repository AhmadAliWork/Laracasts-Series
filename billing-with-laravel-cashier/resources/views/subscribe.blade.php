<x-app-layout>
  @section('styles')

  @endsection
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Subscribe') }}
    </h2>
  </x-slot>

    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
          <form id="payment-form" action="{{ route('subscribe.post') }}" method="POST">
            @csrf
            <div class="mb-4">
              <label for="standard" class="flex items-center gap-x-3">
                <input id="standard" name="plan" type="radio" value="price_1NhUlIK0dr2hZ3HByxgXoT2M"
                       class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-600">
                <span class="text-sm font-medium leading-6 text-gray-900">Standard $15</span>
              </label>
            </div>
            <div class="mb-4">
              <label for="Premium" class="flex items-center gap-x-3">
                <input id="Premium" name="plan" value="price_1NhUlIK0dr2hZ3HBCqrookVb" type="radio"
                       class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-600">
                <span class="text-sm font-medium leading-6 text-gray-900">Premium $25</span>
              </label>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
              <div class="col-span-1">
                <label for="card-holder-name" class="block text-sm font-medium text-gray-700">
                  Name
                </label>
                <input type="text" name="name" id="card-holder-name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" placeholder="Name on the card">
              </div>
            </div>
            <div class="grid grid-cols-1 gap-4">
              <div class="col-span-1">
                <label for="card-element" class="block text-sm font-medium text-gray-700">
                  Card details
                </label>
                <div id="card-element" class="mt-1"></div>
              </div>
            </div>
            <hr class="my-4">
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline-blue active:bg-blue-800" id="card-button" data-secret="{{ $intent->client_secret }}">Purchase</button>
          </form>
        </div>
      </div>
    </div>

    <script src="https://js.stripe.com/v3/"></script>
    <script>
        const stripe = Stripe('{{ env('STRIPE_KEY') }}')

        const elements = stripe.elements()
        const cardElement = elements.create('card')

        cardElement.mount('#card-element')

        const form = document.getElementById('payment-form')
        const cardBtn = document.getElementById('card-button')
        const cardHolderName = document.getElementById('card-holder-name')

        form.addEventListener('submit', async (e) => {
            e.preventDefault()

            cardBtn.disabled = true
            const { setupIntent, error } = await stripe.confirmCardSetup(
                cardBtn.dataset.secret, {
                    payment_method: {
                        card: cardElement,
                        billing_details: {
                            name: cardHolderName.value
                        }
                    }
                }
            )

            if(error) {
                cardBtn.disable = false
            } else {
                let token = document.createElement('input')
                token.setAttribute('type', 'hidden')
                token.setAttribute('name', 'paymentMethod')
                token.setAttribute('value', setupIntent.payment_method)
                form.appendChild(token)
                form.submit();
            }
        })
    </script>

</x-app-layout>
