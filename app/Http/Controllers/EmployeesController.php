<?php

namespace App\Http\Controllers;

use App\Company;
use App\ContactEmployees;
use App\Employees;
use App\TrainingEmployees;
use App\TrainingModule;
use Illuminate\Http\Request;

class EmployeesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = Employees::all();

        return view('Employee.index',['employees' => $employees]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $companies = Company::all();
        return view('Employee.add_employee',['companies' => $companies]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $employee = new Employees();
        $employee->id_company = $request->id_company;
        $employee->first_name = $request->first_name;
        $employee->last_name = $request->last_name;
        $employee->age = $request->age;
        $employee->gender = $request->gender;
        $employee->department = $request->department;
        $employee->start_date_of_employment = $request->start_date_of_employment;
        $employee->save();

        ContactEmployees::create([
            'id_employees' => $employee->id_employees,
            'phone' => $request->phone,
            'email' => $request->email
        ]);

        return redirect('/employee/show/'.$employee->id_employees)->with('success','Berhasil menambahkan employee baru!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Employees  $employees
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $employee = Employees::find($id);
        $all_module = TrainingModule::all();
        // dd($all_module);
        return view('Employee.detail',['employee' => $employee, 'all_module' => $all_module]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Employees  $employees
     * @return \Illuminate\Http\Response
     */
    public function edit(Employees $employees)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Employees  $employees
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Employees $employees)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Employees  $employees
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employees $employees)
    {
        //
    }

    public function filter(Request $request)
    {
        $modules = $request->module;
        if ($modules==null) {
            $employees['data'] = TrainingEmployees::where('status',$request->status)->with('employees')->get();
        }else{
            $employees['data'] = TrainingEmployees::where('status',$request->status)->whereIn('module_attended',$request->module)->with('employees')->get();
        }
        return response()->json($employees);
    }
}
