<x-landing-layout>

  @include('home.nav-bar')

<!-- Page Header Start -->
<div class="container-fluid page-header mb-5 p-0" style="background-image: url(img/carousel-bg-4.jpg);">
  <div class="container-fluid page-header-inner py-5">
    <div class="container text-center">
      <h1 class="display-3 text-white mb-3 animated slideInDown">New Arrival Units</h1>
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb justify-content-center text-uppercase">
          <li class="breadcrumb-item">
            <a href="#">Home</a>
          </li>
          <li class="breadcrumb-item">
            <a href="#">Pages</a>
          </li>
          <li class="breadcrumb-item text-white active" aria-current="page">New Arrival</li>
        </ol>
      </nav>
    </div>
  </div>
</div>
<!-- Page Header End -->

<!-- Testimonial Start -->
<div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
  <div class="owl-carousel testimonial-carousel position-relative"> 
    @foreach ($units as $unit) 
    <div class="testimonial-item text-center">
      <img src="img/{{ $unit->image }}">
      <h3>{{ $unit->car_year }} {{ $unit->car_make }} {{ $unit->car_model }}</h3>
      <h5>{{ $unit->car_variant }}</h5>
      <div class="price">₱{{ number_format($unit->price, 0, '.', ',') }}</div>
      <p>
        <span class="fa-solid fa-microchip"></span> {{ $unit->engine }}
        <span class="fa-solid fa-gauge"></span> {{ $unit->transmission }}
        <span class="fa-solid fa-gas-pump"></span> {{ $unit->fuel }}
      </p>
      <div>
        @auth
          <a class="btn btn-primary col-md-4 animated slideInDown" href="/new-arrival/trade-in/{{$unit->uid}}">Trade-in</a>
          <a class="btn btn-primary col-md-4 animated slideInDown" href="/new-arrival/view-details/{{$unit->uid}}">View Details</a>
        @else
          <a class="btn btn-primary col-md-4 animated slideInDown" data-bs-toggle="modal" href="#tradeInModalToggle">Trade-in</a>
          <a class="btn btn-primary col-md-4 animated slideInDown" data-bs-toggle="modal" href="#viewDetailsModalToggle">View Details</a>
        @endauth
      </div>
    </div> 
    @endforeach 
</div>
</div>
<!-- Testimonial End -->


<!-- Modal Start -->
<div class="modal fade" id="tradeInModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalToggleLabel">Login Prompt</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
       To continue with <b>Trade-in</b>, please Login.
      </div>
      <div class="modal-footer">
        <a class="btn btn-primary btn-rounded" type="button" href="{{ route('login')}}">Login</a>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="viewDetailsModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalToggleLabel">Login Prompt</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        To continue with <b>View Details</b>, please Login.
      </div>
      <div class="modal-footer">
        <a class="btn btn-primary btn-rounded" type="button" href="{{ route('login')}}">Login</a>
      </div>
    </div>
  </div>
</div>
<!-- Modal End -->

@include('home.footer')
</x-landing-layout>