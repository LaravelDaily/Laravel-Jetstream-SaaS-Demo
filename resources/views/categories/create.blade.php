<x-app-layout>
    <x-slot name="header">
        {{ __('Create category') }}
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white p-6 shadow-xl sm:rounded-lg">

                <form action="{{ route('categories.store') }}" method="POST">
                    @csrf

                    <div>
                        <x-jet-label for="name" :value="__('Name')" />
                        <x-jet-input type="text"
                                     id="name"
                                     name="name"
                                     class="block w-full"
                                     value="{{ old('name') }}"
                                     required />
                        <x-jet-input-error for="name" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <x-jet-button>
                            {{ __('Submit') }}
                        </x-jet-button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>
