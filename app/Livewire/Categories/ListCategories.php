<?php

namespace App\Livewire\Categories;

use App\Models\Category;
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

class ListCategories extends Component implements HasTable, HasForms
{
    use InteractsWithTable, InteractsWithForms;

    public function render()
    {
        return view('livewire.categories.list-categories');
    }

    public function table(Table $table): Table
    {
        return $table
            ->query(Category::query())
            ->columns([
                TextColumn::make('name')
                    ->weight('bold')
                    ->sortable(),
                TextColumn::make('slug')
            ])
            ->headerActions([
                // CreateAction::make()
            ])
            ->actions([
                EditAction::make()
                ->form([
                TextInput::make('name'),
                TextInput::make('slug')
                ]),
                DeleteAction::make(),
            ]);
    }
}
