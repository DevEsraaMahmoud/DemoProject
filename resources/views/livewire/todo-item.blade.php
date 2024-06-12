<li class="flex items-center justify-between py-2">
    <div class="flex items-center">
        <input type="checkbox" wire:click="toggleStatus({{ $todo->id }})" class="mr-2 leading-tight" @if($todo->status) checked @endif>
        <span>{{ $todo->title }}</span>
    </div>
    <button wire:confirm="Are you sure you want to delete this todo?" wire:click="remove" @remove="$refresh" class="text-red-500 hover:text-red-700 font-semibold">Remove</button>
</li>
