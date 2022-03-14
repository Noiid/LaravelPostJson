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
        'average_training_hour',
        'max_training_hour',
        'min_training_hour',
        'average_error',
        'max_error',
        'min_error',
        'percent_pass',
        'percent_fail',
        'number_of_participants'
    ];

    public function company()
    {
        return $this->belongsTo('App\Company','id_company');
    }
}
