<?php

namespace App\Filament\Resources;

use Filament\Forms;
use App\Models\Truk;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\TrukResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\TrukResource\RelationManagers;

class TrukResource extends Resource
{
    protected static ?string $model = Truk::class;

    protected static ?string $navigationGroup = 'Logistik';
    protected static ?string $navigationIcon = 'heroicon-o-truck';
    public static function getPluralLabel(): string
    {
        return 'Truk';
    }
    protected static ?int $navigationSort = 4;
    

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('kode_truk'),
                TextInput::make('nama_truk'),   
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('kode_truk'),
                TextColumn::make('nama_truk'),
                
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make()->color('warning'),
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
            'index' => Pages\ListTruks::route('/'),
        ];
    }
}
