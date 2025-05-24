<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductResource\Pages;
use App\Models\Product;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class ProductResource extends Resource
{
    protected static ?string $model = Product::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?int $navigationSort = 3;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('price')
                    ->required()
                    ->numeric()
                    ->prefix('$'),
                Forms\Components\Textarea::make('description')
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('stock')
                    ->numeric()
                    ->default(1),
                Forms\Components\TextInput::make('discount')
                    ->numeric()
                    ->default(0),
                Forms\Components\Section::make("categories")
                    ->schema([
                        Forms\Components\CheckboxList::make('categories')
                            ->hiddenLabel()
                            ->relationship(name: 'categories', titleAttribute: 'name')
                            ->columnSpanFull()
                            ->columns(5)
                            ->searchable()
                    ]),
                Forms\Components\Section::make('Images')
                    ->schema([
                        Forms\Components\FileUpload::make('primary_image')
                            ->label('Primary Image')
                            ->image()
                            ->directory('products')
                            ->dehydrated(false)
                            ->maxFiles(1)
                            ->formatStateUsing(
                                fn($record) => $record?->images?->where('is_primary', true)?->pluck("path")->toArray()
                            ),
                        Forms\Components\FileUpload::make('additional_images')
                            ->label('Additional Images')
                            ->image()
                            ->imageEditor()
                            ->multiple()
                            ->dehydrated(false)
                            ->reorderable()
                            ->maxFiles(4)
                            ->directory('products')
                            ->formatStateUsing(
                                fn($record) => $record?->images
                                    ?->where('is_primary', false)
                                    ->pluck('path')
                                    ->toArray()
                            )
                    ])
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('price')
                    ->money()
                    ->sortable(),
                Tables\Columns\TextColumn::make('stock')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('discount')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\ImageColumn::make('images.path')
                    ->label('Primary Image')
                    ->getStateUsing(fn($record) => $record?->images->firstWhere('is_primary', true)?->path),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
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
            'index' => Pages\ListProducts::route('/'),
            'create' => Pages\CreateProduct::route('/create'),
            'edit' => Pages\EditProduct::route('/{record}/edit'),
        ];
    }
}
