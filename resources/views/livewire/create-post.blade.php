<div class="wrapper w-full md:max-w-5xl mx-auto pt-20 px-4">
    <h2 class="text-3xl font-semibold mb-6">Create Post</h2>

    <form wire:submit="create" class="bg-gray-100 shadow-md rounded-lg px-8 pt-6 pb-8 mb-4">
        <div class="mb-4">
            {{ $this->form }}
        </div>

        <button type="submit" class="btn-submit bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
    Submit
</button>
    </form>

    <x-filament-actions::modals class="modal-class" />
</div>
