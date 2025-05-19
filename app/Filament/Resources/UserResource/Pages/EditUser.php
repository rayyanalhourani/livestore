<?php

namespace App\Filament\Resources\UserResource\Pages;

use App\Models\User;
use Filament\Actions;
use App\Filament\Resources\UserResource;
use Filament\Resources\Pages\EditRecord;

class EditUser extends EditRecord
{
    protected static string $resource = UserResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    protected function mutateFormDataBeforeFill(array $data): array
    {
        $userId = $data["id"];
        $avatar = User::find($userId)->image->path ?? null;

        $data["avatar"] = $avatar;

        return $data;
    }

    protected function afterSave(): void
    {
        $avatar = $this->data['avatar'] ?? null;

        if (is_array($avatar) && $filename = reset($avatar)) {
            $this->record->image()->delete();

            $this->record->image()->create([
                'path' => $filename,
                'is_primary' => true,
            ]);
        }
    }
}
