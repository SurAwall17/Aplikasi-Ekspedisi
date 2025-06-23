<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use App\Models\Pembayaran;
use Filament\Tables\Table;
use Filament\Actions\Action;
use Filament\Resources\Resource;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\PembayaranResource\Pages;
use App\Filament\Resources\PembayaranResource\RelationManagers;

class PembayaranResource extends Resource
{
    protected static ?string $model = Pembayaran::class;
    protected static ?string $navigationGroup = 'Keuangan';

    protected static ?string $navigationIcon = 'heroicon-o-credit-card';
    public static function getPluralLabel(): string
    {
        return 'Pembayaran';
    }
    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }

    protected static ?int $navigationSort = 4;

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
                TextColumn::make('user.pengiriman.resi'),
                TextColumn::make('user.name')->label('Pengirim'),
                TextColumn::make('user.pengiriman.harga'),
                ImageColumn::make('bukti_pembayaran')->square(),
                TextColumn::make('status')
                ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'Telah Dikonfirmasi' => 'success',
                        'Menunggu Konfirmasi' => 'warning',
                    })
                    ->icon(fn (string $state): string => match ($state) {
                        'Menunggu Konfirmasi' => 'heroicon-o-clock',
                        'Telah Dikonfirmasi' => 'heroicon-o-check-circle',
                    }),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\Action::make('lihat_bukti')
                    ->label('Lihat Bukti')
                    ->icon('heroicon-o-eye')
                    ->color('info')
                    ->visible(fn ($record) => !empty($record->bukti_pembayaran))
                    ->url(fn ($record) => asset('storage/' . $record->bukti_pembayaran))
                    ->openUrlInNewTab(),
                    // Tables\Actions\EditAction::make(),
                    
                Tables\Actions\Action::make('konfirmasi')
                    ->label('Konfirmasi')
                    ->icon('heroicon-o-check-badge')
                    ->color('success')
                    ->modalHeading('Konfirmasi Pembayaran')
                    ->requiresConfirmation()
                    ->modalSubHeading('Anda yakin ingin mengkonfirmasi pembayaran ini?')
                    ->modalButton('Ya, Konfirmasi Pembayaran')
                    ->action(function ($record){
                        $record->update(['status' => 'Telah Dikonfirmasi']);
                    }),



                    Tables\Actions\DeleteAction::make()
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
            'index' => Pages\ListPembayarans::route('/'),
            'create' => Pages\CreatePembayaran::route('/create'),
            'edit' => Pages\EditPembayaran::route('/{record}/edit'),
        ];
    }
}
