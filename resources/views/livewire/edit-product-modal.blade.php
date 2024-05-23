<div>
  <div class="relative w-full max-w-2xl max-h-full">
    <!-- Modal content -->
    <div class="relative bg-white rounded-lg shadow">
      <!-- Modal header -->
      <div class="flex items-center justify-between p-4 border-b rounded-t md:p-5 dark:border-gray-600">
        <h3 class="text-xl font-semibold text-black">
          Edit Product
        </h3>
        <button wire:click="$dispatch('closeModal')" type="button"
          class="inline-flex items-center justify-center w-8 h-8 text-sm text-gray-400 bg-transparent rounded-lg hover:bg-gray-200 hover:text-gray-900 ms-auto dark:hover:bg-gray-600 dark:hover:text-white"
          data-modal-hide="default-modal">
          <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
          </svg>
          <span class="sr-only">Close modal</span>
        </button>
      </div>

      <div class="p-4 space-y-4 md:p-5">
        <form wire:submit="editProduct">

          <div class="grid gap-6 mb-6 md:grid-cols-2">
            <div>
              <label for="first_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
              <input type="text" wire:model="name"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder="Macbook pro" required />
            </div>
            <div>
              <label for="last_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Brand</label>
              <input type="text" wire:model="brand"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder="Apple" required />
            </div>
            <div class="col-span-2 sm:col-span-1">
              <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Categories</label>
              @foreach ($categories_list as $c)
                <input type="checkbox" value="{{ $c->id }}" wire:key="cat_{{ $c->id }}"
                  wire:model="categories"
                  class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500">
                <label for="default-checkbox"
                  class="text-sm font-medium text-black ms-2">{{ $c->name }}</label><br />
              @endforeach
            </div>
          </div>

          <label for="message" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
          <textarea wire:model="description" rows="6"
            class="mb-4 block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
            placeholder="With the new M4 chip.."></textarea>

          <div class="">
            <button type="button" type="button"
              class="py-2.5 px-5 ms-3 text-sm font-medium text-white focus:outline-none bg-red-600 rounded-lg border border-gray-200 hover:bg-red-800 focus:z-10 focus:ring-4 focus:ring-gray-100"
              wire:click="$dispatch('closeModal')">Close</button>
            <button type="submit" type="button"
              class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
              <span wire:loading.remove>Save</span>
              <div wire:loading>
                Saving...
              </div>
            </button>
          </div>
        </form>
      </div>

    </div>
  </div>
</div>
