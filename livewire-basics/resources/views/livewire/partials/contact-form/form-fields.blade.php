<div>
  <div>
    <label for="name" class="sr-only">Full name</label>
    <div class="relative rounded-md shadow-sm">
      <input wire:model="contact.name" id="name" name="name" value="{{ old('name') }}"
             class="@error('contact.name')border border-red-500 @enderror form-input block w-full py-3 px-4 placeholder-gray-500 transition ease-in-out duration-150"
             placeholder="Full name">
    </div>
    @error('contact.name')
    <p class="text-red-500 mt-1">{{ $message }}</p>
    @enderror
  </div>
  <div>
    <label for="email" class="sr-only">Email</label>
    <div class="relative rounded-md shadow-sm">
      <input wire:model="contact.email" id="email" type="text" name="email" value="{{ old('email') }}"
             class="@error('contact.email')border border-red-500 @enderror form-input block w-full py-3 px-4 placeholder-gray-500 transition ease-in-out duration-150"
             placeholder="Email">
    </div>
    @error('contact.email')
    <p class="text-red-500 mt-1">{{ $message }}</p>
    @enderror
  </div>
  <div>
    <label for="phone" class="sr-only">Phone</label>
    <div class="relative rounded-md shadow-sm">
      <input wire:model="contact.phone" id="phone" name="phone" value="{{ old('phone') }}"
             class="@error('contact.phone')border border-red-500 @enderror form-input block w-full py-3 px-4 placeholder-gray-500 transition ease-in-out duration-150"
             placeholder="Phone">
    </div>
    @error('contact.phone')
    <p class="text-red-500 mt-1">{{ $message }}</p>
    @enderror
  </div>
  <div>
    <label for="message" class="sr-only">Message</label>
    <div class="relative rounded-md shadow-sm">
                <textarea wire:model="contact.message" id="message" rows="4" name="message"
                          class="@error('contact.message')border border-red-500 @enderror form-input block w-full py-3 px-4 placeholder-gray-500 transition ease-in-out duration-150"
                          placeholder="Message">{{ old('message') }}</textarea>
    </div>
    @error('contact.message')
    <p class="text-red-500 mt-1">{{ $message }}</p>
    @enderror
  </div>
</div>