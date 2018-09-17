<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    public $timestamps = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable   = [
        'email', 'first_name', 'last_name', 'state', 'group_id'
    ];
    /**
     *
     * Get the group that owns the user.
     * 
     */
    public function userGroup()
    {
        return $this->belongsTo('App\Group', 'group_id');
    }
    /**
     *
     * State alpha getter
     *
     */
    public function getState()
    {
        return $this->state ? 'active' : 'non active';
    }
}