<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProjectRole extends Model
{
    protected $fillable = [ 'name' ] ;

    public function projects()
    {
        return $this->belongsToMany('App\Team', 'project_user')->withPivot('user_id') ;
    }
}
