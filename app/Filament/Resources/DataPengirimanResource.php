<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use App\Models\Pengiriman;
use Filament\Tables\Table;
use Forms\Components\Date;
use Filament\Resources\Resource;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\DatePicker;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\DataPengirimanResource\Pages;
use App\Filament\Resources\DataPengirimanResource\RelationManagers;

class DataPengirimanResource extends Resource
{
    protected static ?string $model = Pengiriman::class;
    protected static ?string $navigationGroup = 'Logistik';
    protected static ?int $navigationSort = 2;

    public static function getPluralLabel(): string
    {
        return 'Data Pengiriman';
    }
    public static function canCreate(): bool
    {
        return false;
    }
    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->whereNotIn('status_pengiriman', ['Menunggu Konfirmasi', 'Menunggu Pembayaran'])
            ->orderBy('bobot_smart', 'desc');
    }
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

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
                TextColumn::make('resi')->label('Resi'),
                TextColumn::make('user.name')->label('Pengirim'),
                TextColumn::make('nama_barang'),
                TextColumn::make('berat')->formatStateUsing(fn ($state) => $state. ' kg'),
                TextColumn::make('volume')->formatStateUsing(fn ($state) => $state. ' cm³'),
                TextColumn::make('penerima'),
                TextColumn::make('harga')->formatStateUsing(fn ($state) => 'Rp ' . number_format($state, 0, ',', '.')),
                TextColumn::make('nohp_penerima')->label('Nohp Penerima'),
                TextColumn::make('truk.nama_truk'),
                TextColumn::make('gudang.kota'),
                TextColumn::make('bobot_smart'),
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
                Tables\Actions\Action::make('kirim')
                ->label('Kirim')
                ->icon('heroicon-o-truck')
                ->color('info')
                ->visible(fn ($record) => $record->status_pengiriman === 'Sedang Diproses')
                ->requiresConfirmation()
                ->modalHeading('Konfirmasi Pengiriman')
                ->modalSubheading('Silakan pilih gudang dan truk untuk pengiriman ini.')
                ->modalButton('Kirim Sekarang')
                ->form(function ($record) {
                    // Jika gudang_id dan truk_id sudah ada, tidak perlu tampilkan form
                    if ($record->gudang_id && $record->truk_id) {
                        return []; // Tidak tampilkan form
                    }

                    return [
                        Forms\Components\Select::make('gudang_id')
                            ->label('Gudang Tujuan')
                            ->options(\App\Models\Gudang::all()->pluck('kode_tempat', 'id'))
                            ->searchable()
                            ->required(),

                        Forms\Components\Select::make('truk_id')
                            ->label('Truk Pengirim')
                            ->options(\App\Models\Truk::all()->pluck('nama_truk', 'id'))
                            ->searchable()
                            ->required(),

                        Forms\Components\DatePicker::make('tgl_pengiriman')
                            ->label('Tanggal Pengiriman')
                            ->native(false)
                            ->default(now())
                            ->required()
                            ->displayFormat('Y-m-d')
                            ->format('Y-m-d'),
                    ];
                })
                ->action(function ($record, array $data) {
                    $record->update([
                        'status_pengiriman' => 'Dalam Perjalanan',
                        'gudang_id' => $record->gudang_id ?? $data['gudang_id'] ?? null,
                        'truk_id' => $record->truk_id ?? $data['truk_id'] ?? null,
                        'tgl_pengiriman' => $data['tgl_pengiriman'] ?? $record->tgl_pengiriman,
                    ]);
                }),



                Tables\Actions\Action::make('konfirmasiSampai')
                    ->label('Tandai Sudah Sampai')
                    ->icon('heroicon-o-question-mark-circle')
                    ->color('warning')
                    ->visible(fn ($record) => $record->status_pengiriman === 'Dalam Perjalanan')
                    ->requiresConfirmation()
                    ->modalHeading('Konfirmasi Pengiriman')
                    ->modalSubheading('Apakah Anda yakin bahwa barang telah sampai di tujuan?')
                    ->modalButton('Ya, Barang Sudah Sampai')
                    ->action(function ($record) {
                        $record->update([
                            'status_pengiriman' => 'Telah Sampai',
                            'gudang_id' => $record->gudang_id == 1 ? 2 : 1,
                        ]);
                        
                    }),

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
            'index' => Pages\ListDataPengirimen::route('/'),
            // 'create' => Pages\CreateDataPengiriman::route('/create'),
            'edit' => Pages\EditDataPengiriman::route('/{record}/edit'),
        ];
    }
}
