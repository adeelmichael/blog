<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = [

        'name',
        'slug'
    ];

    protected $table = 'roles';


    //relationship definition
    public function users()
    {
        return $this->belongsToMany('App\User');
    }
}
