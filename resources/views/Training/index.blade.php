@extends('layouts.dashboard2')
@section('title','Training Dashboard')
@section('content-inner')
<div class="main-content-inner">
    <div class="container">
        <div class="row mb-5">
            <div class="col-xl-12 col-lg-12 mt-5">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title mb-0">Number of participants by module</h4><br>
                        <div id="ambarchart3"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mb-5">
            <div class="col-xl-12 col-lg-12 mt-5">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title mb-0">Number of errors by module</h4><br>
                        <div id="ambarchart4"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mb-5">
            <div class="col-xl-12 col-lg-12 mt-5">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title mb-0">Number of training hours by module</h4><br>
                        <div id="ambarchart5"></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- overview area start pie chart -->
        <div class="row mt-5">
            <div class="col-xl-4 col-lg-4 coin-distribution">
                <div class="card h-full">
                    <div class="card-body">
                        <h4 class="header-title mb-0">Success Percentage Fire Fighting</h4>
                        <div id="percent_fire_fighting"></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-4 coin-distribution">
                <div class="card h-full">
                    <div class="card-body">
                        <h4 class="header-title mb-0">Success Percentage Evacuation</h4>
                        <div id="percent_evacuation"></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-4 coin-distribution">
                <div class="card h-full">
                    <div class="card-body">
                        <h4 class="header-title mb-0">Success Percentage Leadership</h4>
                        <div id="percent_leadership"></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- overview area end -->

        <div class="row mt-5 mb-5">
            <div class="col-xl-4 col-lg-4 mt-5">
                <div class="card">
                    <div id="highpiechart4"></div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-4 mt-5">
                <div class="card">
                    <div id="highpiechart4_2"></div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-4 mt-5">
                <div class="card">
                    <div id="highpiechart4_3"></div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
