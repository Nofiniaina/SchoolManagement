<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ParcoursResource\Pages;
use App\Filament\Resources\ParcoursResource\RelationManagers;
use App\Models\Parcours;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ParcoursResource extends Resource
{
    protected static ?string $model = Parcours::class;

    protected static ?string $navigationGroup = 'Fields';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->label('Name')
                    ->required(),
                Forms\Components\Select::make('mention_id')
                    ->label('Mention')
                    ->relationship('mention', 'name')
                    ->searchable()
                    ->preload()
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable()
                    ->label('Name'),
                Tables\Columns\TextColumn::make('mention.name')
                    ->searchable()
                    ->label('Mention'),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('mention_id')
                    ->label('Mention')
                    ->relationship('mention', 'name')
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
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
            'index' => Pages\ListParcours::route('/'),
            'create' => Pages\CreateParcours::route('/create'),
            'edit' => Pages\EditParcours::route('/{record}/edit'),
        ];
    }
}
