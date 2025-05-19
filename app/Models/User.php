<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Cart;
use App\Models\Image;
use App\Models\Product;
use App\Models\Favorite;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Hash;
use Filament\Forms\Components\Select;
use Laravel\Jetstream\HasProfilePhoto;
use Filament\Forms\Components\TextInput;
use Illuminate\Notifications\Notifiable;
use Filament\Forms\Components\FileUpload;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens;

    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function cart()
    {
        return $this->hasOne(Cart::class);
    }

    public function favoriteProducts()
    {
        return $this->belongsToMany(Product::class, 'favorites');
    }

    public function image(): MorphOne
    {
        return $this->morphOne(Image::class, 'imageable');
    }

    public static function getForm()
    {
        return [
            TextInput::make('name')
                ->required()
                ->maxLength(255),
            TextInput::make('email')
                ->email()
                ->required()
                ->maxLength(255),
            TextInput::make('password')
                ->password()
                ->maxLength(255)
                ->dehydrateStateUsing(fn($state) => Hash::make($state))
                ->dehydrated(fn($state) => filled($state))
                ->required(fn(string $context): bool => $context === 'create'),
            TextInput::make('password_confirmation')
                ->password()
                ->label('Confirm Password')
                ->same('password')
                ->required(fn(string $context): bool => $context === 'create')
                ->dehydrated(false),
            Select::make('role')
                ->options([
                    'admin' => 'Admin',
                    'customer' => 'Customer',
                ])
                ->default("admin"),
            FileUpload::make('avatar')
                ->avatar()
                ->imageEditor()
                ->directory('user-images')
                ->dehydrated(false)
                ->columnSpanFull()
        ];
    }
}
