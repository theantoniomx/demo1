@extends('layouts.homeland')

@section('content')
<div class="site-section site-section-sm pb-0">
    <div class="container">
      <div class="row">
        <form class="form-search col-md-12" style="margin-top: -100px;">
          <div class="row  align-items-end">
            <div class="col-md-3">
              <label for="list-types">Listing Types</label>
              <div class="select-wrap">
                <span class="icon icon-arrow_drop_down"></span>
                <select name="list-types" id="list-types" class="form-control d-block rounded-0">
                  <option value="">Condo</option>
                  <option value="">Commercial Building</option>
                  <option value="">Land Property</option>
                </select>
              </div>
            </div>
            <div class="col-md-3">
              <label for="offer-types">Offer Type</label>
              <div class="select-wrap">
                <span class="icon icon-arrow_drop_down"></span>
                <select name="offer-types" id="offer-types" class="form-control d-block rounded-0">
                  <option value="">For Sale</option>
                  <option value="">For Rent</option>
                  <option value="">For Lease</option>
                </select>
              </div>
            </div>
            <div class="col-md-3">
              <label for="select-city">Select City</label>
              <div class="select-wrap">
                <span class="icon icon-arrow_drop_down"></span>
                <select name="select-city" id="select-city" class="form-control d-block rounded-0">
                  <option value="">New York</option>
                  <option value="">Brooklyn</option>
                  <option value="">London</option>
                  <option value="">Japan</option>
                  <option value="">Philippines</option>
                </select>
              </div>
            </div>
            <div class="col-md-3">
              <input type="submit" class="btn btn-success text-white btn-block rounded-0" value="Search">
            </div>
          </div>
        </form>
      </div>

      <div class="row">
        <div class="col-md-12">
          <div class="view-options bg-white py-3 px-3 d-md-flex align-items-center">
            <div class="mr-auto">
              <a href="index.html" class="icon-view view-module active"><span class="icon-view_module"></span></a>
              <a href="view-list.html" class="icon-view view-list"><span class="icon-view_list"></span></a>

            </div>
            <div class="ml-auto d-flex align-items-center">
              <div>
                <a href="#" class="view-list px-3 border-right active">All</a>
                <a href="#" class="view-list px-3 border-right">Rent</a>
                <a href="#" class="view-list px-3">Sale</a>
              </div>


              <div class="select-wrap">
                <span class="icon icon-arrow_drop_down"></span>
                <select class="form-control form-control-sm d-block rounded-0">
                  <option value="">Sort by</option>
                  <option value="">Price Ascending</option>
                  <option value="">Price Descending</option>
                </select>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>

  <div class="site-section site-section-sm bg-light">
    <div class="container">

      <div class="row mb-5">
        @foreach ($properties as $prop)
        <div class="col-md-6 col-lg-4 mb-4">
          <div class="property-entry h-100">
            <a href="{{ route('property_details', $prop->id) }}" class="property-thumbnail">
              <div class="offer-type-wrap">
                <span class="offer-type bg-danger">Sale</span>
                <span class="offer-type bg-success">Rent</span>
              </div>
                @foreach (json_decode($prop->images) as $img)
                    @if ($loop->first)
                        <img src="{{asset('images')}}/{{$img}}" alt="Image" class="img-fluid">
                        @break
                    @endif
                @endforeach
            </a>
            <div class="p-4 property-body">
              <a href="#" class="property-favorite"><span class="icon-heart-o"></span></a>
              <h2 class="property-title"><a href="{{ route('property_details', $prop->id) }}">{{$prop->address}}</a></h2>
              <span class="property-location d-block mb-3"><span class="property-icon icon-room"></span> 625 S. Berendo St Unit 607 Los Angeles, CA 90005</span>
              <strong class="property-price text-primary mb-3 d-block text-success">{{ $prop->getPriceAsCurrency() }}</strong>
              <ul class="property-specs-wrap mb-3 mb-lg-0">
                <li>
                  <span class="property-specs">Beds</span>
                  <span class="property-specs-number">{{$prop->bedrooms}}<sup>+</sup></span>

                </li>
                <li>
                  <span class="property-specs">Baths</span>
                  <span class="property-specs-number">{{$prop->bathrooms}}</span>

                </li>
                <li>
                  <span class="property-specs">SQ FT</span>
                  <span class="property-specs-number">{{$prop->sq_ft}}</span>

                </li>
                <li>
                    <span class="property-specs">Home Type</span>
                    <span class="property-specs-number">{{$prop->list_type->name}}</span>
                </li>
              </ul>

            </div>
          </div>
        </div>
        @endforeach
      </div>

    </div>
  </div>

  <div class="site-section">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-7 text-center">
          <div class="site-section-title">
            <h2>Why Choose Us?</h2>
          </div>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Debitis maiores quisquam saepe architecto error corporis aliquam. Cum ipsam a consectetur aut sunt sint animi, pariatur corporis, eaque, deleniti cupiditate officia.</p>
        </div>
      </div>

      <div class="row">
        <div class="col-md-6 col-lg-4">
          <a href="#" class="service text-center">
            <span class="icon flaticon-house"></span>
            <h2 class="service-heading">Research Subburbs</h2>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Incidunt iure qui natus perspiciatis ex odio molestia.</p>
            <p><span class="read-more">Read More</span></p>
          </a>
        </div>
        <div class="col-md-6 col-lg-4">
          <a href="#" class="service text-center">
            <span class="icon flaticon-sold"></span>
            <h2 class="service-heading">Sold Houses</h2>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Incidunt iure qui natus perspiciatis ex odio molestia.</p>
            <p><span class="read-more">Read More</span></p>
          </a>
        </div>
        <div class="col-md-6 col-lg-4">
          <a href="#" class="service text-center">
            <span class="icon flaticon-camera"></span>
            <h2 class="service-heading">Security Priority</h2>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Incidunt iure qui natus perspiciatis ex odio molestia.</p>
            <p><span class="read-more">Read More</span></p>
          </a>
        </div>
      </div>
    </div>
  </div>
@endsection
