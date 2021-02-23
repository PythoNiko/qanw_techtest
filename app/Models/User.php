<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * Table that the model represents
     *
     * @var string
     */
    protected $table = 'qanw_users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'username',
        'email',
        'address_line_1',
        'address_line_2',
        'city',
        'zipcode',
        'geo-lat',
        'geo-lng',
        'phone',
        'website',
        'company_name',
        'company_catchphrase',
        'company_bs',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Get the album(s) associated to the user
     */
    public function album()
    {
        return $this->hasMany(Album::class);
    }
}
