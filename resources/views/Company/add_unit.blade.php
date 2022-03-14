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
                        <h4 class="header-title">Add Unit</h4>
                        <form method="POST" action="/module/store">
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
                                <label for="exampleInputEmail1">Module Name</label>
                                <input type="text" name="module_name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter module name" required>
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
