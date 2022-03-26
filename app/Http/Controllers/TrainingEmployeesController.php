<?php

namespace App\Http\Controllers;

use App\TrainingEmployees;
use App\TrainingModule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TrainingEmployeesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Training.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        TrainingEmployees::create($request->all());

        return back()->with('success','Berhasil menambahkan data training');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\TrainingEmployees  $trainingEmployees
     * @return \Illuminate\Http\Response
     */
    public function show(TrainingEmployees $trainingEmployees)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TrainingEmployees  $trainingEmployees
     * @return \Illuminate\Http\Response
     */
    public function edit(TrainingEmployees $trainingEmployees)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TrainingEmployees  $trainingEmployees
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TrainingEmployees $trainingEmployees)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TrainingEmployees  $trainingEmployees
     * @return \Illuminate\Http\Response
     */
    public function destroy(TrainingEmployees $trainingEmployees)
    {
        //
    }

    public function getPercentFire($module)
    {
        $training_complete = TrainingEmployees::where('module_attended',$module)->where('status','LIKE','%Passed%')->get();
        $training_failed = TrainingEmployees::where('module_attended',$module)->where('status','NOT LIKE','%Passed%')->get();
        $training_all = TrainingEmployees::where('module_attended',$module)->get();
        $div = count($training_all) > 0 ? count($training_complete) / count($training_all) * 100 : 0;

        $result['data'] = array($div."%",count($training_complete),count($training_failed));

        return response()->json($result);
    }

    public function getParticipantsModule()
    {
        // $training_fire = TrainingEmployees::where('module_attended','FireFighting')->get();
        // $training_evacuation = TrainingEmployees::where('module_attended','Evacuation')->get();
        // $training_leadership = TrainingEmployees::where('module_attended','Leadership')->get();
        // $training_first = TrainingEmployees::where('module_attended','FirstAid')->get();

        // $array['data'] = [
        //     ["FireFighting",count($training_fire)],
        //     ["Evacuation",count($training_evacuation)],
        //     ["Leadership",count($training_leadership)],
        //     ["FirstAid",count($training_first)]
        // ];
        $module = TrainingModule::select('module_name')->distinct()->get();
        $array['data'] = [];
        foreach ($module as $mod) {
            $count = count(TrainingEmployees::where('module_attended',$mod->module_name)->get());
            array_push($array['data'],[$mod->module_name, $count]);
        }

        return response()->json($array);

    }

    public function getCountError()
    {
        $array['data'] = [];
        $module = TrainingModule::select('module_name')->distinct()->get();
        foreach ($module as $item) {
            $max = DB::table('training_employees')->where('module_attended',$item->module_name)->max('error');
            $min = DB::table('training_employees')->where('module_attended',$item->module_name)->min('error');
            $avg = DB::table('training_employees')->where('module_attended',$item->module_name)->avg('error');
            array_push($array['data'],[$item->module_name,$max??0,$avg??0,$min??0]);
        }

        return response()->json($array);
    }

    public function getCountTraining()
    {
        $array['data'] = [];
        $module = TrainingModule::select('module_name')->distinct()->get();
        foreach ($module as $item) {
            $max = DB::table('training_employees')->where('module_attended',$item->module_name)->max('training_hour');
            $min = DB::table('training_employees')->where('module_attended',$item->module_name)->min('training_hour');
            $avg = DB::table('training_employees')->where('module_attended',$item->module_name)->avg('training_hour');
            array_push($array['data'],[$item->module_name,$max??0,$avg??0,$min??0]);
        }

        return response()->json($array);
    }
}
