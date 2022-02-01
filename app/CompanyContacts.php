<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CompanyContacts extends Model
{
    protected $primaryKey = 'id_company_contact';

    protected $table = 'company_contacts';

    protected $fillable = [
        'id_company',
        'phone',
        'email'
    ];

    public function company()
    {
        return $this->belongsTo('App\Company','id_company');
    }
}
