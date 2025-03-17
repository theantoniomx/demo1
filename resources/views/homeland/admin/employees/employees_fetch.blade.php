@extends('layouts.homeland')

@php
    $showCarousel = false;
@endphp

@section('content')

<div class="site-blocks-cover inner-page-cover overlay" style="background-image: url({{asset('images/hero_bg_2.jpg')}});" data-aos="fade" data-stellar-background-ratio="0.5">
    <div class="container">
      <div class="row align-items-center justify-content-center text-center">
        <div class="col-md-10">
          <h1 class="mb-2">Admin Employees</h1>
        </div>
      </div>
    </div>
</div>

<div class="site-section">
<div class="container">
    <div class="row mb-5 justify-content-center" data-aos="fade-up">
        <div class="col-md-10">
            <div class="site-section-title text-left">
                <h2>Employees</h2>
                <button id="btnGetEmployeesUsingFetch">GET EMPLOYEES</button>
                <table id="tblEmployees1">
                    <thead>
                        <tr>
                            <th>EMPLOYEE NO.</th>
                            <th>FIRST NAME</th>
                            <th>LAST NAME</th>
                            <th>EMAIL</th>
                            <th>GENDER</th>
                            <th>SALARY</th>
                            <th>DEPARTMENT</th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</div>

@endsection
