<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add New User') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg px-4 py-4">
                    <x-jet-validation-errors class="mb-4" />

                    <form method="POST" action="{{ route('users.store') }}">
                        @csrf

                        <div>
                            <x-jet-label for="name" value="{{ __('Name') }}" />
                            <x-jet-input id="name" class="block mt-1 w-full" type="text" name="name"
                                :value="old('name')" required autofocus autocomplete="name" />
                        </div>

                        <div>
                            <x-jet-label for="email" value="{{ __('Email') }}" />
                            <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email"
                                :value="old('email')" required autofocus autocomplete="email" />
                        </div>

                        <div class="col-span-6 sm:col-span-4">
                            <x-jet-label for="password" value="{{ __('New Password') }}" />
                            <x-jet-input id="password" type="password" class="mt-1 block w-full" name="password"
                                required autocomplete="new-password" />
                            <x-jet-input-error for="password" class="mt-2" />
                        </div>

                        <div class="col-span-6 sm:col-span-4">
                            <x-jet-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                            <x-jet-input id="password_confirmation" type="password" class="mt-1 block w-full"
                                name="password_confirmation" required autocomplete="new-password" />
                            <x-jet-input-error for="password_confirmation" class="mt-2" />
                        </div>

                        <div class="form-group">
                            <strong>Roles:</strong>
                            <br />
                            @foreach($roles as $value)
                            <div class="m-1 p-2 border shadow-sm w-full"><label>
                                    <input type="checkbox" value="{{ $value->name }}" name="role[]"
                                        class="{{ $value->name }} rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 bg-indigo-900">
                                    {{ $value->name }}
                                </label>
                            </div>
                            @endforeach
                        </div>

                        <div class="flex mt-4">
                            <x-jet-button>
                                {{ __('Save User') }}
                            </x-jet-button>
                        </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
