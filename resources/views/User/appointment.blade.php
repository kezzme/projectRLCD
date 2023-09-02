<x-landing-layout>
    @include('home.nav-bar')

    <main id="main" class="main">

    <section class="section">
        <div class="col-md-12 mt-2 ">
            <div class="row justify-content-center">
                  @if ($appointments)
                  <div class="col-md-4 d-flex">
                      <div class="card card-showroom card-rounded product-grid2">
                        <div class="justify-content-between align-items-center">
                          <span class="pending">Pending</span>
                        </div>
                        <div class="mb-1">
                          <img src="{{asset('img/'.$appointments->image.'')}}"
                            alt="login form" class="img-fluid" style="border-radius: 1rem 1rem 0 0rem;" />
                        </div>
                        <div class="card-body">
                          <span class="d-flex justify-content-between align-items-center">
                              <h4><a class="text-danger">Appointment</a></h4>
                             
                                  <i class="fa-regular fa-images" style="color: #ffffff;"></i>
                              </button>
                          </span>
                          <hr>
                          <div class="col-lg-12">
                            <div class="row">
                               <div class="col-lg-6 mb-3 card-text">
                                <div class="row">
                                 <h6>Your Request:</h6>
                                   <div style="text-transform: capitalize">{{$appointments->car_year}} {{$appointments->car_make}} {{$appointments->car_model}} {{$appointments->car_variant}}</div>
                                   <div style="text-transform: uppercase">{{$appointments->car_plate_no}}</div>
                                   <div>₱{{ number_format($appointments->car_price, 0, '.', ',') }}</div>
                                  
                               </div>
                               </div>
                           <hr>
                           <h5 class="text-center"><i class="fa-regular fa-clock"></i> {{ str(\Carbon\Carbon::parse($appointments->date)->format('F d, Y')) }} | {{$appointments->time}}</h5>
                        </div>
                        </div>
                          {{-- <div class=""> --}}
                            <div class="add-to-cart" href="">
                              <i class="fa-solid fa-ban"></i> Cancel Booking
                            </div>
                          {{-- </div> --}}
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




    @include('home.footer')
</x-landing-layout>
<script>

</script>
