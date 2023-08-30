<x-landing-layout>
    @include('home.nav-bar')

    <main id="main" class="main">

    <section class="section">
        <div class="col-md-12 mt-2 ">
            <div class="row justify-content-center">
                  @if ($tradeRequest)
                  <div class="col-md-4 d-flex">
                      <div class="card card-showroom card-rounded product-grid2">
                        <div class="justify-content-between align-items-center">
                          <span class="pending">Pending</span>
                        </div>
                        <div class="mb-1">
                          <img src="{{asset('img/'.$tradeRequest->image.'')}}"
                            alt="login form" class="img-fluid" style="border-radius: 1rem 1rem 0 0rem;" />
                        </div>
                        <div class="card-body">
                          <span class="d-flex justify-content-between align-items-center">
                              <h4><a class="text-danger">Trade-in: Request</a></h4>
                              <button type="button" class="btn btn-primary rounded-5 text-center" data-bs-toggle="modal" data-bs-target="#DetailingModal">
                                  <i class="fa-regular fa-images" style="color: #ffffff;"></i>
                              </button>
                          </span>
                          <hr>
                          <div class="col-lg-12">
                            <div class="row">
                              <div class="col-lg-6 mb-3 card-text">
                                <div class="row">
                                  <h6>Your Unit:</h6>
                                   <div style="text-transform: capitalize">{{$tradeRequest->unit_year}} {{$tradeRequest->unit_make}} {{$tradeRequest->unit_model}} {{$tradeRequest->unit_variant}}</div>
                                   <div style="text-transform: uppercase">{{$tradeRequest->unit_plate_no}}</div>
                                   <div>₱{{ number_format($tradeRequest->unit_price, 0, '.', ',') }}</div>
    
                               </div>
                               </div>
                          
                          
                               <div class="col-lg-6 mb-3 card-text">
                                <div class="row">
                                 <h6>Your Request:</h6>
                                   <div style="text-transform: capitalize">{{$tradeRequest->car_year}} {{$tradeRequest->car_make}} {{$tradeRequest->car_model}} {{$tradeRequest->car_variant}}</div>
                                   <div>₱{{ number_format($tradeRequest->car_price, 0, '.', ',') }}</div>
                                  
                               </div>
                               </div>
                           <hr>
                           <h5 class="text-center"><i class="fa-regular fa-clock"></i> {{ str(\Carbon\Carbon::parse($tradeRequest->date)->format('F d, Y')) }} | {{$tradeRequest->time}}</h5>
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

    @if ($tradeRequest)
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
                            <img src="{{asset('storage/' .$tradeRequest->photo_1.'')}}" class="d-block w-100" alt="">
                        </div>
                          @if($tradeRequest->photo_2)
                          <div class="carousel-item">
                            <img src="{{asset('storage/' .$tradeRequest->photo_2.'')}}" class="d-block w-100" alt="">
                        </div>
                          @endif
                          @if($tradeRequest->photo_3)
                          <div class="carousel-item">
                            <img src="{{asset('storage/' .$tradeRequest->photo_3.'')}}" class="d-block w-100" alt="">
                        </div>
                          @endif
                          @if($tradeRequest->photo_4)
                          <div class="carousel-item">
                            <img src="{{asset('storage/' .$tradeRequest->photo_4.'')}}" class="d-block w-100" alt="">
                        </div>
                          @endif
                          @if($tradeRequest->photo_5)
                          <div class="carousel-item">
                            <img src="{{asset('storage/' .$tradeRequest->photo_5.'')}}" class="d-block w-100" alt="">
                        </div>
                          @endif
                          @if($tradeRequest->photo_6)
                          <div class="carousel-item">
                            <img src="{{asset('storage/' .$tradeRequest->photo_6.'')}}" class="d-block w-100" alt="">
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
