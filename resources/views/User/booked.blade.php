<x-landing-layout>
    @include('home.nav-bar')

    <main id="main" class="main">

    <section class="section">
        <div class="col-md-12 mt-2 ">
            <div class="row justify-content-center">
                @if ($bookedCarWash)
                <div class="col-md-3 d-flex">
                    <div class="card card-showroom card-rounded product-grid2">
                      <div class="justify-content-between align-items-center">
                        <span class="car-price">₱{{$bookedCarWash->amount}}</span>
                      </div>
                      <div class="mb-1">
                        <img src="{{asset('img/sample/4.jpg')}}"
                          alt="login form" class="img-fluid" style="border-radius: 1rem 1rem 0 0rem;" />
                      </div>
                      <div class="card-body">
                        <h4><a class="text-danger">Service: Car Wash</a></h4>
                        <hr>
                        <h6>Details:</h6>
                        <div class="col-md-12" style="font-size: 18px;">
                         <div class="row text-muted">
                            <div style="text-transform: capitalize">{{$bookedCarWash->car_make}} {{$bookedCarWash->car_model}}</div>
                            <div style="text-transform: capitalize">{{$bookedCarWash->body_type}}</div>
                            <div style="text-transform: uppercase">{{$bookedCarWash->unit_plate_no}}</div>
                            <div class="mb-2">{{$bookedCarWash->special_request ?? 'No Speical Request'}}</div>
                            
                            <hr>
                            <h5><i class="fa-regular fa-clock"></i> {{ str(\Carbon\Carbon::parse($bookedCarWash->date)->format('F d, Y')) }} | {{$bookedCarWash->time}}</h5>
                        </div>
                        </div>
                        <div class="">
                          <a class="add-to-cart" href="">
                            <i class="fa-solid fa-ban"></i> Cancel Booking
                          </a>
                        </div>
                      </div>
                    </div>
                  </div>
                  @else

                  @endif
                  @if ($bookedAutoDetailing)
                  <div class="col-md-3 d-flex">
                      <div class="card card-showroom card-rounded product-grid2">
                        <div class="justify-content-between align-items-center">
                          <span class="pending">Pending</span>
                        </div>
                        <div class="mb-1">
                          <img src="{{asset('img/sample/4.jpg')}}"
                            alt="login form" class="img-fluid" style="border-radius: 1rem 1rem 0 0rem;" />
                        </div>
                        <div class="card-body">
                          <span class="d-flex justify-content-between align-items-center">
                              <h4><a class="text-danger">Service: Auto Detailing</a></h4>
                              <button type="button" class="btn btn-primary rounded-5 text-center" data-bs-toggle="modal" data-bs-target="#imageCarouselModal">
                                  <i class="fa-regular fa-images" style="color: #ffffff;"></i>
                              </button>
                          </span>
                          <hr>
                          <h6>Details:</h6>
                          <div class="col-md-12" style="font-size: 18px;">
                           <div class="row text-muted">
                              <div style="text-transform: capitalize">{{$bookedAutoDetailing->car_make}} {{$bookedAutoDetailing->car_model}}</div>
                              <div style="text-transform: capitalize">{{$bookedAutoDetailing->body_type}}</div>
                              <div style="text-transform: uppercase">{{$bookedAutoDetailing->unit_plate_no}}</div>
                              <div class="mb-2">{{$bookedAutoDetailing->special_request ?? 'No Speical Request'}}</div>
                              
                              <hr>
                              <h5><i class="fa-regular fa-clock"></i> {{ str(\Carbon\Carbon::parse($bookedAutoDetailing->date)->format('F d, Y')) }} | {{$bookedCarWash->time}}</h5>
                          </div>
                          </div>
                          <div class="">
                            <a class="add-to-cart" href="">
                              <i class="fa-solid fa-ban"></i> Cancel Booking
                            </a>
                          </div>
                        </div>
                      </div>
                    </div>
                    @else
  
                    @endif
                    
                    @if ($bookedPaintJob)
                    <div class="col-md-3 d-flex">
                        <div class="card card-showroom card-rounded product-grid2">
                          <div class="justify-content-between align-items-center">
                            <span class="pending">Pending</span>
                          </div>
                          <div class="mb-1">
                            <img src="{{asset('img/sample/4.jpg')}}"
                              alt="login form" class="img-fluid" style="border-radius: 1rem 1rem 0 0rem;" />
                          </div>
                          <div class="card-body">
                            <span class="d-flex justify-content-between align-items-center">
                                <h4><a class="text-danger">Service: Paint Job</a></h4>
                                @if ($bookedPaintJob->images && count($bookedPaintJob->images) > 0)
                                <button type="button" class="btn btn-primary rounded-5 text-center" data-bs-toggle="modal" data-bs-target="#imageCarouselModal" data-images="{{ json_encode($bookedPaintJob->images) }}">
                                    <i class="fa-regular fa-images" style="color: #ffffff;"></i>
                                </button>
                                @endif
                            </span>
                            <hr>
                            <h6>Details:</h6>
                            <div class="col-md-12" style="font-size: 18px;">
                             <div class="row text-muted">
                                <div style="text-transform: capitalize">{{$bookedPaintJob->car_make}} {{$bookedPaintJob->car_model}}</div>
                                <div style="text-transform: capitalize">{{$bookedPaintJob->body_type}}</div>
                                <div style="text-transform: uppercase">{{$bookedPaintJob->unit_plate_no}}</div>
                                <div class="mb-2">{{$bookedPaintJob->special_request ?? 'No Speical Request'}}</div>
                                
                                <hr>
                                <h5><i class="fa-regular fa-clock"></i> {{ str(\Carbon\Carbon::parse($bookedPaintJob->date)->format('F d, Y')) }} | {{$bookedPaintJob->time}}</h5>
                            </div>
                            </div>
                            <div class="">
                              <a class="add-to-cart" href="">
                                <i class="fa-solid fa-ban"></i> Cancel Booking
                              </a>
                            </div>
                          </div>
                        </div>
                      </div>
                      @else
    
                      @endif
      
      
   
      <!-- End Recent Sales -->

      </div>
      </div>
    </section>
    </main>

    <div class="modal fade" id="imageCarouselModal" tabindex="-1" aria-labelledby="imageCarouselModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="imageCarouselModalLabel">Images</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div id="imageCarousel" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            @foreach ($bookedPaintJob->images as $index => $image)
                                <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                                    <img src="{{ $image }}" class="d-block w-100" alt="Image {{ $index + 1 }}">
                                </div>
                            @endforeach
                        </div>
                        <a class="carousel-control-prev" href="#imageCarousel" role="button" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#imageCarousel" role="button" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </a>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-rounded" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    
    

    @include('home.footer')
</x-landing-layout>
<script>
    console.log(@json($bookedPaintJob->images));
</script>
