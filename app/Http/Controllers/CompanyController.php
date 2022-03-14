<?php

namespace App\Http\Controllers;

use App\Company;
use App\CompanyContacts;
use App\TrainingModule;
use App\Employees;
use App\ContactEmployees;
use App\TrainingEmployees;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $training_module = [['Fire Fighting',100],['Evacuation',130],['Leadership',150],['First Aid',300]];
        $color_bg = ['red','green','yellow','blue'];
        $training = TrainingEmployees::all();
        $status_filter = ['Expiring Soon','Expired','Passed/complete','Passed/incomplete','Started','Not Started'];
        $module_filter = TrainingModule::all();
        return view('Company.index',['training_module' => $training_module, 'color_bg' => $color_bg, 'training' => $training,
        'status_filter' => $status_filter, 'module_filter' => $module_filter]);
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
        $company = Company::where('name_company',$request->input('Company'))->first();
        if ($company==null) {
            $company = new Company();
            $company->name_company = $request->input('Company');
            $company->save();
        }

        $contact_company = $request->input('companycontacts');
        CompanyContacts::create([
            'id_company' => $company->id_company,
            'phone' => $contact_company['phone'],
            'email' => $contact_company['email']
        ]);

        $training_module = $request->input('TrainingModule');
        foreach ($training_module as $module) {
            TrainingModule::create([
                'id_company' => $company->id_company,
                'module_name' => $module['ModuleName'],
                'average_training_hour' => $module['AverageTrainingHour']
            ]);
        }

        $employee = $request->input('Employees');
        $contact = null;
        foreach ($employee as $emp) {
            $pegawai = new Employees();
            $pegawai->id_company = $company->id_company;
            $pegawai->first_name = $emp['FirstName'];
            $pegawai->last_name = $emp['LastName'];
            $pegawai->age = $emp['Age'];
            $pegawai->gender = $emp['Gender'];
            $pegawai->department = $emp['Department'];
            $pegawai->start_date_of_employment = date("Y-m-d", strtotime($emp['StartDateofEmployment']));
            $pegawai->save();

            $contact = new ContactEmployees();
            $contact->id_employees = $pegawai->id_employees;
            $contact->phone = $emp['contact']['phone'];
            $contact->email = $emp['contact']['email'];
            $contact->save();

            foreach ($emp['Training'] as $tra) {
                $training = new TrainingEmployees();
                $training->id_employees = $pegawai->id_employees;
                $training->module_attended = $tra['ModuleAttended'];
                $training->test_date = date("Y-m-d", strtotime($tra['Date']));
                $training->training_hour = $tra['TrainingHour'];
                $training->error = $tra['Error'];
                $training->status = $tra['Status'];
                $training->renewal_date = date("Y-m-d", strtotime($tra['RenewalDate']));
                $training->save();
            }
        }
        return 'Success';
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $company)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Company $company)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company)
    {
        //
    }
}
