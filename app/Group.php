<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    public $timestamps = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */   
    protected $fillable = [
         'name'
    ];
    /**
     * Get the all users for the group.
     * 
     */
    public function groupUsers()
    {
        return $this->hasMany('App\User');
    }
}
