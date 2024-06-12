use App\Livewire\CountDown;
<div class="wrapper w-full md:max-w-5xl mx-auto pt-20 px-4">
    <p class="alert alert-warning bg-red-500 text-white" wire:offline>
        Whoops, your device has lost connection. The web page you are viewing is offline.
    </p>
    <div class="flex items-center justify-between mb-6">
        <h2 class="text-3xl font-semibold">{{ $title }}</h2>
        <a href="#" wire:click="createPost" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
            Create
        </a>
    </div>

    <div class="mb-4">
        <input type="text" wire:model.live="search" placeholder="Search posts..." class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
        {{-- <form wire:submit="search">
            <input type="text" wire:model="search" placeholder="Search posts..."
            class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">

            <button type="submit"
            class="bg-blue-500 hover:bg-blue-700
            text-white font-bold py-1 px-2 rounded focus:outline-none focus:shadow-outline">Search posts</button>

            </form> --}}
        <button wire:click="$set('search', '')">Reset Search</button>
    </div>

    @if (session()->has('message'))
    <div class="alert alert-success mb-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative">
        {{ session('message') }}
    </div>
    @endif

    <div class="overflow-x-auto">
        <table class="table-auto w-full bg-white border-collapse">
            <thead>
                <tr class="bg-gray-100">
                    <th class="border px-4 py-2">Title</th>
                    <th class="border px-4 py-2">Description</th>
                    <th class="border px-4 py-2">Category</th>
                    <th class="border px-4 py-2">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($this->posts as $post)
                <livewire:posts.post-item :post="$post" :key="$post->id">
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="items-center mt-4">
        {{ $this->posts->links() }}
    </div>
</div>