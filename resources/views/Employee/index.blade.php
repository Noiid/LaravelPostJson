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
                        <h4 class="header-title">All Employee</h4>
                        <div class="table-responsive">
                            <table id="" class="table table-bordered datatable">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Company</th>
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Age</th>
                                        <th>Gender</th>
                                        <th>Department</th>
                                        <th>Start Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>No</th>
                                        <th>Company</th>
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Age</th>
                                        <th>Gender</th>
                                        <th>Department</th>
                                        <th>Start Date</th>
                                        <th>Action</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    @foreach ($employees as $emp)
                                        <tr>
                                            <td>{{ $loop->index+1 }}</td>
                                            <td>{{ $emp->company->name_company }}</td>
                                            <td>{{ $emp->first_name }}</td>
                                            <td>{{ $emp->last_name }}</td>
                                            <td>{{ $emp->age }}</td>
                                            <td>{{ $emp->gender }}</td>
                                            <td>{{ $emp->department }}</td>
                                            <td>{{ $emp->start_date_of_employment }}</td>
                                            <td>
                                                <a href="/employee/show/{{ $emp->id_employees }}" class="btn btn-primary">Detail</a>
                                            </td>
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
