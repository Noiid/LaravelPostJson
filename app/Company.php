<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $primaryKey = 'id_company';

    protected $table = 'company';

    protected $fillable = [
        'name_company'
    ];

    public function company_contact()
    {
        $this->hasMany('App\CompanyContacts','id_company');
    }

    public function training_module()
    {
        $this->hasMany('App\TrainingModule','id_company');
    }

    public function employees()
    {
        $this->hasMany('App\Employees','id_company');
    }
}
