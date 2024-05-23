<div>
  <div class="relative w-full max-w-2xl max-h-full">
    <!-- Modal content -->
    <div class="relative bg-white rounded-lg shadow">
      <!-- Modal header -->
      <div class="flex items-center justify-between p-4 border-b rounded-t md:p-5 dark:border-gray-600">
        <h3 class="text-xl font-semibold text-black">
          Assign Roles and Permissions to User
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
        <form wire:submit="saveRoles">

          <div class="grid grid-cols-3 gap-2 mb-4">
            <div class="col-span-2 sm:col-span-1">
              <label>
                User
              </label>
              <select wire:model.live="user_id"
                class="bg-white border border-gray-300 text-black text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:focus:ring-primary-500 dark:focus:border-primary-500">
                <option value="">Select User</option>
                @foreach ($users as $user)
                  <option value="{{ $user->id }}" wire:key="{{ $user->id }}">{{ $user->name }}
                  </option>
                @endforeach
              </select>
            </div>
            <div class="col-span-2 sm:col-span-1">
              <p>Roles</p>
              <div class="">
                @foreach ($roles_initial as $r)
                  <input type="checkbox" value="{{ $r->name }}" wire:key="role_{{ $r->id }}"
                    wire:model="roles"
                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500">
                  <label for="default-checkbox"
                    class="text-sm font-medium text-black ms-2">{{ $r->name }}</label><br />
                @endforeach
              </div>
            </div>
            <div class="col-span-2 sm:col-span-1">
              <p>Specific Permissions</p>
              <div class="">
                @foreach ($permissions_initial as $p)
                  <div class="">
                    <input type="checkbox" value="{{ $p->name }}" wire:key="perm_{{ $p->id }}"
                      wire:model="permissions"
                      class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500" />
                    <label for="default-checkbox"
                      class="text-sm font-medium text-black ms-2">{{ $p->name }}</label><br />
                  </div>
                @endforeach
              </div>
            </div>
          </div>
          <div class="">
            <button type="button" type="button"
              class="py-2.5 px-5 ms-3 text-sm font-medium text-white focus:outline-none bg-red-600 rounded-lg border border-gray-200 hover:bg-red-800 focus:z-10 focus:ring-4 focus:ring-gray-100"
              wire:click="$dispatch('closeModal')">Close</button>
            <button type="submit" type="button"
              class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
              <span wire:loading.remove>Sync Permissions</span>
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
