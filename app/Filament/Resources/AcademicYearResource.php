<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AcademicYearResource\Pages;
use App\Filament\Resources\AcademicYearResource\RelationManagers;
use App\Models\AcademicYear;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class AcademicYearResource extends Resource
{
    protected static ?string $model = AcademicYear::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('start_year')
                    ->label('Start Year')
                    ->integer()
                    ->minValue(1990)
                    ->maxValue(2030)
                    ->required(),
                Forms\Components\TextInput::make('end_year')
                    ->label('End Year')
                    ->integer()
                    ->minValue(1990)
                    ->maxValue(2030)
                    ->required(),
                Forms\Components\TextInput::make('label')
                    ->label('Label')
                    ->required(),
                Forms\Components\Select::make('status')
                    ->options([
                        'active' => 'Active',
                        'inactive' => 'Inactive'
                    ])
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('start_year')
                    ->searchable()
                    ->label('Start Year'),
                Tables\Columns\TextColumn::make('end_year')
                    ->searchable()
                    ->label('End Year'),
                Tables\Columns\TextColumn::make('label')
                    ->searchable()
                    ->label('Label'),
                Tables\Columns\TextColumn::make('status')
                    ->searchable()
                    ->label('Status')
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
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
            'index' => Pages\ListAcademicYears::route('/'),
            'create' => Pages\CreateAcademicYear::route('/create'),
            'edit' => Pages\EditAcademicYear::route('/{record}/edit'),
            'view' => Pages\ViewAcademicYear::route('/{record}')
        ];
    }
}
