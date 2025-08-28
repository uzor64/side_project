<?php

namespace App\Filament\Resources\Posts\Tables;

use App\Models\Post;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class PostsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->recordActions([
                ViewAction::make(),
                EditAction::make(),
            ])
            ->columns([
                TextColumn::make('title')
                    ->searchable(),
                ImageColumn::make('image')->circular(),
                TextColumn::make('slug')
                    ->searchable()
                    ->limit(30),
                TextColumn::make('user.name')
                    ->searchable(),
                TextColumn::make('tags')
                    ->formatStateUsing(fn(Post $record) => $record->tags->pluck('name')->implode(', '))
                    ->badge(),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

            ])
            ->filters([
                //
            ])

            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
