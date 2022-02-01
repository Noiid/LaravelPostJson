<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TrainingEmployees extends Model
{
    protected $primaryKey = 'id_trainig_employees';

    protected $table = 'training_employees';

    protected $fillable = [
        'id_employees',
        'module_attended',
        'test_date',
        'training_hour',
        'error',
        'status',
        'renewal_date'
    ];

    public function employees()
    {
        return $this->belongsTo('App\Employees','id_employees');
    }
}
