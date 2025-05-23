<?php

namespace App\Filament\Resources\ProductResource\Pages;

use App\Filament\Resources\ProductResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateProduct extends CreateRecord
{
    protected static string $resource = ProductResource::class;

    protected string $primaryImagePath;
    protected array $additionalImagePaths = [];

    protected function mutateFormDataBeforeCreate(array $data): array
{
    $this->primaryImagePath = $data['primary_image'];
    $this->additionalImagePaths = array_column($data['additional_images'], 'image');
    unset($data['primary_image'], $data['additional_images']);

    return $data;
}

protected function afterCreate(): void
{
    $product = $this->record;

    // Save primary image
    $product->images()->create([
        'path' => $this->primaryImagePath,
        'is_primary' => true,
        'sort_order' => 0,
    ]);

    // Save additional images
    foreach ($this->additionalImagePaths as $index => $imagePath) {
        $product->images()->create([
            'path' => $imagePath,
            'is_primary' => false,
            'sort_order' => $index + 1,
        ]);
    }
}
}
