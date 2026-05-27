<?php

namespace App\Models;

use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

#[Fillable([
        'company_id',
    'role_id',
        'name',
    'email',
        'password'
])]

#[Hidden([
        'password',
    'remember_token'
])]

class User extends Authenticatable
{
        use HasFactory, Notifiable;

    public function company()
    {
            return $this->belongsTo(Company::class);
    }

      public function role()
    {
            return $this->belongsTo(Role::class);
    }

        public function shortUrls()
    {
            return $this->hasMany(ShortUrl::class);
    }

      protected function casts(): array
    {
            return [

                'email_verified_at' => 'datetime',

            'password' => 'hashed',
        ];
    }
}