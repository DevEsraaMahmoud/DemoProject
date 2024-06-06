<div class="wrapper w-full md:max-w-5xl mx-auto pt-20 px-4">
    <h2 class="text-3xl font-semibold mb-6">Create Post</h2>
    <form wire:submit="create" class="bg-gray-100 shadow-md rounded-lg px-8 pt-6 pb-8 mb-4">
        <div class="mb-4">
            <label for="title" class="block text-gray-700 text-sm font-bold mb-2">Title</label>
            <input type="text" id="title" wire:model="form.title" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        @error('form.title') <span class="error">{{ $message }}</span> @enderror
        </div>

        <div class="mb-6">
            <label for="description" class="block text-gray-700 text-sm font-bold mb-2">Description</label>
            <textarea id="description" wire:model="form.description" rows="5" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"></textarea>
        @error('form.description') <span class="error">{{ $message }}</span> @enderror
        </div>

        <div class="mb-4">
        <label for="select" class="block text-gray-700 text-sm font-bold mb-2">Select Category</label>
            <livewire:components.select :options="$categories" wire:model="form.category_id" />
            @error('form.category_id') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div class="mb-4">
        <label for="checkbox" class="block text-gray-700 text-sm font-bold mb-2">Is Published</label>
        <livewire:components.checkbox :label="'is Published'" :isChecked="true" wire:model="form.is_published"/>
        </div>


        <div class="flex items-center justify-between">
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                Save
            </button>
        </div>
    </form>
</div>
