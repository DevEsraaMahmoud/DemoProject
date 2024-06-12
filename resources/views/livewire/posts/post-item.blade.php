<tr>
    <td class="border px-4 py-2">{{ $post->title }}</td>
    <td class="border px-4 py-2">{{ $post->description }}</td>
    <td class="border px-4 py-2">{{ $post->category->name }}</td>
    <td class="border px-4 py-2">
        <button type="button" wire:confirm="Are you sure you want to delete this post?"
        wire:click="delete({{ $post->id }})"
        wire:loading.class="opacity-50" wire:loading.attr="disabled"
        class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 rounded
        focus:outline-none focus:shadow-outline">
            Delete
        </button>
        <button wire:click="edit({{$post->id}})"
            wire:loading.class="opacity-50" wire:loading.attr="disabled"
            class="bg-blue-500 hover:bg-blue-700
            text-white font-bold py-1 px-2 rounded focus:outline-none focus:shadow-outline">
            Edit
        </button>
        <button wire:click="show({{$post->id}})"
            wire:loading.class="opacity-50" wire:loading.attr="disabled"
            class="bg-blue-500 hover:bg-blue-700
            text-white font-bold py-1 px-2 rounded focus:outline-none focus:shadow-outline">
            Show
        </button>
        <div wire:loading wire:target="delete({{ $post->id }})">
            Removing post...
        </div>
        @if($post->photo)
        <button type="button"
        class="bg-green-500 hover:bg-green-700
        text-white font-bold py-1 px-2 rounded focus:outline-none focus:shadow-outline"
        wire:click="download({{ $post->id}})">Download</button>
        @endif
    </td>
</tr>