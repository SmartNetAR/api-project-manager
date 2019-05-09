<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $fillable = [
        'name'
    ];

    public function users()
    {
        // return $this->belongsToMany('App\User', 'role_team_user') ;
        return $this->belongsToMany('App\User', 'team_user')->withPivot('team_role_id') ;
    }

    public function roles()
    {
        // return $this->belongsToMany('App\Role', 'role_team_user') ;
        return $this->belongsToMany('App\Role', 'team_user')->withPivot('user_id') ;
    }
}
