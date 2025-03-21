<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AcademicClassResource\Pages;
use App\Filament\Resources\AcademicClassResource\RelationManagers;
use App\Models\AcademicClass;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class AcademicClassResource extends Resource
{
    protected static ?string $model = AcademicClass::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->label('Name')
                    ->required(),
                Forms\Components\Select::make('level')
                    ->label('Level')
                    ->options([
                        'L1' => 'L1',
                        'L2' => 'L2',
                        'L3' => 'L3',
                        'M1' => 'M1',
                        'M2' => 'M2',
                        'D' => 'D',
                    ])
                    ->required(),
                Forms\Components\Textarea::make('description')
                    ->label('Description'),
                Forms\Components\Select::make("mention_id")
                    ->label("Mention")
                    ->relationship("mention", "name")
                    ->searchable()
                    ->preload()
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('level')
                    ->searchable()
                    ->label('Level'),
                Tables\Columns\TextColumn::make('description')
                    ->searchable()
                    ->label('Description'),
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
            'index' => Pages\ListAcademicClasses::route('/'),
            'create' => Pages\CreateAcademicClass::route('/create'),
            'edit' => Pages\EditAcademicClass::route('/{record}/edit'),
        ];
    }
}
