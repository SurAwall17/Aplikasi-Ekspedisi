<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Ulasan;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\UlasanResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\UlasanResource\RelationManagers;

class UlasanResource extends Resource
{
    protected static ?string $model = Ulasan::class;
    protected static ?string $navigationGroup = 'Interaksi';

    protected static ?string $navigationIcon = 'heroicon-o-chat-bubble-left-right';
    public static function getPluralLabel(): string
    {
        return 'Ulasan';
    }
    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }

    protected static ?int $navigationSort = 7;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('pengiriman.user.name')->searchable(),
                TextColumn::make('komentar')->searchable(),
                TextColumn::make('rating')
                    ->label('Rating')
                    ->formatStateUsing(function ($state) {
                        $stars = '';
                        for ($i = 1; $i <= 5; $i++) {
                            $stars .= $i <= $state
                                ? '⭐'
                                : '☆';
                        }
                        return $stars;
                    })
                    ->html(),

                TextColumn::make('tgl_ulasan')->searchable(),
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
            'index' => Pages\ListUlasans::route('/'),
            'create' => Pages\CreateUlasan::route('/create'),
            'edit' => Pages\EditUlasan::route('/{record}/edit'),
        ];
    }
}
