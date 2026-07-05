<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ReportPageResource\Pages;
use App\Filament\Resources\ReportPageResource\RelationManagers;
use App\Models\ReportPage;
use Filament\Forms;
use Filament\Schemas\Schema;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class ReportPageResource extends Resource
{
    protected static ?string $model = ReportPage::class;

    public static function getNavigationIcon(): string|\BackedEnum|null
    {
        return 'heroicon-o-book-open';
    }

    public static function getNavigationLabel(): string
    {
        return 'Разделы отчета';
    }

    public static function getModelLabel(): string
    {
        return 'Раздел';
    }

    public static function getPluralModelLabel(): string
    {
        return 'Разделы отчета';
    }

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->schema([
                \Filament\Schemas\Components\Section::make('Основные настройки')
                    ->schema([
                        Forms\Components\TextInput::make('number')
                            ->label('Номер раздела')
                            ->placeholder('01')
                            ->required()
                            ->maxLength(10),
                        Forms\Components\TextInput::make('title')
                            ->label('Название')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('slug')
                            ->label('URL (slug)')
                            ->required()
                            ->unique(ignoreRecord: true)
                            ->maxLength(255),
                        Forms\Components\TextInput::make('order')
                            ->label('Порядок')
                            ->numeric()
                            ->default(0),
                    ])->columns(2),

                \Filament\Schemas\Components\Section::make('Оформление')
                    ->schema([
                        Forms\Components\FileUpload::make('hero_image')
                            ->label('Фоновое изображение (hero)')
                            ->image()
                            ->directory('report-heroes'),
                        Forms\Components\ColorPicker::make('color')
                            ->label('Акцентный цвет раздела')
                            ->default('#005B9C'),
                        Forms\Components\Toggle::make('is_active')
                            ->label('Активен')
                            ->default(true),
                    ])->columns(3),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('number')
                    ->label('№')
                    ->sortable(),
                Tables\Columns\TextColumn::make('title')
                    ->label('Название')
                    ->searchable(),
                Tables\Columns\TextColumn::make('slug')
                    ->label('URL')
                    ->color('gray'),
                Tables\Columns\IconColumn::make('is_active')
                    ->label('Активен')
                    ->boolean(),
                Tables\Columns\TextColumn::make('subsections_count')
                    ->label('Подразделов')
                    ->counts('subsections'),
            ])
            ->defaultSort('order')
            ->reorderable('order')
            ->actions([
                \Filament\Actions\EditAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            RelationManagers\SubsectionsRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListReportPages::route('/'),
            'create' => Pages\CreateReportPage::route('/create'),
            'edit' => Pages\EditReportPage::route('/{record}/edit'),
        ];
    }
}
