<x-landing-layout>
    @include('home.nav-bar')

    <main id="main" class="main">

    <section class="section">
        <div class="col-md-12 mt-2 ">
            <div class="row justify-content-center">
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
                              <button type="button" class="btn btn-primary rounded-5 text-center" data-bs-toggle="modal" data-bs-target="#DetailingModal">
                                  <i class="fa-regular fa-images" style="color: #ffffff;"></i>
                              </button>
                          </span>
                          <hr>
                          <h6>Details:</h6>
                          <div class="col-md-12" style="font-size: 18px;">
                           <div class="row text-muted">
                              <div style="text-transform: capitalize">{{$bookedAutoDetailing->car_year}} {{$bookedAutoDetailing->car_make}} {{$bookedAutoDetailing->car_model}} {{$bookedAutoDetailing->car_variant}}</div>
                              <div style="text-transform: uppercase">{{$bookedAutoDetailing->unit_plate_no}}</div>
                              <div class="mb-2">{{$bookedAutoDetailing->special_request ?? 'No Speical Request'}}</div>
                              
                              <hr>
                              <h5><i class="fa-regular fa-clock"></i> {{ str(\Carbon\Carbon::parse($bookedAutoDetailing->date)->format('F d, Y')) }} | {{$bookedAutoDetailing->time}}</h5>
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

    @if ($bookedAutoDetailing)
    <div class="modal fade" id="DetailingModal" tabindex="-1" aria-labelledby="DetailingModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="DetailingModalLabel">Images</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div id="imageCarousel" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                          
                          <div class="carousel-item active">
                            <img src="{{asset('storage/' .$bookedAutoDetailing->photo_1.'')}}" class="d-block w-100" alt="">
                        </div>
                          @if($bookedAutoDetailing->photo_2)
                          <div class="carousel-item">
                            <img src="{{asset('storage/' .$bookedAutoDetailing->photo_2.'')}}" class="d-block w-100" alt="">
                        </div>
                          @endif
                          @if($bookedAutoDetailing->photo_3)
                          <div class="carousel-item">
                            <img src="{{asset('storage/' .$bookedAutoDetailing->photo_3.'')}}" class="d-block w-100" alt="">
                        </div>
                          @endif
                          @if($bookedAutoDetailing->photo_4)
                          <div class="carousel-item">
                            <img src="{{asset('storage/' .$bookedAutoDetailing->photo_4.'')}}" class="d-block w-100" alt="">
                        </div>
                          @endif
                          @if($bookedAutoDetailing->photo_5)
                          <div class="carousel-item">
                            <img src="{{asset('storage/' .$bookedAutoDetailing->photo_5.'')}}" class="d-block w-100" alt="">
                        </div>
                          @endif
                          @if($bookedAutoDetailing->photo_6)
                          <div class="carousel-item">
                            <img src="{{asset('storage/' .$bookedAutoDetailing->photo_6.'')}}" class="d-block w-100" alt="">
                        </div>
                          @endif
                        
                          
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
    @endif



    @include('home.footer')
</x-landing-layout>
<script>

</script>