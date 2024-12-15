<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Store;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Illuminate\Support\HtmlString;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\StoreResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\StoreResource\RelationManagers;

class StoreResource extends Resource
{
    protected static ?string $model = Store::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Group::make()
                ->schema([
                    Forms\Components\Section::make('Basic Information')
                    ->description('Fill the Stores details bellow.')
                    ->schema([
                            Forms\Components\TextInput::make('name')
                                ->required()
                                ->placeholder('enter shop name')
                                ->maxLength(255),
                            Forms\Components\Textarea::make('description')
                                ->placeholder('description here')
                                ->columnSpanFull(),
                            Forms\Components\TextInput::make('phone')
                                ->label('Phone Number')
                                ->helperText(new HtmlString('<strong>Note:</strong> Use a Phone Number that already has Whatsapp <strong>Exp:- 1133165639</strong>'))
                                ->prefix('60')
                                ->placeholder('1133165639')
                                ->required()
                                ->numeric()
                                ->dehydrateStateUsing(fn ($state) => '60' . ltrim($state, '60'))
                                ->formatStateUsing(fn ($state) => ltrim($state, '60'))
                                ->validationAttribute('Number Whatsapp')
                                ->maxLength(12),
                            Forms\Components\FileUpload::make('image')
                                ->image()
                                ->directory('stores'),
                            Forms\Components\FileUpload::make('banner')
                                ->image()
                                ->directory('stores/banner'),
                        ])
                    ]),
                Forms\Components\Group::make()
                ->schema([
                    Forms\Components\Section::make('Address Store')
                    ->description('Enter your address')
                    ->schema([
                        Forms\Components\TextInput::make('address')
                        ->maxLength(255),
                    Forms\Components\Select::make('state')
                        ->searchable()
                        ->preload()
                        ->options([
                            'Johor' => 'Johor',
                            'Kedah' => 'Kedah',
                            'Kelantan' => 'Kelantan',
                            'Kuala Lumpur' => 'Kuala Lumpur',
                            'Labuan' => 'Labuan',
                            'Melaka' => 'Melaka',
                            'Negeri Sembilan' => 'Negeri Sembilan',
                            'Pahang' => 'Pahang',
                            'Pulau Pinang' => 'Pulau Pinang',
                            'Perak' => 'Perak',
                            'Perlis' => 'Perlis',
                            'Putrajaya' => 'Putrajaya',
                            'Sabah' => 'Sabah',
                            'Sarawak' => 'Sarawak',
                            'Selangor' => 'Selangor',
                            'Terengganu' => 'Terengganu',
                        ]),
                    Forms\Components\TextInput::make('city')
                        ->maxLength(255),
                    Forms\Components\TextInput::make('postcode')
                        ->numeric()
                        ->maxValue(49999),
                    ])
                ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\ImageColumn::make('image'),
                Tables\Columns\TextColumn::make('state')
                    ->searchable(),
                Tables\Columns\TextColumn::make('city')
                    ->searchable(),
                Tables\Columns\TextColumn::make('postcode')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('phone')
                    ->searchable(),
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
            'index' => Pages\ListStores::route('/'),
            'create' => Pages\CreateStore::route('/create'),
            'view' => Pages\ViewStore::route('/{record}'),
            'edit' => Pages\EditStore::route('/{record}/edit'),
        ];
    }

    public static function canCreate(): bool
    {
        return Store::count() < 1;
    }
}
