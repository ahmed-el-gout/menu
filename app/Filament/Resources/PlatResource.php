<?php

namespace App\Filament\Resources;

use Filament\Forms;
use App\Models\Plat;
use Filament\Tables;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Tables\Columns\TextColumn;
use Forms\Components\TextInput;
use Filament\Resources\Resource;
// use Forms\Components\ImageColumn;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\ImageColumn;
use Filament\Forms\Components\FileUpload;
use App\Filament\Resources\PlatResource\Pages;
use Filament\Tables\Columns\SpatieMediaLibraryImageColumn;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;

class PlatResource extends Resource
{
    protected static ?string $model = Plat::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')->required(),
                Forms\Components\TextInput::make('disc')->required(),
                // Forms\Components\TextInput::make('plat_image')->required(),
                // FileUpload::make('plat_image')
                // ->directory('uploads')
                // ->preserveFilenames()
                // ->acceptedFileTypes(['image/png','image/jpg']) ,
                // FileUpload::make('plat_image'),
                SpatieMediaLibraryFileUpload::make('image')->preserveFilenames(),
                // Forms\Components\TextInput::make('type')->required()->default('salads'),
                Select::make('type')
                ->options([
                    'salads' => 'salads',
                    'starters' => 'starters',
                    'diner' => 'diner',
                    'lunch' => 'lunch',
                ])->default('salads'),
                
                Forms\Components\TextInput::make('price')->required()->rule('numeric'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('disc'),
                // Tables\Columns\ImageColumn::make('plat_image')->circular(),
                // ImageColumn::make('plat_image'),
                SpatieMediaLibraryImageColumn::make('image'),
                Tables\Columns\TextColumn::make('price')->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListPlats::route('/'),
            'create' => Pages\CreatePlat::route('/create'),
            'edit' => Pages\EditPlat::route('/{record}/edit'),
        ];
    }    
}