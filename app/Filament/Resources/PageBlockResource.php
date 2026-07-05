<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PageBlockResource\Pages;
use App\Models\PageBlock;
use Filament\Forms;
use Filament\Schemas\Schema;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class PageBlockResource extends Resource
{
    protected static ?string $model = PageBlock::class;

    public static function getNavigationIcon(): string|\BackedEnum|null
    {
        return 'heroicon-o-rectangle-stack';
    }

    public static function getNavigationLabel(): string
    {
        return 'Блоки страницы';
    }

    public static function getModelLabel(): string
    {
        return 'Блок';
    }

    public static function getPluralModelLabel(): string
    {
        return 'Блоки страницы';
    }

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->schema([
                \Filament\Schemas\Components\Section::make('Основные настройки')
                    ->schema([
                        Forms\Components\TextInput::make('title')
                            ->label('Название блока')
                            ->required(),
                        Forms\Components\TextInput::make('slug')
                            ->label('Slug (системное имя)')
                            ->disabled()
                            ->dehydrated(),
                        Forms\Components\Toggle::make('is_active')
                            ->label('Активен')
                            ->default(true),
                        Forms\Components\TextInput::make('order')
                            ->label('Порядок')
                            ->numeric()
                            ->default(0),
                    ])->columns(2),

                \Filament\Schemas\Components\Section::make('Содержимое блока')
                    ->schema([
                        Forms\Components\Repeater::make('fields')
                            ->relationship()
                            ->label('Поля')
                            ->schema([
                                Forms\Components\TextInput::make('label')
                                    ->label('Название поля')
                                    ->columnSpan(1),
                                Forms\Components\TextInput::make('key')
                                    ->label('Ключ')
                                    ->disabled()
                                    ->dehydrated()
                                    ->columnSpan(1),
                                Forms\Components\Select::make('type')
                                    ->label('Тип')
                                    ->options([
                                        'text' => 'Текст',
                                        'textarea' => 'Длинный текст',
                                        'number' => 'Число',
                                        'image' => 'Изображение',
                                        'rich_text' => 'Форматированный текст',
                                        'json' => 'JSON',
                                    ])
                                    ->disabled()
                                    ->dehydrated()
                                    ->columnSpan(1),
                                Forms\Components\Textarea::make('value')
                                    ->label('Значение')
                                    ->rows(3)
                                    ->columnSpanFull()
                                    ->visible(fn ($get) => in_array($get('type'), ['text', 'textarea', 'number', 'json', 'rich_text', null])),
                                Forms\Components\FileUpload::make('value')
                                    ->label('Изображение')
                                    ->image()
                                    ->directory('blocks')
                                    ->columnSpanFull()
                                    ->visible(fn ($get) => $get('type') === 'image'),
                            ])
                            ->columns(3)
                            ->defaultItems(0)
                            ->reorderable()
                            ->orderColumn('order')
                            ->addable(false)
                            ->deletable(false)
                            ->collapsible()
                            ->itemLabel(fn (array $state): ?string => $state['label'] ?? $state['key'] ?? null),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('order')
                    ->label('#')
                    ->sortable(),
                Tables\Columns\TextColumn::make('title')
                    ->label('Название')
                    ->searchable(),
                Tables\Columns\TextColumn::make('slug')
                    ->label('Slug')
                    ->color('gray'),
                Tables\Columns\IconColumn::make('is_active')
                    ->label('Активен')
                    ->boolean(),
                Tables\Columns\TextColumn::make('fields_count')
                    ->label('Полей')
                    ->counts('fields'),
            ])
            ->defaultSort('order')
            ->reorderable('order')
            ->actions([
                \Filament\Actions\EditAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPageBlocks::route('/'),
            'edit' => Pages\EditPageBlock::route('/{record}/edit'),
        ];
    }
}
