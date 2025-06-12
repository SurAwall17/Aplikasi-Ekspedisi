<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Filament\Panel;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Filament\Models\Contracts\FilamentUser;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable 
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

     protected $guarded = ['id'];
    // protected $fillable = [
    //     'name',
    //     'email',
    //     'password',
    // ];

    public function notifikasi(){
        return $this->hasMany(Notifikasi::class);
    }
    
    public function pembayaran(){
        return $this->hasMany(Pembayaran::class);
    }

    public function pengiriman(){
        return $this->hasMany(Pengiriman::class);
    }

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];
    // public function canAccessPanel(Panel $panel): bool
    // {
    //     return $this->hasRole('admin');
    // }

    
    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
}
