<div class="wrapper w-full md:max-w-5xl mx-auto pt-20 px-4">
    <h2 class="text-3xl font-semibold mb-6">Create Post</h2>
    <form wire:submit="create" class="bg-gray-100 shadow-md rounded-lg px-8 pt-6 pb-8 mb-4">
        <div class="mb-4">
            <label for="title" class="block text-gray-700 text-sm font-bold mb-2">Title</label>
            <input type="text" id="title" wire:model.blur="form.title" wire:dirty.class="border-yellow-500" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            <div>@error('form.title') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror</div>
        </div>

        <div class="mb-6">
            <label for="description" class="block text-gray-700 text-sm font-bold mb-2">Description</label>
            <textarea id="description" wire:model.blur="form.description" rows="5" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"></textarea>
            <div>@error('form.description') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror</div>
        </div>

        <div class="mb-6">
            <div
            x-data="{ uploading: false, progress: 0 }"
            x-on:livewire-upload-start="uploading = true"
            x-on:livewire-upload-finish="uploading = false"
            x-on:livewire-upload-cancel="uploading = false"
            x-on:livewire-upload-error="uploading = false"
            x-on:livewire-upload-progress="progress = $event.detail.progress">
            <!-- File Input -->
            <input type="file" wire:model="form.photo">

            <div>@error('form.photo') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror</div>

            <!-- Progress Bar -->
            <div x-show="uploading">
                <progress max="100" x-bind:value="progress"></progress>
            </div>
        </div>
        </div>

        <div class="mb-6">
            <livewire:components.select :options="$categories" wire:model="form.category_id" />
                <div>@error('form.category_id') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror</div>
        </div>



        <div class="mb-4">
            <input type="checkbox" wire:model="form.is_published" /> Published
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

        <div class="mb-4">
            <select wire:model.live="selectedOption">
                <option value="" selected> Select Category </option>
                @foreach (\App\Models\Category::all() as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>

            <select wire:model.live="selectedPost" wire:key="{{ $selectedOption }}">
                <option value="" selected> Select Post </option>
                @foreach (\App\Models\Post::whereCategoryId($selectedOption)->get() as $post)
                <option value="{{ $post->id }}">{{ $post->title }}</option>
                @endforeach
            </select>
        </div>

        <div class="flex items-center justify-between">
            @foreach($errors->all() as $error)
                {{$error}}
            @endforeach
            <button wire:offline.attr="disabled" type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                Save
            </button>

        </div>
    </form>
</div>