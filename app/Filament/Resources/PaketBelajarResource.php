<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PaketBelajarResource\Pages;
use App\Filament\Resources\PaketBelajarResource\RelationManagers;
use App\Models\PaketBelajar;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PaketBelajarResource extends Resource
{
    protected static ?string $model = PaketBelajar::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\FileUpload::make('image')
                    ->required()
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('name')
                    ->required(),
                Forms\Components\TextInput::make('price')
                    ->required()
                    ->numeric(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('image'),
                Tables\Columns\TextColumn::make('name'),
                Tables\Columns\TextColumn::make('price')
                ->formatStateUsing(fn(string $state): string => 'Rp. ' . number_format($state, 0, ',', '.')),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
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
            'index' => Pages\ListPaketBelajars::route('/'),
            'create' => Pages\CreatePaketBelajar::route('/create'),
            'edit' => Pages\EditPaketBelajar::route('/{record}/edit'),
        ];
    }
}