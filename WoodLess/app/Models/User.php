<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'first_name',
        'last_name',
        'phone_number',
        'email',
        'password',
        'verification_code',
    ];

    protected $hidden = [
        'password',
        'remember_token',
        'is_admin',
    ];

    protected $guarded = [
        'is_admin',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    /**
     * Get the orders associated with the user.
     */
    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    /**
     * Get the addresses associated with the user.
     */
    public function addresses()
    {
        return $this->hasMany(Address::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function addresses()
    {
        return $this->hasMany(Address::class);
    }

    public function basket()
    {
        return $this->hasOne(Basket::class);
    }

    public function isAdmin()
    {
        return $this->makeVisible('is_admin')->is_admin;
    }

    public function sendEmailVerificationNotification()
    {
        $this->notify(new \Illuminate\Auth\Notifications\VerifyEmail);
    }

    public function markEmailAsVerified()
    {
        return $this->forceFill([
            'email_verified_at' => $this->freshTimestamp(),
            'verification_code' => null,
        ])->save();
    }

    public function hasVerifiedEmail()
    {
        return !is_null($this->email_verified_at);
    }

    public function getEmailForVerification()
    {
        return $this->email;
    }

    public function createEmailVerificationCode()
    {
        $this->verification_code = \Illuminate\Support\Str::random(40);
        $this->save();
    }

    public function verificationCodeIsValid($code)
    {
        return $this->verification_code === $code;
    }

    public static function boot()
    {
        parent::boot();

        static::creating(function ($user) {
            if (!Schema::hasColumn('users', 'verification_code')) {
                $user->createEmailVerificationCode();
            }
        });
    }
}
