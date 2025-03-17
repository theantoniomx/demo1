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
        <div class="col-md-7">
            <div class="site-section-title text-left">
                <h2>Properties</h2>
                <table id="tblProperties1">
                    <thead>
                        <tr>
                            <th>NAME</th>
                            <th>LAST NAME</th>
                            <th>EMAIL</th>
                            <th>SALARY</th>
                            <th>DEPARTMENT</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($employees as $employee)
                        <tr>
                            <td>{{ $employee->first_name??'Undefined' }}</td>
                            <td>{{ $employee->last_name??'Undefined' }}</td>
                            <td>{{ $employee->email??'Undefined' }}</td>
                            <td>{{ $employee->salary??'Undefined' }}</td>
                            <td>{{ $employee->department??'Undefined' }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</div>

@endsection
