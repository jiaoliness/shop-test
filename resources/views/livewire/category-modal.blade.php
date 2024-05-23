<div>
  <div class="relative w-full max-w-2xl max-h-full">
    <!-- Modal content -->
    <div class="relative bg-white rounded-lg shadow">
      <!-- Modal header -->
      <div class="flex items-center justify-between p-4 border-b rounded-t md:p-5 dark:border-gray-600">
        <h3 class="text-xl font-semibold text-black">
          {{ isset($id) ? 'Edit' : 'Add' }} Category
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
        <form wire:submit="{{ isset($id) ? 'editCategory' : 'addCategory' }}">

          <div class="grid gap-6 mb-6 md:grid-cols-2">
            <div>
              <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
              <input type="text" wire:model="name"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
              @error('name')
                <span class="error">{{ $message }}</span>
              @enderror
            </div>
          </div>

          <div class="">
            <button type="button" type="button"
              class="py-2.5 px-5 ms-3 text-sm font-medium text-white focus:outline-none bg-red-600 rounded-lg border border-gray-200 hover:bg-red-800 focus:z-10 focus:ring-4 focus:ring-gray-100"
              wire:click="$dispatch('closeModal')">Close</button>
            <button type="submit" type="button"
              class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
              <span wire:loading.remove>{{ isset($id) ? 'Edit' : 'Add' }} Category</span>
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
