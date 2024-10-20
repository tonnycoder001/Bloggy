<div class="max-w-2xl mx-auto p-6 bg-white shadow-md rounded-md mt-12">
    <h1 class="text-3xl font-semibold mb-6 text-gray-800">Create New Post</h1>

    {{-- Flash message --}}
    @if (session()->has('message'))
        <div class="mb-4 p-4 bg-green-100 border-l-4 border-green-500 text-green-700 rounded">
            {{ session('message') }}
        </div>
    @endif

    <form wire:submit.prevent="createPost" class="space-y-6">
        {{-- Title Input --}}
        <div>
            <label for="title" class="block text-sm font-medium text-gray-700 mb-2">Title</label>
            <input id="title" type="text" wire:model="title"
                class="block w-full p-3 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                placeholder="Enter the title">
            @error('title')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        {{-- Content Input --}}
        <div>
            <label for="content" class="block text-sm font-medium text-gray-700 mb-2">Content</label>
            <textarea id="content" wire:model="content"
                class="block w-full p-3 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                rows="6" placeholder="Write your post here"></textarea>
            @error('content')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        {{-- image input --}}
        <div>
            <label for="image" class="block text-sm font-medium text-gray-700">Image</label>
            <input wire:mode="image" id="image" type="file" accept="image/png, image/jpeg, image/jpg"
                class="mt-2 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-600 hover:file:bg-indigo-100">
            @error('image')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror

            @if ($image)
                <img src="{{ $image->temporaryUrl() }}" alt="Uploaded Image" class="mt-2 w-full">
            @endif
        </div>

        {{-- Submit Button --}}
        <div>
            <button type="submit"
                class="w-full py-3 px-4 bg-blue-600 text-white font-semibold rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                Create Post
            </button>
        </div>
    </form>
</div>
