<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employees extends Model
{
    protected $primaryKey = 'id_employees';

    protected $table = 'employees';

    protected $fillable = [
        'id_company',
        'first_name',
        'last_name',
        'age',
        'gender',
        'department',
        'start_date_of_employment'
    ];

    public function company()
    {
        return $this->belongsTo('App\Company','id_company');
    }

    public function contact_employees()
    {
        return $this->hasMany('App\Employees','id_employees');
    }

    public function training_employees()
    {
        return $this->hasMany('App\TrainingEmployees','id_employees','id_employees');
    }
}
