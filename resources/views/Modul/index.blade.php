@extends('layouts.dashboard2')
@section('title','Training Dashboard')
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
                                            <td>{{ $module->number_of_participants }}</td>
                                            <td>Avg : {{ $module->average_training_hour??0 }} <br>
                                                Max : {{ $module->max_training_hour??0 }} <br>
                                                Min : {{ $module->min_training_hour??0 }}</td>
                                            <td>Avg : {{ $module->average_error??0 }} <br>
                                                Max : {{ $module->max_error??0 }} <br>
                                                Min : {{ $module->min_error??0 }}</td>
                                            <td>Passed : {{ $module->percent_pass??0 }} <br>
                                                Failed : {{ $module->percent_fail??0 }}</td>
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
