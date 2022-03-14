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
                        <div class="row">
                            @foreach ($training_module as $module)
                                <div class="col-md-2 text-center @if($loop->last) border-right @endif">
                                    <div class="txt-circle font-weight-bold" style="background-color: {{ $color_bg[$loop->index] }}; color: white;">{{ $module[1] }}</div><br>
                                    <div class="label-circle">{{ $module[0] }}</div>
                                </div>
                            @endforeach
                            <div class="col-md-2">
                                <div class="vl"></div>
                                <a href="/module/create" class="btn btn-primary">Purchase Units</a><br>
                                <a href="/module" class="btn btn-secondary mt-3">View Full Summary</a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="row bg-white">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title">Employees Filter</h4>
                        <hr>
                        <form id="filterForm">
                            <input type="hidden" name="" value="{{ csrf_token() }}" id="tokenFilter">
                            <label for=""><strong>Status</strong></label>
                            @foreach ($status_filter as $status)
                            <div class="form-check">
                                <input class="form-check-input valStatus" type="radio" name="status_filter" id="exampleRadios{{ $loop->index }}" value="{{ $status }}" required>
                                <label class="form-check-label" for="exampleRadios{{ $loop->index }}">
                                    {{ $status }}
                                </label>
                            </div>
                            @endforeach

                            <br><label for=""><strong>Module</strong></label>
                            @foreach ($module_filter as $module)
                            <div class="form-check">
                                <input class="form-check-input valModule" type="checkbox" name="module_filter[]" id="exampleCheckbox{{ $loop->index }}" value="{{ $module->module_name }}">
                                <label class="form-check-label" for="exampleCheckbox{{ $loop->index }}">
                                    {{ $module->module_name }}
                                </label>
                            </div>
                            @endforeach

                            <div class="form-group mt-3">
                                <input type="submit" value="Submit" class="btn btn-primary" id="submitFilter">
                            </div>
                        </form>

                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title">Employee Activity</h4>
                        <div class="row">
                            <div class="col-md-3 text-center">
                                <div class="txt-underling font-weight-bold">1</div><br>
                                <div class="label-underling">Employees <b>expired</b> recently</div>
                            </div>
                            <div class="col-md-3 text-center">
                                <div class="txt-underling font-weight-bold">0</div><br>
                                <div class="label-underling">Employees <b>expiring</b> soon</div>
                            </div>
                            <div class="col-md-3 text-center border-right">
                                <div class="txt-underling font-weight-bold">1</div><br>
                                <div class="label-underling">Employees <b>certified</b> recently</div>
                            </div>
                            <div class="col-md-3">
                                <div class="vl"></div>
                                @if(auth()->user()->id_user_level==1)
                                <a href="/employee/create" class="btn btn-primary">Add Employee</a><br>
                                @endif
                                <a href="/employee" class="btn btn-secondary mt-3">View Full Summary</a>
                            </div>
                        </div>
                        <hr>
                        <div class="row mt-5">
                            <div class="col-md-12" id="contentResult">
                                <div class="table-responsive" id="resultFilter">
                                    <table id="" class="table table-bordered datatable">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Name</th>
                                                <th>Test Date</th>
                                                <th>Training Hour</th>
                                                <th>Error</th>
                                                <th>Status</th>
                                                <th>Reneweal Date</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>No</th>
                                                <th>Name</th>
                                                <th>Test Date</th>
                                                <th>Training Hour</th>
                                                <th>Error</th>
                                                <th>Status</th>
                                                <th>Reneweal Date</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                            @foreach ($training->unique('id_employees') as $emp)
                                                <tr>
                                                    <td><span class="text-white">{{ $loop->index+1 }}</span><i class="fa fa-times text-danger"></i></td>
                                                    <td colspan="6" class="font-weight-bold">{{ $emp->employees->first_name." ".$emp->employees->last_name }}</td>
                                                    <td style="display: none;"></td>
                                                    <td style="display: none;"></td>
                                                    <td style="display: none;"></td>
                                                    <td style="display: none;"></td>
                                                    <td style="display: none;"></td>
                                                </tr>
                                                @foreach ($training->where('id_employees',$emp->id_employees) as $tra)
                                                    <tr>
                                                        <td class="text-white">{{ ($loop->parent->index+1).".".($loop->index+1) }}</td>
                                                        <td>{{ $tra->module_attended }}</td>
                                                        <td>{{ $tra->test_date }}</td>
                                                        <td>{{ $tra->training_hour }}</td>
                                                        <td>{{ $tra->error }}</td>
                                                        <td>{{ $tra->status }}</td>
                                                        <td>{{ $tra->renewal_date }}</td>
                                                    </tr>
                                                @endforeach
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
    </div>
</div>

@endsection

