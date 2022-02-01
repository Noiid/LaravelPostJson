<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContactEmployees extends Model
{
    protected $primaryKey = 'id_contact_employees';

    protected $table = 'contact_employees';

    protected $fillable = [
        'id_employees',
        'phone',
        'email'
    ];

    public function contact_employees()
    {
        return $this->belongsTo('App\Employees','id_employees');
    }
}
