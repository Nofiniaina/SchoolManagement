<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MentionResource\Pages;
use App\Filament\Resources\MentionResource\RelationManagers;
use App\Models\Mention;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class MentionResource extends Resource
{
    protected static ?string $model = Mention::class;

    protected static ?string $navigationGroup = 'Fields';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->label('Name')
                    ->required(),
                Forms\Components\Select::make('domaine_id')
                    ->label('Domaine')
                    ->relationship('domaine', 'name')
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
                Tables\Columns\TextColumn::make('domaine.name')
                    ->searchable()
                    ->label('Domaine'),
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
            'index' => Pages\ListMentions::route('/'),
            'create' => Pages\CreateMention::route('/create'),
            'edit' => Pages\EditMention::route('/{record}/edit'),
        ];
    }
}
