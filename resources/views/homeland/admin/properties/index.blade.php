@extends('layouts.homeland')

@php
    $showCarousel = false;
@endphp

@section('content')

<div class="site-blocks-cover inner-page-cover overlay" style="background-image: url({{asset('images/hero_bg_2.jpg')}});" data-aos="fade" data-stellar-background-ratio="0.5">
    <div class="container">
      <div class="row align-items-center justify-content-center text-center">
        <div class="col-md-10">
          <h1 class="mb-2">Admin Properties</h1>
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
                            <th>ADDRESS</th>
                            <th>PRICE</th>
                            <th>LISTING TYPE</th>
                            <th>OFFER TYPE</th>
                            <th>CITY</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($properties as $property)
                        <tr>
                            <td>{{ $property->address }}</td>
                            <td>{{ $property->price }}</td>
                            <td>{{ $property->list_type->name }}</td>
                            <td>{{ $property->offer_type }}</td>
                            <td>{{ $property->city->name }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

                <h2>Properties with AJAX</h2>
                <table id="tblProperties2">
                    <thead>
                        <tr>
                            <th>ADDRESS</th>
                            <th>PRICE</th>
                            <th>LISTING TYPE</th>
                            <th>OFFER TYPE</th>
                            <th>CITY</th>
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
