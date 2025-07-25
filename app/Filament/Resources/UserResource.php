<?php

namespace App\Filament\Resources;

use Filament\Forms;
use App\Models\User;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Laravolt\Avatar\Facade as Avatar;
use Filament\Resources\Resource;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\ImageColumn;
use Filament\Forms\Components\FileUpload;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\UserResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\UserResource\RelationManagers;

class UserResource extends Resource
{
    protected static ?string $model = User::class;
    protected static ?string $navigationGroup = 'Pengguna';
    public static function getPluralLabel(): string
    {
        return 'Users';
    }

    protected static ?string $navigationIcon = 'heroicon-o-user';
    protected static ?int $navigationSort = 8;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')->required(),
                TextInput::make('email')->required(),
                TextInput::make('password')->password()->required(),
                Select::make('role')
                    ->options([
                        "admin" => "admin",
                        "user" => "user"
                    ])->required(),
                TextInput::make('alamat')->required(),
                TextInput::make('no_telepon')->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('foto')
                    ->label('Foto')
                    ->circular()
                    ->height(40)
                    ->width(40)
                    ->getStateUsing(function ($record) {
                        if (!empty($record->foto)) {
                            return asset('storage/foto/' . $record->foto);
                        }
                        return Avatar::create($record->name)->toBase64();
                    }),
                TextColumn::make('name'),
                TextColumn::make('email'),
                TextColumn::make('role'),
                TextColumn::make('alamat')
                    ->alignCenter()
                    ->getStateUsing(function ($record){
                        if(empty($record->alamat)){
                            return "-";
                        }
                        return $record->alamat;
                    }),
                TextColumn::make('no_telepon')
                    ->alignCenter()
                    ->getStateUsing(function ($record){
                        if(empty($record->no_telepon)){
                            return "-";
                        }
                        return $record->no_telepon;
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
            'index' => Pages\ListUsers::route('/'),
            // 'create' => Pages\CreateUser::route('/create'),
            // 'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }
}
