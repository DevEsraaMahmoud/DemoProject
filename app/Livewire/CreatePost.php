<?php

namespace App\Livewire;

use App\Models\Post;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Livewire\Component;
use Illuminate\Contracts\View\View;

class CreatePost extends Component implements HasForms
{
    use InteractsWithForms;

    public ?array $data = [];

    public function mount(): void
    {
        $this->form->fill();
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('title'),
                Textarea::make('description')
            ])
            ->statePath('data');
    }

    public function create(): void
    {
        Post::create($this->form->getState());
    }

    public function render(): View
    {
        return view('livewire.create-post');
    }
}
