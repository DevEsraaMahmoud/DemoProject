<div class="bg-gray-100 min-h-screen p-6">
    <div class="container mx-auto">
        <div class="bg-white shadow-md rounded-lg p-6">
            <!-- Post Title -->
            <section>
                <h1 class="text-2xl font-semibold text-gray-800 mb-2">Post Title</h1>
                <h2 class="text-4xl font-semibold text-gray-800 mb-4">{{ $post->title }}</h2>
                <p class="text-gray-600 mb-6">{{ $post->created_at->format('M d, Y') }} by {{ $post->author->name ?? 'Unknown' }}</p>
            </section>

            <!-- Post Description -->
            <section class="mb-6">
                <h2 class="text-2xl font-semibold text-gray-800 mb-2">Description</h2>
                <div class="prose max-w-none">
                    <p>{{ $post->description }}</p>
                </div>
            </section>

            <!-- Post Category -->
            <section class="mb-6">
                <h2 class="text-2xl font-semibold text-gray-800 mb-2">Category</h2>
                <span class="inline-block bg-blue-100 text-blue-800 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded">
                    {{ $post->category->name ?? 'Uncategorized' }}
                </span>
            </section>

            <!-- Back Button -->
            <section>
                <a href="{{ route('posts.index') }}" class="inline-block bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg focus:outline-none focus:shadow-outline">
                    Back to Posts
                </a>

                <button type="submit" wire:click="delete({{ $post->id }})"  wire:confirm="Are you sure you want to delete this post?" class="inline-block bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded-lg focus:outline-none focus:shadow-outline">Delete Post</button>

            </section>
        </div>
    </div>
</div>