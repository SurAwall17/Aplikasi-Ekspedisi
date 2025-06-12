<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Gudang;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\GudangResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\GudangResource\RelationManagers;

class GudangResource extends Resource
{
    protected static ?string $model = Gudang::class;
    protected static ?string $navigationGroup = 'Logistik';
    protected static ?string $navigationIcon = 'heroicon-o-circle-stack';
    public static function getPluralLabel(): string
    {
        return 'Gudang';
    }

    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('kode_tempat')->label('Kode Tempat')->required(),
                // TextInput::make('kategori')->label('Kategori')->required(),
                Select::make('kategori')
                    ->label('Kategori')
                    ->options([
                        'Makanan' => 'Makanan',
                        'Elektronik' => 'Elektronik',
                        'Pakaian' => 'Pakaian',
                        'Perabot' => 'Perabot',
                        'Dokumen' => 'Dokumen',
                        'Kesehatan' => 'Kesehatan',
                        'Peralatan' => 'Peralatan',
                        'Alat Tulis' => 'Alat Tulis',
                        'Produk Bayi' => 'Produk Bayi',
                        'Produk Hewan' => 'Produk Hewan',
                        'Kosmetik' => 'Kosmetik',
                        'Lainnya' => 'Lainnya',
                    ])
                    ->required(),

                TextInput::make('alamat')
                    ->label('Alamat')
                    ->required(),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('kode_tempat')->searchable(),
                TextColumn::make('kategori')->searchable(),
                TextColumn::make('alamat')->searchable(),
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
            'index' => Pages\ListGudangs::route('/'),
        ];
    }
}
