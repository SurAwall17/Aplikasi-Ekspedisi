<?php

namespace App\Filament\Resources;

use Filament\Forms;
use App\Models\User;
use Filament\Tables;
use Filament\Forms\Form;
use App\Models\Notifikasi;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\NotifikasiResource\Pages;
use App\Filament\Resources\NotifikasiResource\RelationManagers;

class NotifikasiResource extends Resource
{
    protected static ?string $model = Notifikasi::class;
    protected static ?string $navigationGroup = 'Interaksi';

    protected static ?string $navigationIcon = 'heroicon-o-bell';
    public static function getPluralLabel(): string
    {
        return 'Notifikasi';
    }

    protected static ?int $navigationSort = 5;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('user_id')
                    ->label('Costumer')
                    ->options(User::where('role', 'user')->pluck('name', 'id'))
                    ->searchable()
                    ->required(),

                TextInput::make('pesan')
                    ->required(),

                TextInput::make('status_dibaca')
                    ->required(),

                TextInput::make('tanggal')
                    ->required()

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('user_id')
                    ->label('Nama Costumer')
                    ->searchable(),

                TextColumn::make('pesan')
                    ->searchable(),

                TextColumn::make('status_dibaca')
                    ->searchable(),

                TextColumn::make('tanggal')
                    ->searchable(),
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
            'index' => Pages\ListNotifikasis::route('/'),
        ];
    }
}
