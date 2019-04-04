<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = ['name'];

    public function teams()
    {
        // return $this->belongsToMany('App\Team', 'role_team_user') ;
        return $this->belongsToMany('App\Team', 'role_team_user')->withPivot('user_id') ;
    }
}
