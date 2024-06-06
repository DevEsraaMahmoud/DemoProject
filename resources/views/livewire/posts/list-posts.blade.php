<div class="wrapper w-full md:max-w-5xl mx-auto pt-20 px-4">
    <div class="flex items-center justify-between mb-6">
        <h2 class="text-3xl font-semibold">List Posts</h2>
        <livewire:components.button text="Create Post" url="{{ route('create.posts') }}" />
    </div>
    {{ $this->table }}
</div>
