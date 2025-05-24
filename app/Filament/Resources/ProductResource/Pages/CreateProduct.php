<?php

namespace App\Filament\Resources\ProductResource\Pages;

use App\Filament\Resources\ProductResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateProduct extends CreateRecord
{
    protected static string $resource = ProductResource::class;

    protected function afterCreate(): void
    {
        $primaryImage=reset($this->data['primary_image']);

        $images[]=[
            "path"=>$primaryImage,
            "is_primary" =>true,
        ];

        $sortOrder=1;
        foreach ($this->data['additional_images'] as $imageSet) {
            $imagePath = reset($imageSet['image']);
            $images[] = [
                'path' => $imagePath,
                "sort_order" => $sortOrder
            ];
            $sortOrder++;
        }
        $this->record->images()->createMany($images);
    }
}
