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
                        <h4 class="header-title">Detail Employee {{ $employee->first_name }}</h4>
                        <hr>
                        <table>
                            <tr>
                                <td class="font-weight-bold">First Name</td>
                                <td>:</td>
                                <td>{{ $employee->first_name }}</td>
                            </tr>
                            <tr>
                                <td class="font-weight-bold">Last Name</td>
                                <td>:</td>
                                <td>{{ $employee->last_name }}</td>
                            </tr>
                            <tr>
                                <td class="font-weight-bold">Age</td>
                                <td>:</td>
                                <td>{{ $employee->age }}</td>
                            </tr>
                            <tr>
                                <td class="font-weight-bold">Gender</td>
                                <td>:</td>
                                <td>{{ $employee->gender }}</td>
                            </tr>
                            <tr>
                                <td class="font-weight-bold">Department</td>
                                <td>:</td>
                                <td>{{ $employee->department }}</td>
                            </tr>
                            <tr>
                                <td class="font-weight-bold">Start Date of Employment</td>
                                <td>:</td>
                                <td>{{ $employee->start_date_of_employment }}</td>
                            </tr>
                        </table>
                        <hr>
                        <h4 class="header-title mt-3">Data Training {{ $employee->first_name }}</h4>
                        <button type="button" class="btn btn-primary mt-3" data-toggle="modal" data-target="#exampleModalLong">Add New Training</button>
                        <div class="modal fade" id="exampleModalLong">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Form Add New Training</h5>
                                        <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="/training_employee/store" method="POST">
                                            {{ csrf_field() }}
                                            <input type="hidden" name="id_employees" value="{{ $employee->id_employees }}">
                                            <div class="form-group">
                                                <label for="">Module Attended</label>
                                                <select name="module_attended" class="custom-select" required>
                                                    <option value="">Choose Option</option>
                                                    @foreach ($all_module as $module)
                                                        <option value="{{ $module->module_name }}">{{ $module->module_name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="">Test Date</label>
                                                <input type="date" name="test_date" class="form-control" required placeholder="Enter test date">
                                            </div>
                                            <div class="form-group">
                                                <label for="">Training Hour</label>
                                                <input type="number" name="training_hour" class="form-control" required placeholder="Enter training hour" step="any">
                                            </div>
                                            <div class="form-group">
                                                <label for="">Error</label>
                                                <input type="number" name="error" class="form-control" required placeholder="Enter error" step="any">
                                            </div>
                                            <div class="form-group">
                                                <label for="">Status</label>
                                                <input type="text" name="status" class="form-control" required placeholder="Enter status">
                                            </div>
                                            <div class="form-group">
                                                <label for="">Renewal Date</label>
                                                <input type="date" name="renewal_date" class="form-control" required placeholder="Enter renewal date">
                                            </div>
                                            <div class="form-group">
                                                <input type="submit" value="Simpan Data" class="btn btn-primary">
                                            </div>
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive mt-3">
                            <table id="" class="table table-bordered datatable">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Module</th>
                                        <th>Test Date</th>
                                        <th>Training Hour</th>
                                        <th>Error</th>
                                        <th>Status</th>
                                        <th>Renewal Date</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>No</th>
                                        <th>Module</th>
                                        <th>Test Date</th>
                                        <th>Training Hour</th>
                                        <th>Error</th>
                                        <th>Status</th>
                                        <th>Renewal Date</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    @foreach ($employee->training_employees as $training)
                                        <tr>
                                            <td>{{ $loop->index+1 }}</td>
                                            <td>{{ $training->module_attended }}</td>
                                            <td>{{ $training->test_date }}</td>
                                            <td>{{ $training->training_hour }}</td>
                                            <td>{{ $training->error }}</td>
                                            <td>{{ $training->status }}</td>
                                            <td>{{ $training->renewal_date }}</td>
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
