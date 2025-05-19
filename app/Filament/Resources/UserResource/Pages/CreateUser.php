<?php

namespace App\Filament\Resources\UserResource\Pages;

use App\Filament\Resources\UserResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateUser extends CreateRecord
{
    protected static string $resource = UserResource::class;


    protected function afterCreate(): void
    {
        $avatar = $this->data['avatar'] ?? null;

        if (is_array($avatar) && $filename = reset($avatar)) {
            $this->record->image()->create([
                'path' => $filename,
                'is_primary' => true,
                'sort_order' => 0,
            ]);
        }
    }
}
