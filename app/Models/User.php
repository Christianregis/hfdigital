<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Str;
<<<<<<< HEAD

=======
>>>>>>> 4ab2363a34920e1e831fd0cf354750876d32af69
class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'slug',
    ];

    protected static function booted()
    {
        static::creating(function ($user) {
            $user->slug = hash('sha256', $user->id . config('app.key')) . '-' . Str::random(20);
        });
    }

<<<<<<< HEAD
=======
    public function publications()
    {
        return $this->hasMany(Publication::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

>>>>>>> 4ab2363a34920e1e831fd0cf354750876d32af69
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
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
}
