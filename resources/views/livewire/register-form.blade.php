<div>

  <hr class="mt-20">
  @if(session('error'))
    <span class="text-red-500 text-xs block"> {{ session('error') }} <span>
  @endif
  <form wire:submit="create" >
    <div class="space-y-12">
      <div class="border-b border-gray-900/10 pb-12">
        <h2 class="text-base font-semibold leading-7 text-gray-900">Create New Account</h2>

        <div class="mt-3 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
          <div class="sm:col-span-3">
            <label for="name" class="block text-sm font-medium leading-6 text-gray-900">Name</label>
              <div class="mt-2">
                <input type="text" wire:model="form.name" id="name" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                  @error('form.name')
                    <span class="text-red-500 text-xs block">{{ $message }}</span>
                  @enderror
              </div>
          </div>

          <div class="sm:col-span-4">
            <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Email address</label>
            <div class="mt-2">
              <input id="email" wire:model="form.email" type="email"  class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
              @error('form.email')
                <span class="text-red-500 text-xs block">{{ $message }}</span>
              @enderror
            </div>
          </div>

          <div class="sm:col-span-4">
            <label for="password" class="block text-sm font-medium leading-6 text-gray-900">Password</label>
              <div class="mt-2">
                <input id="password" wire:model="form.password" type="password" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                @error('form.password')
                  <span class="text-red-500 text-xs block">{{ $message }}</span>
                @enderror
              </div>
          </div>

          <div class="sm:col-span-4">
            <label for="image" class="block text-sm font-medium leading-6 text-gray-900">Profle Image</label>
            <div class="mt-2">
              <input wire:model="form.image" accept="image/png image/jpeg" id="image" type="file" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
              @error('form.image')
                <span class="text-red-500 text-xs block">{{ $message }}</span>
              @enderror
            </div>
          </div>

          <div>
            @if($form->image)
              <img src="{{$form->image->temporaryUrl() }}" alt="">
              @else
              <p>No Image</p>
            @endif
          </div>
          <div wire:loading wire:target="$form->image">
            <span>Loading...</span>
          </div>

        </div>
      </div>
    </div>

    <div>
      @if(session('success'))
        <span class="text-green-500 text-xs">{{ session('success') }}</span>
      @endif
    
      <div>
        <button type="button"  @click="$dispatch('user-created')"  class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">ReadList</button>
        <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Create</button>
      </div>
    </div>
  </form>

</div>
