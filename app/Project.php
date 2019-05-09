<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [ 'name', 'description' ] ;

    // public function users() {
    //     return $this->belongsToMany('App\User', 'project_user', 'user_id', 'project_id')->withPivot('project_role_id') ;
    // }

    public function users()
    {
        // return $this->belongsToMany('App\User', 'role_team_user') ;
        return $this->belongsToMany('App\User', 'project_user')->withPivot('project_role_id') ;
    }

}
