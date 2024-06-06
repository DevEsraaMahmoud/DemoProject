<div class="wrapper w-full md:max-w-5xl mx-auto pt-20 px-4">
    <h2 class="text-3xl font-semibold mb-6">Create Category</h2>
    <form wire:submit="create" class="bg-gray-100 shadow-md rounded-lg px-8 pt-6 pb-8 mb-4">
        <div class="mb-4">
            <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Title</label>
            <input type="text" id="name" wire:model="form.name" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        @error('form.name') <span class="error">{{ $message }}</span> @enderror
        </div>

        <div class="mb-6">
            <label for="slug" class="block text-gray-700 text-sm font-bold mb-2">Slug</label>
            <input type="text" id="slug" wire:model="form.slug" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        @error('form.slug') <span class="error">{{ $message }}</span> @enderror
        </div>

        <div class="flex items-center justify-between">
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                Save
            </button>
        </div>
    </form>
</div>
