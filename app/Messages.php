<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Messages extends Model
{
    protected $guarded = ['id'];
    /**
     * @var mixed
     */
    private $from_id;

    public function from()
    {
        return $this->belongsTo('App\User','from_id');
    }

    public function to()
    {
        return $this->belongsTo('App\User','to_id');
    }
}
