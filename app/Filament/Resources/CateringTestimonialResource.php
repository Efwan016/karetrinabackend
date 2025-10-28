<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CateringTestimonialResource\Pages;
use App\Models\CateringTestimonial;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CateringTestimonialResource extends Resource
{
    protected static ?string $model = CateringTestimonial::class;
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->label('Testimonial Name')
                    ->required()
                    ->maxLength(255)
                    ->reactive(),

                Forms\Components\FileUpload::make('photo')
                    ->image()
                    ->required()
                    ->disk('public')
                    ->directory('catering_testimonials'),

                Forms\Components\Select::make('catering_package_id')
                    ->relationship('cateringPackage', 'name')
                    ->label('Catering Package')
                    ->preload()
                    ->searchable()
                    ->required(),

                Forms\Components\Textarea::make('message')
                    ->label('Testimonial Message')
                    ->required()
                    ->maxLength(1000),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('cateringPackage.thumbnail'),
                Tables\Columns\ImageColumn::make('photo')
                    ->circular(),

                Tables\Columns\TextColumn::make('name')
                    ->searchable()
                    ->sortable(),
            ])
            ->filters([
                Tables\Filters\TrashedFilter::make(),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
                Tables\Actions\ForceDeleteBulkAction::make(),
                Tables\Actions\RestoreBulkAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCateringTestimonials::route('/'),
            'create' => Pages\CreateCateringTestimonial::route('/create'),
            'edit' => Pages\EditCateringTestimonial::route('/{record}/edit'),
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
