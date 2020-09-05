<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Departement extends Model
{
    public $fillable = ['name'];
    public function users()
    {
        return $this->belongsToMany('App\User');
    }
}
