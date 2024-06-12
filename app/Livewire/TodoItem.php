<?php

namespace App\Livewire;

use App\Models\Todo;
use Livewire\Component;

class TodoItem extends Component
{
    public Todo $todo;

    public function remove()
    {
        $this->dispatch('remove-todo', todoId: $this->todo->id);
    }

    public function toggleStatus($id)
    {
        $todo = Todo::find($id);
        $todo->status = !$todo->status;
        $todo->save();
    }

    public function render()
    {
        return view('livewire.todo-item');
    }
}
