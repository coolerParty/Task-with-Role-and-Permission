<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Users') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg px-4 py-4">
                    <x-jet-validation-errors class="mb-4" />

                    <form method="POST" action="{{ route('users.update', $user) }}">
                        @csrf
                        @method('PUT')

                        <div>
                            <x-jet-label for="name" value="{{ __('Name') }}" />
                            <x-jet-input id="name" class="block mt-1 w-full" type="text" name="name"
                                :value="$user->name" required autofocus autocomplete="name" />
                        </div>
                        <div class="form-group">
                            <div class="m-2 p-4"><strong>Roles:</strong></div>
                            @foreach($roles as $value)
                            <div class="m-1 p-2 border shadow-sm w-full"><label>
                                    <input type="checkbox" value="{{ $value->id }}" name="role[]"
                                        class="{{ $value->name  }} rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 bg-indigo-900"
                                        {{ in_array($value->id , $userRoles) ? 'checked' : '' }}>
                                    {{ $value->name }}</label>
                            </div>
                            @endforeach
                        </div>

                        <div class="flex mt-4">
                            <x-jet-button>
                                {{ __('Update User') }}
                            </x-jet-button>
                        </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
