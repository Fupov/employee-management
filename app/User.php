<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id', 'password_confirmation'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function departement()
    {
        return $this->belongsTo('App\Departement');
    }
    public function HasDepartement($departement)
    {
        if($this->departement()->where('id',$departement)->first())
        {
            return true;
        }
        return false;
    }
    public function roles()
    {
        return $this->belongsToMany('App\Role');
    }
    public function HasAnyRoles($roles)
    {
        if($this->roles()->whereIn('name',$roles)->first())
        {
            return true;
        }
        return false;
    }
    public function HasRole($role)
    {
        if($this->roles()->where('name',$role)->first())
        {
            return true;
        }
        return false;
    }
    public function messages()
    {
        return $this->belongsToMany('App\Messages');
    }

    public function HasMessage($message)
    {
        if($this->messages()->where('from_to',$message)->first())
        {
            return true;
        }
        return false;
    }
    public  function isAdmin()
    {
        return $this->HasRole('Chef de division');
    }

    public function getEmail(): string
    {
        return $this->email;
    }
}

