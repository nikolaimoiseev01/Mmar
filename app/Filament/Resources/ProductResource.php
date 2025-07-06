<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductResource\Pages;
use App\Filament\Resources\ProductResource\RelationManagers;
use App\Helpers\Constant;
use App\Models\Product;
use Filament\Forms;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Support\Enums\MaxWidth;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ProductResource extends Resource
{
    protected static ?string $model = Product::class;

    protected static ?string $navigationIcon = 'heroicon-o-archive-box';
    protected static ?string $navigationGroup = 'Products';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Card::make()->schema([
                    SpatieMediaLibraryFileUpload::make('examples')
                        ->multiple()
                        ->reorderable()
                        ->panelLayout('grid')
                        ->collection('examples'),
                    Forms\Components\Grid::make()->schema([
                        Forms\Components\TextInput::make('name')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('slug')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\Select::make('brand_id')
                            ->relationship('brand', 'name'),
                        Forms\Components\Select::make('category_id')
                            ->relationship('category', 'name'),
                        Forms\Components\Select::make('subcategory_id')
                            ->relationship('subcategory', 'name'),
                        Forms\Components\TextInput::make('gender')
                            ->maxLength(255),
                    ]),
//                Forms\Components\TextInput::make('designers'),
                    Forms\Components\Textarea::make('details')
                        ->required()
                        ->columnSpanFull(),
                    Forms\Components\Textarea::make('materials')
                        ->required()
                        ->columnSpanFull(),
                    Forms\Components\Textarea::make('aftercare')
                        ->required()
                        ->columnSpanFull(),
                    Forms\Components\Textarea::make('manufacturing')
                        ->required()
                        ->columnSpanFull(),
                    Forms\Components\Grid::make()->schema([
                        Forms\Components\Select::make('exclusive')
                            ->required()
                            ->options(array_combine(
                                Constant::EXCLUSIVE,
                                Constant::EXCLUSIVE
                            ))
                        ,
                        Forms\Components\Select::make('customization_options')
                            ->required()
                            ->options(array_combine(
                                Constant::CUSTOMMIZATION_OPTIONS,
                                Constant::CUSTOMMIZATION_OPTIONS
                            )),
                        Forms\Components\Select::make('material_focus')
                            ->required()
                            ->options(array_combine(
                                Constant::MATERIAL_FOCUS,
                                Constant::MATERIAL_FOCUS
                            )),
                        Forms\Components\Select::make('availability')
                            ->required()
                            ->options(array_combine(
                                Constant::AVAILABILITY,
                                Constant::AVAILABILITY
                            )),
                    ])->columns(2),

                    Forms\Components\TextInput::make('price')
                        ->required()
                        ->numeric()
                        ->prefix('€'),
                ])

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('slug')
                    ->searchable(),
                Tables\Columns\TextColumn::make('brand.name')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('category.name')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('subcategory.name')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('gender')
                    ->searchable(),
                Tables\Columns\TextColumn::make('exclusive')
                    ->searchable(),
                Tables\Columns\TextColumn::make('customization_options')
                    ->searchable(),
                Tables\Columns\TextColumn::make('material_focus')
                    ->searchable(),
                Tables\Columns\TextColumn::make('availability')
                    ->searchable(),
                Tables\Columns\TextColumn::make('price')
                    ->money()
                    ->sortable(),
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
