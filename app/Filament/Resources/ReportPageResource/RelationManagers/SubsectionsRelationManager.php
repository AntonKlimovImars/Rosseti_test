<?php

namespace App\Filament\Resources\ReportPageResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Components\Builder;
use Filament\Forms\Components\Builder\Block;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Schemas\Schema;
use Filament\Tables;
use Filament\Tables\Table;

class SubsectionsRelationManager extends RelationManager
{
    protected static string $relationship = 'subsections';

    protected static ?string $title = 'Подразделы';

    protected static ?string $modelLabel = 'Подраздел';

    protected static ?string $pluralModelLabel = 'Подразделы';

    public function form(Schema $schema): Schema
    {
        return $schema
            ->schema([
                Forms\Components\TextInput::make('title')
                    ->label('Название подраздела')
                    ->required()
                    ->columnSpanFull(),

                Forms\Components\TextInput::make('slug')
                    ->label('Якорь (slug)')
                    ->helperText('Используется для навигации. Автоматически создается из названия.')
                    ->columnSpanFull(),

                Builder::make('content_blocks')
                    ->label('Контент')
                    ->columnSpanFull()
                    ->blocks([
                        // 1. Rich Text Block
                        Block::make('rich_text')
                            ->label('Текстовый блок')
                            ->icon('heroicon-o-document-text')
                            ->schema([
                                Forms\Components\RichEditor::make('content')
                                    ->label('Содержимое')
                                    ->required()
                                    ->columnSpanFull(),
                            ]),

                        // 2. Image Block
                        Block::make('image')
                            ->label('Изображение')
                            ->icon('heroicon-o-photo')
                            ->schema([
                                Forms\Components\FileUpload::make('url')
                                    ->label('Изображение')
                                    ->image()
                                    ->directory('report-images')
                                    ->required(),
                                Forms\Components\TextInput::make('caption')
                                    ->label('Подпись к изображению'),
                                Forms\Components\Select::make('size')
                                    ->label('Размер')
                                    ->options([
                                        'full' => 'На всю ширину',
                                        'large' => 'Большое (75%)',
                                        'medium' => 'Среднее (50%)',
                                    ])
                                    ->default('full'),
                            ]),

                        // 3. Two Column Text
                        Block::make('two_columns')
                            ->label('Текст в две колонки')
                            ->icon('heroicon-o-view-columns')
                            ->schema([
                                Forms\Components\RichEditor::make('left')
                                    ->label('Левая колонка')
                                    ->required(),
                                Forms\Components\RichEditor::make('right')
                                    ->label('Правая колонка')
                                    ->required(),
                            ]),

                        // 4. Stats Grid
                        Block::make('stats_grid')
                            ->label('Сетка показателей')
                            ->icon('heroicon-o-chart-bar')
                            ->schema([
                                Forms\Components\Repeater::make('items')
                                    ->label('Показатели')
                                    ->schema([
                                        Forms\Components\TextInput::make('value')
                                            ->label('Значение')
                                            ->required(),
                                        Forms\Components\TextInput::make('unit')
                                            ->label('Единица измерения'),
                                        Forms\Components\TextInput::make('description')
                                            ->label('Описание')
                                            ->required(),
                                    ])
                                    ->columns(3)
                                    ->defaultItems(3)
                                    ->columnSpanFull(),
                            ]),

                        // 5. Quote
                        Block::make('quote')
                            ->label('Цитата')
                            ->icon('heroicon-o-chat-bubble-bottom-center-text')
                            ->schema([
                                Forms\Components\Textarea::make('text')
                                    ->label('Текст цитаты')
                                    ->rows(3)
                                    ->required(),
                                Forms\Components\TextInput::make('author')
                                    ->label('Автор'),
                                Forms\Components\TextInput::make('position')
                                    ->label('Должность'),
                            ]),

                        // 6. Heading
                        Block::make('heading')
                            ->label('Заголовок')
                            ->icon('heroicon-o-hashtag')
                            ->schema([
                                Forms\Components\TextInput::make('content')
                                    ->label('Текст заголовка')
                                    ->required(),
                                Forms\Components\Select::make('level')
                                    ->label('Уровень')
                                    ->options([
                                        'h2' => 'H2 — Крупный',
                                        'h3' => 'H3 — Средний',
                                        'h4' => 'H4 — Маленький',
                                    ])
                                    ->default('h2'),
                            ]),

                        // 7. GRI Reference
                        Block::make('gri_reference')
                            ->label('GRI ссылка')
                            ->icon('heroicon-o-bookmark')
                            ->schema([
                                Forms\Components\TextInput::make('codes')
                                    ->label('Коды GRI')
                                    ->helperText('Например: GRI 2-1, 2-6')
                                    ->required(),
                            ]),

                        // 8. Image Row (multiple images/icons in a row)
                        Block::make('image_row')
                            ->label('Изображения в ряд')
                            ->icon('heroicon-o-squares-2x2')
                            ->schema([
                                Forms\Components\Repeater::make('images')
                                    ->label('Изображения')
                                    ->schema([
                                        Forms\Components\FileUpload::make('url')
                                            ->label('Изображение')
                                            ->image()
                                            ->directory('report-images')
                                            ->required(),
                                        Forms\Components\TextInput::make('alt')
                                            ->label('Подпись (alt)'),
                                    ])
                                    ->columns(2)
                                    ->defaultItems(3)
                                    ->columnSpanFull(),
                                Forms\Components\Select::make('size')
                                    ->label('Размер каждого элемента')
                                    ->options([
                                        'small' => 'Маленький (иконки, ~60px)',
                                        'medium' => 'Средний (~120px)',
                                        'large' => 'Большой (~200px)',
                                    ])
                                    ->default('small'),
                                Forms\Components\Select::make('gap')
                                    ->label('Расстояние между')
                                    ->options([
                                        'tight' => 'Плотно (4px)',
                                        'normal' => 'Обычно (12px)',
                                        'wide' => 'Широко (24px)',
                                    ])
                                    ->default('normal'),
                            ]),
                    ])
                    ->collapsible()
                    ->blockNumbers(false)
                    ->reorderable(),
            ]);
    }

    public function table(Table $table): Table
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
                    ->label('Якорь')
                    ->color('gray'),
            ])
            ->defaultSort('order')
            ->reorderable('order')
            ->actions([
                \Filament\Actions\EditAction::make(),
                \Filament\Actions\DeleteAction::make(),
            ])
            ->headerActions([
                \Filament\Actions\CreateAction::make(),
            ]);
    }
}
