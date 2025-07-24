<?php

namespace App\Filament\Resources;

use Carbon\Carbon;
use Filament\Forms;
use App\Models\Truk;
use App\Models\User;
use Filament\Tables;
use App\Models\Gudang;
use Filament\Forms\Form;
use App\Models\Pengiriman;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\PengirimanResource\Pages;
use App\Filament\Resources\PengirimanResource\RelationManagers;

class PengirimanResource extends Resource
{
    protected static ?string $model = Pengiriman::class;
    protected static ?string $navigationGroup = 'Logistik';

    protected static ?string $navigationIcon = 'heroicon-o-cube';
    public static function getPluralLabel(): string
    {
        return 'Pengiriman';
    }
    // public static function getNavigationBadge(): ?string
    // {
    //     return static::getModel()::count();
    // }
    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->where(function ($query) {
            $query->where('status_pengiriman', 'Menunggu Konfirmasi')
                  ->orWhere('status_pengiriman', 'Menunggu Pembayaran');
        });
    }


    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()
                    ->schema([
                        Select::make('user_id')
                            ->label('Costumer')
                            ->options(User::where('role', 'user')->pluck('name', 'id'))
                            ->searchable()
                            ->required(),

                        // Select::make('truk_id')
                        //     ->label('Truk')
                        //     ->options(Truk::all()->pluck('kode_truk', 'id'))
                        //     ->searchable()
                        //     ->required(),

                        // Select::make('gudang_id')
                        //     ->label('Gudang')
                        //     ->options(Gudang::all()->pluck('kode_tempat', 'id'))
                        //     ->searchable(),
                        
                        TextInput::make('penerima')
                            ->label('Nama Penerima')
                            ->placeholder('Masukkan Nama Penerima')
                            ->required(),

                        TextInput::make('nohp_penerima')
                            ->label('No Hp Penerima')
                            ->placeholder('Masukkan No Hp penerima')
                            ->required(),

                        TextInput::make('nama_barang')
                            ->placeholder('Masukkan Nama Barang')
                            ->required(),

                        TextInput::make('berat')
                            ->numeric()
                            ->suffix('Kg')
                            ->placeholder('0.0')
                            ->required(),

                        TextInput::make('panjang')
                            ->required()
                            ->numeric()
                            ->reactive()
                            ->suffix('cm')
                            ->dehydrated(false)
                            ->afterStateUpdated(function ($state, callable $set, $get){
                                // $panjang = $get('panjang') ?: 0;
                                $lebar = $get('lebar') ?: 0;
                                $tinggi = $get('tinggi') ?: 0;

                                if ($state && $lebar && $tinggi) {
                                    $volume = $state * $lebar * $tinggi;
                                    $set('volume', $volume);
                                }
                            }),

                        TextInput::make('lebar')
                            ->required()                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                               
                            ->numeric()
                            ->reactive()
                            ->suffix('cm')
                            ->dehydrated(false)
                            ->afterStateUpdated(function ($state, callable $set, $get){
                                $panjang = $get('panjang') ?: 0;
                                // $lebar = $get('lebar') ?: 0;
                                $tinggi = $get('tinggi') ?: 0;
                                if ($panjang && $state && $tinggi) {
                                    $volume = $state * $panjang * $tinggi;
                                    $set('volume', $volume);
                                }
                            }),

                        TextInput::make('tinggi')
                            ->required()
                            ->numeric()
                            ->suffix('cm')
                            ->reactive()
                            ->dehydrated(false)
                            ->afterStateUpdated(function ($state, callable $set, $get){
                               $panjang = $get('panjang') ?: 0;
                                $lebar = $get('lebar') ?: 0;
                                // $tinggi = $get('tinggi') ?: 0;

                                if ($panjang && $lebar && $state) {
                                    $volume = $state * $lebar * $panjang;
                                    $set('volume', $volume);
                                }
                            }),

                        TextInput::make('volume')
                            ->placeholder('0')
                            ->required()
                            ->suffix('cm³')
                            ->readOnly(),

                        Select::make('type')
                            ->options([
                                'fragile' => 'Barang Fragile (Mudah Pecah)',
                                'non_fragile' => 'Barang Non-Fragile (Tahan Banting)',
                            ])
                            ->required(),

                        TextInput::make('harga')
                            ->placeholder('0')
                            ->required()
                            ->prefix('Rp'),
                        
                        // Select::make('status_pengiriman')
                        //     ->default('Menunggu Konfirmasi')
                        //     ->hidden()

                    ])
                    ->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('resi')->label('Resi'),
                TextColumn::make('user.name')->label('Pengirim'),
                TextColumn::make('nama_barang'),
                TextColumn::make('berat')->formatStateUsing(fn ($state) => $state. ' kg'),
                TextColumn::make('volume')->formatStateUsing(fn ($state) => $state. ' cm³'),
                TextColumn::make('penerima'),
                TextColumn::make('harga')->formatStateUsing(fn ($state) => 'Rp ' . number_format($state, 0, ',', '.')),
                TextColumn::make('nohp_penerima')->label('Nohp Penerima'),
                // TextColumn::make('truk.nama_truk'),
                // TextColumn::make('gudang.alamat'),
                TextColumn::make('status_pengiriman')->label('Status Pengiriman')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'Menunggu Pembayaran' => 'info',
                        'Menunggu Konfirmasi' => 'info',
                        'Sedang Diproses' => 'warning',
                        'Telah Sampai' => 'success',
                        default => 'gray',
                    })
                    ->icon(fn (string $state): string => match ($state) {
                        'Menunggu Pembayaran'   => 'heroicon-o-currency-dollar',
                        'Menunggu Konfirmasi'   => 'heroicon-o-clock',                
                        'Sedang Diproses'       => 'heroicon-o-truck',                
                        'Telah Sampai'          => 'heroicon-o-check-circle',         
                        default                 => 'heroicon-o-question-mark-circle', 
                    }),

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
            'index' => Pages\ListPengirimen::route('/'),
        ];
    }
}
