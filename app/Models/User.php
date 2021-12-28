<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Contracts\Auth\CanResetPassword;
use App\Notifications\ResetPassword as ResetPasswordNotification;
use App\Notifications\ResetPasswordQueued;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use App\Notifications\VerifyEmailQueued;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'surname',
        'phone',
        'company',
        'tax_city',
        'tax_province',
        'tax_no',
        'adress',
        'profile_path',
        'email',
        'password',
        'hash',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function sendEmailVerificationNotification()
    {
        $this->notify(new VerifyEmailQueued);
    }
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ResetPasswordQueued($token));
    }
    public function getUserTaxCity()
    {
        return $this->hasOne(City::class, 'id', 'tax_city');
    }
    public function getUserTaxProvince()
    {
        return $this->hasOne(City::class, 'id', 'tax_province');
    }
}
