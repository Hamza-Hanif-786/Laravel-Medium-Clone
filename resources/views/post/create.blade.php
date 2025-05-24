<x-app-layout>
    <div class="py-4">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xs sm:rounded-lg p-8">
                <form method="post" action="{{ route('post.store') }}" enctype="multipart/form-data" class="space-y-6">
                    @csrf

                    {{-- Image  --}}
                    <div>
                        <x-input-label for="image" :value="('Image')" />
                        <x-text-input id="image" :value="old('image')" class="block border mt-1 w-full file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border file:border-gray-300 file:bg-gray-800 file:focus:bg-gray-700 file:active:bg-gray-900 file:text-white" type="file" name="image" />
                        <x-input-error :messages="$errors->get('image')" class="mt-2" />
                    </div>

                    {{-- Title --}}
                    <div>
                        <x-input-label for="title" :value="('Title')" />
                        <x-text-input id="title" class="block mt-1 w-full" type="text" name="title" :value="old('title')" placeholder="Enter Post Title" />
                        <x-input-error :messages="$errors->get('title')" class="mt-2" />
                    </div>

                    {{-- Category --}}
                    <div>
                        <x-input-label for="category_id" :value="('Category')" />
                        <select id="category_id" name="category_id" :value="old('category_id')" class="block mt-1 w-full border-gray-300 dark:border-gray-700 rounded-lg shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                            <option value="" selected disabled>Select a Category</option>

                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" @selected(old('category_id') == $category->id)>{{ $category->name }}</option>
                            @endforeach
                        </select>
                        <x-input-error :messages="$errors->get('category_id')" class="mt-2" />
                    </div>
                    
                    {{-- Content --}}
                    <div>
                        <x-input-label for="content" :value="('Content')" />
                        <x-text-area id="content" class="block mt-1 w-full" name="content" rows="10" :value="old('content')" placeholder="Enter Post Content" ></x-text-area>
                        <x-input-error :messages="$errors->get('content')" class="mt-2" />
                    </div>
                        
                    <x-primary-button type="submit" class="py-3 px-4 mt-8">
                        Submit
                    </x-primary-button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>