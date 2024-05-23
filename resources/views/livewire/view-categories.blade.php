<div>
  <div>
    <div class="relative px-10 py-6 overflow-x-auto rounded-lg shadow-md">
      <div class="flex items-center px-6 py-3 cursor-pointer">
        <button
          class="text-sm px-5 py-2.5 me-2 mb-2 font-medium text-white bg-yellow-400 rounded-lg focus:outline-none hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 dark:focus:ring-yellow-900"
          wire:click="$dispatch('openModal', {component: 'category-modal' } )">Add Category</button>
      </div>

      <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left text-gray-500 rtl:text-right dark:text-gray-400">
          <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
              <th scope="col" class="px-6 py-3">
                Category name
              </th>
              <th scope="col" class="px-6 py-3">
                <span class="sr-only">Actions</span>
              </th>
            </tr>
          </thead>
          <tbody>
            @foreach ($categories as $category)
              <tr
                class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                  {{ $category->name }}
                </th>
                <td class="flex items-center px-6 py-4">
                  <button
                    class="focus:outline-none text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:focus:ring-yellow-900"
                    wire:click="$dispatch('openModal', {component: 'category-modal', arguments: {id: {{ $category->id }}}} )">Edit</button>

                  <button
                    class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900"
                    wire:click="$dispatch('openModal', {component: 'delete-product-modal', arguments: {model: 'category', id: {{ $category->id }}} } )">Delete</button>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>



      <div class="flex items-center px-3 py-6">
        {{ $categories->links(data: ['scrollTo' => false]) }}
      </div>
    </div>



  </div>
</div>
