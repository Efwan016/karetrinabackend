<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CateringPhotoResource\Pages;
use App\Models\CateringPhoto;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CateringPhotoResource extends Resource
{
    protected static ?string $model = CateringPhoto::class;
    protected static ?string $navigationIcon = 'heroicon-o-photo';
    protected static ?string $navigationLabel = 'Catering Photos';
    protected static ?string $navigationGroup = 'Management';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\FileUpload::make('photo')
                    ->label('Photo')
                    ->image()
                    ->directory('catering_photos')
                    ->disk('public')
                    ->required(),

                Forms\Components\TextInput::make('catering_package_id')
                    ->label('Catering Package ID')
                    ->numeric()
                    ->required(),
            ]);
    }

   
    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('photo')
                    ->label('Photo')
                    ->disk('public')
                    ->square(),
                Tables\Columns\TextColumn::make('catering_package_id')
                    ->label('Package ID')
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Uploaded')
                    ->dateTime('d M Y - H:i'),
            ])
            ->filters([
                Tables\Filters\TrashedFilter::make(), 
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
                Tables\Actions\ForceDeleteAction::make(),
                Tables\Actions\RestoreAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
                Tables\Actions\ForceDeleteBulkAction::make(),
                Tables\Actions\RestoreBulkAction::make(),
            ]);
    }

    
    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCateringPhotos::route('/'),
            'create' => Pages\CreateCateringPhoto::route('/create'),
            'edit' => Pages\EditCateringPhoto::route('/{record}/edit'),
        ];
    }

    
    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }
}
