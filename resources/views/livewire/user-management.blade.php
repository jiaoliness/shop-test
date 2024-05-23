<div>
  <div class="px-3 py-3 sm:px-6">
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
      <table class="w-full text-sm text-left text-gray-500 rtl:text-right dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
          <tr>
            <th scope="col" class="px-6 py-3">
              User
            </th>
            <th scope="col" class="px-6 py-3">
              Email
            </th>
            <th scope="col" class="px-6 py-3">
              Roles
            </th>
            <th scope="col" class="px-6 py-3">
              Specific Permissions
            </th>
            <th scope="col" class="px-6 py-3">
              <span class="sr-only">Assign Role</span>
            </th>
          </tr>
        </thead>
        <tbody>
          @foreach ($users as $user)
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
              <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                {{ $user->name }}
              </th>
              <td class="px-6 py-4">
                {{ $user->email }}
              </td>
              <td class="px-6 py-4">
                @foreach ($user->getRoleNames() as $role)
                  {{ $role }} @if (!$loop->last)
                    ,
                  @endif
                @endforeach
              </td>
              <td class="px-6 py-4">
                @foreach ($user->getDirectPermissions() as $permission)
                  {{ $permission->name }} @if (!$loop->last)
                    ,
                  @endif
                @endforeach
              </td>
              <td class="px-6 py-4 text-right">
                <button
                  wire:click="$dispatch('openModal', {component: 'assign-roles-modal', arguments: {user: {{ $user->id }}} } )"
                  class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Assign</button>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>

  </div>
</div>
