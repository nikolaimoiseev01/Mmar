<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductResource\Pages;
use App\Helpers\Constant;
use App\Models\Product;
use Filament\Facades\Filament;
use Filament\Forms;
use Filament\Forms\Components\ColorPicker;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Components\Tabs\Tab;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Support\Enums\MaxWidth;
use Filament\Tables;
use Filament\Tables\Columns\IconColumn;
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
                Forms\Components\Tabs::make()->schema([
                    Tab::make('General')->schema([
                        SpatieMediaLibraryFileUpload::make('examples')
                            ->multiple()
                            ->reorderable()
                            ->required()
                            ->panelLayout('grid')
                            ->collection('examples'),
                        Forms\Components\Grid::make()->schema([
                            Forms\Components\Grid::make()->schema([
                                Forms\Components\TextInput::make('name')
                                    ->required()
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('slug')
                                    ->required()
                                    ->maxLength(255),
                                Forms\Components\Toggle::make('is_active')
                                    ->disabled(fn() => Filament::auth()->user()->hasRole('brand')),
                                Forms\Components\TextInput::make('quantity_of_item')
                                    ->required()
                                    ->numeric(),

                            ])->columns(4),
                            Forms\Components\Select::make('brand_id')
                                ->required()
                                ->relationship('brand', 'name'),
                            Forms\Components\Select::make('category_id')
                                ->relationship('category', 'name'),
                            Forms\Components\Select::make('subcategory_id')
                                ->relationship('subcategory', 'name'),
                            Forms\Components\Select::make('gender')
                                ->options(array_combine(
                                    Constant::GENDER,
                                    Constant::GENDER
                                )),
                        ]),
//                Forms\Components\TextInput::make('designers'),
                        Forms\Components\Textarea::make('details')
                            ->required()
                            ->columnSpanFull(),
                        Forms\Components\TextInput::make('materials')
                            ->required(),
                        Forms\Components\Textarea::make('materials_detailed')
                            ->required()
                            ->columnSpanFull(),
                        Forms\Components\Textarea::make('aftercare')
                            ->columnSpanFull(),
                        Forms\Components\Textarea::make('manufacturing')
                            ->required()
                            ->columnSpanFull(),
                        Grid::make()->schema([
                            Repeater::make('label')
                                ->label('Labels')
                                ->simple(
                                    TextInput::make('email'),
                                )->grid(2),
                        ]),

                        Forms\Components\Grid::make()->schema([
                            Forms\Components\Select::make('exclusive')
                                ->options(array_combine(
                                    Constant::EXCLUSIVE,
                                    Constant::EXCLUSIVE
                                ))
                            ,
                            Forms\Components\Select::make('customization_options')
                                ->options(array_combine(
                                    Constant::CUSTOMMIZATION_OPTIONS,
                                    Constant::CUSTOMMIZATION_OPTIONS
                                )),
                            Forms\Components\Select::make('material_focus')
                                ->options(array_combine(
                                    Constant::MATERIAL_FOCUS,
                                    Constant::MATERIAL_FOCUS
                                )),
                        ])->columns(2),

                        Forms\Components\TextInput::make('price')
                            ->required()
                            ->numeric()
                            ->prefix('€'),
                    ]),
                    Tab::make('Availability')->schema([
                        Forms\Components\Select::make('availability')
                            ->required()
                            ->options(array_combine(
                                Constant::AVAILABILITY,
                                Constant::AVAILABILITY
                            )),
                        Repeater::make('availability_options')
                            ->addActionLabel('Add color')
                            ->required()
                            ->schema([
                                ColorPicker::make('color'),
                                TextInput::make('color_name'),
                                Repeater::make('sizes')->schema([
                                    TextInput::make('size')
                                        ->required(),
                                    TextInput::make('quantity')->required()
                                ])->addActionLabel('Add size')->grid(3)->columns(2),
                            ])->grid(2)
                    ])
                ])->columnSpanFull()

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->modifyQueryUsing(function ($query) {
                $user = Filament::auth()->user();
                if ($user && $user->brand_id) {
                    $query->where('brand_id', $user->brand_id);
                }
                if ($user && $user->hasRole('super')) {
                    return $query;
                }
            })
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                IconColumn::make('is_active')
                    ->icon('heroicon-o-check-circle')
                    ->color(fn(string $state): string => match ($state) {
                        '1' => 'success',
                        default => 'gray',
                    })->sortable(),
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
