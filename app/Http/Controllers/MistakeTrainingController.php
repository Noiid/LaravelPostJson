<?php

namespace App\Http\Controllers;

use App\MistakeTraining;
use Illuminate\Http\Request;

class MistakeTrainingController extends Controller
{
    public function getMistakes($module)
    {
        $mistakes['data'] = MistakeTraining::where('module_attended',$module)->get();

        return response()->json($mistakes);
    }
}
