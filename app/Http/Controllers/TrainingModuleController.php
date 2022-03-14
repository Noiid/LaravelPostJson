<?php

namespace App\Http\Controllers;

use App\TrainingModule;
use App\Company;
use Illuminate\Http\Request;

class TrainingModuleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $modules = TrainingModule::all();

        return view('Modul.index',['modules' => $modules]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $companies = Company::all();
        return view('Company.add_unit',['companies' => $companies]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        TrainingModule::create($request->all());

        return redirect('/company')->with('success','Berhasil menambahkan module baru!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\TrainingModule  $trainingModule
     * @return \Illuminate\Http\Response
     */
    public function show(TrainingModule $trainingModule)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TrainingModule  $trainingModule
     * @return \Illuminate\Http\Response
     */
    public function edit(TrainingModule $trainingModule)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TrainingModule  $trainingModule
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TrainingModule $trainingModule)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TrainingModule  $trainingModule
     * @return \Illuminate\Http\Response
     */
    public function destroy(TrainingModule $trainingModule)
    {
        //
    }
}
