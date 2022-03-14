@extends('layouts.dashboard2')
@section('title','Purchase Unit')
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
                        <h4 class="header-title">Add Employee</h4>
                        <form method="POST" action="/employee/store">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="exampleInputPassword1">Company</label>
                                <select name="id_company" class="custom-select" required>
                                    <option value="">Pilih Company</option>
                                    @foreach ($companies as $company)
                                        <option value="{{ $company->id_company }}">{{ $company->name_company }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="inputFN">First Name</label>
                                <input type="text" name="first_name" class="form-control" id="inputFN" placeholder="Enter first name" required>
                            </div>
                            <div class="form-group">
                                <label for="inputLN">Last Name</label>
                                <input type="text" name="last_name" class="form-control" id="inputLN" placeholder="Enter last name" required>
                            </div>
                            <div class="form-group">
                                <label for="inputAge">Age</label>
                                <input type="number" name="age" class="form-control" id="inputAge" placeholder="Enter age" required>
                            </div>
                            <div class="form-group">
                                <label for="">Gender</label>
                                <select name="gender" class="custom-select" required>
                                    <option value="">Pilih Gender</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="inputDepartment">Department</label>
                                <input type="text" name="department" class="form-control" id="inputDepartment" placeholder="Enter department" required>
                            </div>
                            <div class="form-group">
                                <label for="inputPhone">Phone</label>
                                <input type="text" name="phone" class="form-control" id="inputPhone" placeholder="Enter phone" required>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail">Email</label>
                                <input type="email" name="email" class="form-control" id="inputEmail" placeholder="Enter email" required>
                            </div>
                            <div class="form-group">
                                <label for="inputStartDate">Start Date of Employment</label>
                                <input type="date" name="start_date_of_employment" class="form-control" id="inputStartDate" placeholder="" required>
                            </div>
                            <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4">Submit</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
