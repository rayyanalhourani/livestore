<?php

namespace App\Filament\Resources\ProductResource\Pages;

use App\Filament\Resources\ProductResource;
use Filament\Resources\Pages\EditRecord;

class EditProduct extends EditRecord
{
    protected static string $resource = ProductResource::class;

    protected function afterSave(): void
    {
        $product = $this->record;

        $product->images()->delete();

        $product->images()->create([
            'path' => $this->primaryImagePath,
            'is_primary' => true,
            'sort_order' => 0,
        ]);

        foreach ($this->additionalImagePaths as $index => $imagePath) {
            $product->images()->create([
                'path' => $imagePath,
                'is_primary' => false,
                'sort_order' => $index + 1,
            ]);
        }
    }
}
