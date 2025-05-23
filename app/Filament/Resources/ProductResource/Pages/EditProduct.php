<?php

namespace App\Filament\Resources\ProductResource\Pages;

use App\Filament\Resources\ProductResource;
use Filament\Resources\Pages\EditRecord;

class EditProduct extends EditRecord
{
    protected static string $resource = ProductResource::class;

    protected string $primaryImagePath;
    protected array $additionalImagePaths = [];

    protected function mutateFormDataBeforeSave(array $data): array
    {
        $this->primaryImagePath = $data['primary_image'];
        $this->additionalImagePaths = collect($data['additional_images'] ?? [])
            ->pluck('image')
            ->filter()
            ->toArray();

        unset($data['primary_image'], $data['additional_images']);

        return $data;
    }

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

    protected function getFormData(): array
    {
        $data = parent::getFormData();

        $primaryImage = $this->record->primaryImage?->path;
        $additionalImages = $this->record->additionalImages->map(fn($img) => ['image' => $img->path])->toArray();

        return array_merge($data, [
            'primary_image' => $primaryImage,
            'additional_images' => $additionalImages,
        ]);
    }
}
