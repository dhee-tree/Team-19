<?php

namespace App\Models;
use App\Notifications\ResetPasswordNotification;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Contracts\Auth\CanResetPassword;
use App\Models\EmailVerificationCode;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;


    public static function boot(){
        parent::boot();

        self::created(function ($user) {
            $user->basket()->create();
        });

        self::deleted(function ($user) {
            $user->basket()->delete();
        });
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $fillable = [
        'first_name',
        'last_name',
        'phone_number',
        'email',
        'password',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'access_level',
    ];

    protected $guarded = [
        'access_level'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    

    /**
     * Get the reviews associated with the user.
     */
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

    /**
     * Get the cards associated with the user.
     */
    public function cards()
    {
        return $this->hasMany(Card::class);
    }

    /**
     * Get the basket associated with the user.
     */
    public function basket()
    {
        return $this->hasOne(Basket::class);
    }

    public function emailVerificationCodes(){
        return $this->belongsToMany(EmailVerificationCode::class, 'email_verification_codes', 'user_id','code')->withTimeStamps();
    }
    
    public function isVerified(){
        $emailVerificationCode = EmailVerificationCode::where('user_id', $this->id)->first();
        return $emailVerificationCode->is_verified ?? false;
    }

    /**
     * Check the user's access level.
     */
    public function accessLevel(){
        return $this->makeVisible('access_level')->access_level;
    }
    
    /**
     * Check that the user's access level is over 3 (admin).
     */
    public function isAdmin(){
        return (bool)($this->accessLevel() >= 3);
    }
}
