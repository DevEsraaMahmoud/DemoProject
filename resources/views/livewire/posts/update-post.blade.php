<div class="wrapper w-full md:max-w-5xl mx-auto pt-20 px-4">
    <h2 class="text-3xl font-semibold mb-6">Create Post</h2>
    <form wire:submit="save" class="bg-gray-100 shadow-md rounded-lg px-8 pt-6 pb-8 mb-4">
        <div class="mb-4">
            <label for="title" class="block text-gray-700 text-sm font-bold mb-2">Title</label>
            <input type="text" id="title" wire:model.blur="form.title" wire:dirty.class="border-yellow" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            <div>@error('form.title') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror</div>
        </div>

        <div class="mb-6">
            <label for="description" class="block text-gray-700 text-sm font-bold mb-2">Description</label>
            <textarea id="description" wire:model.blur="form.description" rows="5" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"></textarea>
            <div>@error('form.description') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror</div>
        </div>

        <div class="mb-4">
            <label for="category" class="block text-gray-700 text-sm font-bold mb-2">Select Category</label>
            <select id="category" wire:model.defer="form.category_id" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                <option value="">Choose a category</option>
                @foreach($categories as $key => $value)
                    <option value="{{ $key }}">{{ $value }}</option>
                @endforeach
            </select>
            <div>@error('form.category_id') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror</div>
        </div>

        <div class="mb-4">
            <input type="checkbox" id="is_published" wire:model="form.is_published" class="mr-2 leading-tight">
            <label for="is_published" class="text-gray-700 text-sm font-bold">Published</label>
        </div>

        <div class="mb-4">
            <label for="checkbox" class="block text-gray-700 text-sm font-bold mb-2">Types</label>
            <input type="checkbox" value="type1" wire:model="updateTypes"> type1
            <input type="checkbox" value="type2" wire:model="updateTypes"> type2
            <input type="checkbox" value="type3" wire:model="updateTypes"> type3
        </div>

        <div class="mb-4">
            <label for="checkbox" class="block text-gray-700 text-sm font-bold mb-2">Option</label>
            <input type="radio" value="yes" wire:model="receiveUpdates"> yes
            <input type="radio" value="no" wire:model="receiveUpdates"> no
        </div>

        <div class="flex items-center justify-between">
            <button type="submit" wire:loading.class="opacity-50" wire:loading.attr="disabled" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                Save
            </button>

            <div wire:loading>
                Saving post...
            </div>
        </div>
    </form>
</div>