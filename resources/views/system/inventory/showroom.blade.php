<x-system-layout>
<main id="main" class="main">
<div class="row g-3" >
  <div class="pagetitle col-md-5">
        <h1>Showroom</h1>
          <nav>
              <ol class="breadcrumb">
              <li class="breadcrumb-item">Home</li>
                <li class="breadcrumb-item">Inventory</li>
                <li class="breadcrumb-item active">Showroom</li>
              </ol>
            </nav>
          </div>
            <div class="col-md-7">
              <div class="col-md-12 mb-3">
                <div class="input-group search-bar">
                  <input type="text" class="form-control rounded-5" placeholder="Search...">
                  <div class="input-group-prepend">
                    <span class="input-group-text bg-transparent border-0" style="position: absolute; right: 0; top: 0; bottom: 0; padding: 0.375rem;">
                      <i class="fas fa-search"></i>
                    </span>
                  </div>
                </div>
              </div>
           </div>
        </div><!-- End Page Title -->

    <section class="section">
        <div class="col-md-12 mt-2 ">
          <div class="row">
            @foreach ($units as $unit)
    <div class="col-md-3 d-flex ">
        <div class="card card-showroom rounded-4 product-grid2">
        <div class="justify-content-between align-items-center"> <span class="car-price">₱{{ number_format($unit->car_price, 0, '.', ',') }}</span> </div>
         <img src="{{ asset('img/'.$unit->image.'')}}" class="card-img-top">
          <div class="card-body">
            
          <h4><a class="text-danger">{{$unit->car_year}}</a> {{$unit->car_make}} {{$unit->car_model}}</h4>
            <h5>{{$unit->car_variant}}</h5>
                  <p style="font-size: 15px;">
                    <span class="fa-solid fa-microchip"></span> {{$unit->engine}}
                    <span class="fa-solid fa-gauge"></span> {{$unit->transmission}}
                    <span class="fa-solid fa-gas-pump"></span> {{$unit->fuel}}
                  </p>
                  <div class="">
                    <a class="add-to-cart" href="">
                    <i class="fa-solid fa-pen-to-square"></i>
                            Edit Details
                    </a>
                 </div>
               </div>
              
            </div>
      </div>
      @endforeach
      <!-- End Recent Sales -->

      </div>
      </div>
    </section>

  </main><!-- End #main -->
</x-system-layout>