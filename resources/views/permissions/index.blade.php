<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Permission list') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                    @can('permission-create')
                    <x-link href="{{ route('permissions.create') }}" class="m-4">Add new Permission</x-link>
                    @endcan
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    Task name
                                </th>
                                @can('permission-edit','permission-delete')
                                <th scope="col" class="px-6 py-3">
                                    Action
                                </th>
                                @endcan
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($ps as $p)
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <td class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                                    {{ $p->name }}
                                </td>
                                <td class="px-6 py-4">
                                    @can('permission-edit')
                                    <x-link href="{{ route('permissions.edit', $p) }}">Edit</x-link>
                                    @endcan
                                    @can('permission-delete')
                                    <form method="POST" action="{{ route('permissions.destroy', $p) }}"
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
                                    {{ __('No permissions found') }}
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                    <div class="p-4 m-1">
                        {{ $ps->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
