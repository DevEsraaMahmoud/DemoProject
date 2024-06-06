<?php

namespace App\Livewire\Posts;

use App\Models\Post;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Actions\CreateAction;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\EditAction;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Table;
use Livewire\Component;
use Filament\Tables;

class ListPosts extends Component implements HasTable, HasForms
{
    use InteractsWithTable, InteractsWithForms;

    public function render()
    {
        return view('livewire.posts.list-posts');
    }

    public function table(Table $table): Table
    {
        return $table
            ->query(Post::query())
            ->columns([
                TextColumn::make('title')
                    ->weight('bold')
                    ->sortable(),
                TextColumn::make('description')
            ])
            ->headerActions([
                // CreateAction::make()
            ])
            ->actions([
                EditAction::make()
                ->form([
                TextInput::make('title'),
                Textarea::make('description')
                ]),
                DeleteAction::make(),
            ]);
    }
}
