<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nick', 'email', 'password',
    ];

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

    /* public function teams(){
        return $this->belongsToMany('App\Team')->withPivot('role');
    } */

    public function teams()
    {
        // return $this->belongsToMany('App\Team', 'role_team_user') ;
        return $this->belongsToMany('App\Team', 'role_team_user')->withPivot('role_id') ;
    }

    public function projects()
    {
        // return $this->belongsToMany('App\Project', 'project_user', 'project_id') ;
        return $this->belongsToMany('App\Project', 'project_user', 'project_id', 'user_id')->withPivot('project_role_id') ;
    }
    
    public function project_role()
    {
        return $this->belongsToMany('App\ProjectRole', 'project_user', 'project_role_id', 'user_id')->withPivot('project_id');

    }

}
