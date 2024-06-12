<div class="bg-gray-100 min-h-screen p-6">
    <div class="container mx-auto">
        <div class="bg-white shadow-md rounded-lg p-6">
            <div class="flex items-center justify-between mb-4">
                <h1 class="text-3xl font-semibold text-gray-800">Todos</h1>
                <livewire:todo-count :todos="$todos" />
            </div>

            <form wire:submit.prevent="addTodo" class="mb-4 flex items-center">
                <input type="text" wire:model="newTodo" placeholder="Add new todo" class="flex-grow px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                <button type="submit" @addTodo="$refresh" class="ml-2 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg focus:outline-none focus:shadow-outline">
                    Add
                </button>
            </form>
            @error('newTodo') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror

            <ul class="divide-y divide-gray-200">
                @foreach ($todos as $todo)
                    <livewire:todo-item :$todo :key="$todo->id" @remove="$refresh" />
                @endforeach
            </ul>
        </div>
    </div>
</div>
