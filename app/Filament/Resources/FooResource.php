<?php

namespace App\Filament\Resources;

use App\Filament\Resources\FooResource\Pages;
use App\Filament\Resources\FooResource\RelationManagers;
use App\Models\Foo;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class FooResource extends Resource
{
    protected static ?string $model = Foo::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Repeater::make('items')
                    ->schema([
                        Forms\Components\Select::make('select')
                            ->searchable()
                            ->options([
                                'a' => 'A',
                                'b' => 'B',
                                'c' => 'C',
                                'd' => 'D'
                            ])
                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->emptyStateActions([
                Tables\Actions\CreateAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListFoos::route('/'),
            'create' => Pages\CreateFoo::route('/create'),
            'edit' => Pages\EditFoo::route('/{record}/edit'),
        ];
    }
}
