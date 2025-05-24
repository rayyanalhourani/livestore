<?php

namespace App\Filament\Resources\ProductResource\Pages;

use App\Filament\Resources\ProductResource;
use App\Models\Image;
use Filament\Resources\Pages\EditRecord;

class EditProduct extends EditRecord
{
    protected static string $resource = ProductResource::class;

    protected function beforeSave(): void
    {
        dd($this->data);
        $this->record->images()->delete();

        $images[] = [
            "path" => reset($this->data['primary_image']),
            "is_primary" => true,
        ];

        $sortOrder = 1;
        foreach ($this->data['additional_images'] as $imagePath) {
            $images[] = [
                'path' => $imagePath,
                "sort_order" => $sortOrder
            ];
            $sortOrder++;
        }
        $this->record->images()->createMany($images);
    }
}
