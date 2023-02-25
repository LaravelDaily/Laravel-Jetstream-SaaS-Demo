<x-app-layout>
    <x-slot name="header">
        {{ __('Edit task') }}: {{ $task->name }}
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white p-6 shadow-xl sm:rounded-lg">

                <form action="{{ route('tasks.update', $task) }}" method="POST">
                    @csrf
                    @method('PATCH')

                    <div>
                        <x-label for="name" :value="__('Name')" />
                        <x-input type="text"
                                     id="name"
                                     name="name"
                                     class="block w-full"
                                     value="{{ old('name', $task->name) }}"
                                     required />
                        <x-input-error for="name" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <x-label for="category_id" :value="__('Category')" />
                        <select name="category_id" id="category_id" class="w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                            @foreach($categories as $id => $name)
                                <option value="{{ $id }}" @selected(old('category_id', $task->category_id) == $id)>{{ $name }}</option>
                            @endforeach
                        </select>
                        <x-input-error for="category_id" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <x-button>
                            {{ __('Submit') }}
                        </x-button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>
