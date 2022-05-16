<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Users list') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                    @can('user-create')
                    <x-link href="{{ route('users.create') }}" class="m-4">Add new User</x-link>
                    @endcan
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    User name
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Roles
                                </th>
                                @can('user-edit','user-delete')
                                <th scope="col" class="px-6 py-3">
                                    Action
                                </th>
                                @endcan
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($users as $user)
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <td class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                                    {{ $user->name }}
                                </td>
                                <td class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                                    @foreach($user->roles as $role)
                                    <span class="px-3 py-1 rounded space-x-1 bg-indigo-500 text-white">{{ $role->name
                                        }}</span>
                                    @endforeach
                                </td>
                                <td class="px-6 py-4">
                                    @can('user-edit')
                                    <x-link href="{{ route('users.edit', $user) }}">Edit</x-link>
                                    @endcan
                                    @can('user-delete')
                                    <form method="POST" action="{{ route('users.destroy', $user) }}"
                                        class="inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <x-jet-danger-button type="submit" onclick="return confirm('Are you sure?')">
                                            Delete</x-jet-danger-button>
                                    </form>
                                    @endcan
                                </td>
                            </tr>
                            @empty
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <td colspan="2"
                                    class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                                    {{ __('No Roles found') }}
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
