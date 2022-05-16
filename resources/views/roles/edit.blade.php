<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Roles') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg px-4 py-4">
                    <x-jet-validation-errors class="mb-4" />

                    <form method="POST" action="{{ route('roles.update', $role) }}">
                        @csrf
                        @method('PUT')

                        <div>
                            <x-jet-label for="name" value="{{ __('Name') }}" />
                            <x-jet-input id="name" class="block mt-1 w-full" type="text" name="name"
                                :value="$role->name" required autofocus autocomplete="name" />
                        </div>
                        <div class="form-group">
                            <div class="py-4"><strong>Permission:</strong></div>
                            <!-- <div class="grid md:grid-rows-4 md:grid-flow-col gap-1"> -->
                            <div class="grid gap-1 md:grid-cols-4">
                                @foreach($permission as $value)
                                <div class="px-3 py-1 rounded border border-gray-400 bg-slate-300 hover:bg-slate-400">
                                    <label>
                                        <input type="checkbox" value="{{ $value->id }}" name="permission[]"
                                            class="{{ $value->name  }} rounded border-gray-300 text-indigo-600  shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 bg-indigo-300  hover:bg-indigo-900"
                                            {{ in_array($value->id , $rolePermissions) ? 'checked' : '' }}>
                                        <span>{{ $value->name }}</span>
                                    </label>
                                </div>
                                @endforeach
                            </div>
                        </div>

                        <div class="flex mt-5">
                            <x-jet-button>
                                {{ __('Update Role') }}
                            </x-jet-button>
                        </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
