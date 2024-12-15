<?php

namespace App\Filament\Resources;

use Forms\Set;
use Filament\Forms;
use Filament\Tables;
use App\Models\Product;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Illuminate\Support\Str;
use Filament\Resources\Resource;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\ProductResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\ProductResource\RelationManagers;

class ProductResource extends Resource
{
    protected static ?string $model = Product::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Group::make()
                ->schema([
                    Forms\Components\Section::make('Basic Information')
                    ->schema([
                        Forms\Components\Select::make('category_id')
                            ->relationship('category', 'name')
                            ->required(),
                        Forms\Components\TextInput::make('name')
                            ->afterStateUpdated(function (string $operation, string $state, Forms\Set $set) {
                                $set('slug', Str::slug($state));
                            })
                            ->live(onBlur: true)
                            ->required()
                            ->maxLength(255)
                            ->helperText('Enter specific name of product.'),
                        Forms\Components\TextInput::make('slug')
                            ->unique(ignorable: fn($record) => $record)
                            ->readOnly()
                            ->required()
                            ->maxLength(255),
                        ]),
                    Forms\Components\Section::make('Description')
                    ->schema([
                        Forms\Components\RichEditor::make('description')
                        ->required()
                        ->columnSpanFull(),
                        ]),
                    Forms\Components\Section::make('Image')
                    ->schema([
                        Forms\Components\FileUpload::make('images')
                        ->multiple()
                        ->columnSpanFull(),
                        ]),

                ]),
                Forms\Components\Group::make()
                ->schema([
                    Forms\Components\Section::make('Price & Stock')
                    ->schema([
                        Forms\Components\TextInput::make('price')
                        ->required()
                        ->numeric()
                        ->prefix('RM ')
                        ->step(0.01),
                    Forms\Components\TextInput::make('stock')
                        ->required()
                        ->numeric(),
                    Forms\Components\Toggle::make('is_active')
                        ->required()
                        ->helperText('Enable or disable product visibility.')
                        ->default(false)
                        ->label('Active'),
                    ]),
                    Forms\Components\Section::make('Product Dimensions')
                    ->schema([
                        Forms\Components\Grid::make()
                        ->schema([
                            Forms\Components\TextInput::make('weight')
                                ->required()
                                ->numeric()
                                ->default(0)
                                ->label('Weight (gram)'),
                            Forms\Components\TextInput::make('height')
                                ->required()
                                ->numeric()
                                ->default(0)
                                ->label('Height (cm)'),
                            Forms\Components\TextInput::make('width')
                                ->required()
                                ->numeric()
                                ->default(0)
                                ->label('Width (cm)'),
                            Forms\Components\TextInput::make('length')
                                ->required()
                                ->numeric()
                                ->default(0)
                                ->label('Length (cm)'),
                        ]),


                    ])
                ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('images')
                    ->circular()
                    ->stacked(),
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('slug')
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('category.name')
                    ->sortable(),
                Tables\Columns\TextColumn::make('price')
                    ->money('RM ')
                    ->sortable(),
                Tables\Columns\TextColumn::make('stock')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\IconColumn::make('is_active')
                    ->boolean(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
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
            'view' => Pages\ViewProduct::route('/{record}'),
            'edit' => Pages\EditProduct::route('/{record}/edit'),
        ];
    }
}
