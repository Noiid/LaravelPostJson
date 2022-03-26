<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MistakeTraining extends Model
{
    protected $primaryKey = 'id_mistake';

    protected $table = 'mistake_training';

    protected $fillable = [
        'id_employees',
        'module_attended',
        'mistake_name',
        'mistake_type',
        'number_of_mistake'
    ];

    public function employees()
    {
        return $this->belongsTo('App\Employees','id_employees');
    }
}
