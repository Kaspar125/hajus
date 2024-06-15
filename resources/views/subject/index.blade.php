<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form method="POST" action="/api/my-favorite-subjects">
                        @csrf

                        <div>
                            <x-input-label for="title" :value="__('title')"/>
                            <x-text-input id="website" class="block mt-1 w-full" type="text" name="title"/>
                            <x-input-error :messages="$errors->get('title')" class="mt-2"/>
                        </div>
                        <div>
                            <x-input-label for="description" :value="__('description')"/>
                            <x-text-input id="description" class="block mt-1 w-full" type="text" name="description"/>
                            <x-input-error :messages="$errors->get('description')" class="mt-2"/>
                        </div>
                        <div>
                            <x-input-label for="website" :value="__('website')"/>
                            <x-text-input id="website" class="block mt-1 w-full" type="text" name="website"/>
                            <x-input-error :messages="$errors->get('website')" class="mt-2"/>
                        </div>
                        <div>
                            <x-input-label for="is_awesome" :value="__('is_awesome')"/>
                            <input id="is_awesome" type="checkbox"
                                   class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500"
                                   name="is_awesome">
                            <x-input-error :messages="$errors->get('is_awesome')" class="mt-2"/>
                        </div>
                        <div>
                            <x-input-label for="image" :value="__('image')"/>
                            <input id="image" type="file"
                                   class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500"
                                   name="image">
                            <x-input-error :messages="$errors->get('image')" class="mt-2"/>
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <x-primary-button>
                                {{ __('Submit') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
</x-app-layout>