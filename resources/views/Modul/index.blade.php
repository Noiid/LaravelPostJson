@extends('layouts.dashboard2')
@section('title','Summary Module')
@section('content-inner')
<div class="main-content-inner">
    <div class="container-fluid">
        <div class="row bg-white">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title">Employees</h4>
                        @include('Company.components.menu1')
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title">Training Module</h4>
                        <div class="table-responsive">
                            <table id="" class="table table-bordered datatable">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Module</th>
                                        <th>Participants</th>
                                        <th>Training Hour</th>
                                        <th>Error</th>
                                        <th>Success Percentage</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>No</th>
                                        <th>Module</th>
                                        <th>Participants</th>
                                        <th>Training Hour</th>
                                        <th>Error</th>
                                        <th>Success Percentage</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    @foreach ($modules as $module)
                                        <tr>
                                            <td>{{ $loop->index+1 }}</td>
                                            <td>{{ $module->module_name }}</td>
                                            <td>{{ count($training->where('module_attended',$module->module_name)) }}</td>
                                            <td>Avg : {{ $training->where('module_attended',$module->module_name)->avg('training_hour')??0 }} <br>
                                                Max : {{ $training->where('module_attended',$module->module_name)->max('training_hour')??0 }} <br>
                                                Min : {{ $training->where('module_attended',$module->module_name)->min('training_hour')??0 }}</td>
                                            <td>Avg : {{ $training->where('module_attended',$module->module_name)->avg('error')??0 }} <br>
                                                Max : {{ $training->where('module_attended',$module->module_name)->max('error')??0 }} <br>
                                                Min : {{ $training->where('module_attended',$module->module_name)->min('error')??0 }}</td>

                                            @php
                                                $tra_complete = count(App\TrainingEmployees::where('module_attended',$module->module_name)->where('status','LIKE','%Passed%')->get());
                                                $tra_fail = count(App\TrainingEmployees::where('module_attended',$module->module_name)->where('status','NOT LIKE','%Passed%')->get());
                                                $tra_all = count(App\TrainingEmployees::where('module_attended',$module->module_name)->get());
                                            @endphp
                                            <td>Passed : {{ ($tra_all > 0) ? ($tra_complete / $tra_all * 100)??0 : 0 }}% <br>
                                                Failed : {{ ($tra_all > 0) ? ($tra_fail / $tra_all * 100)??0 : 0 }}%</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
