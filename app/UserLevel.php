<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserLevel extends Model
{
    protected $primaryKey = 'id_user_level';

    protected $table = 'user_level';

    protected $fillable = [
        'description'
    ];

    public function user()
    {
        return $this->hasMany('App\User','id_user_level');
    }
}
