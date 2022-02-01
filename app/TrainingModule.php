<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TrainingModule extends Model
{
    protected $primaryKey = 'id_training_module';

    protected $table = 'training_modules';

    protected $fillable = [
        'id_company',
        'module_name',
        'average_training_hour'
    ];

    public function company()
    {
        return $this->belongsTo('App\Company','id_company');
    }
}
