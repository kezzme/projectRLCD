<x-system-layout>
<main id="main" class="main">
<div class="row g-3" >
      <div class="pagetitle col-md-10">
        <h1>Sold Units</h1>
          <nav>
              <ol class="breadcrumb">
              <li class="breadcrumb-item">Home</li>
                <li class="breadcrumb-item">Inventory</li>
                <li class="breadcrumb-item active">Sold Units</li>
              </ol>
            </nav>
       </div>
  </div><!-- End Page Title -->

    <section class="section">
      <div class="col-md-12 mt-2 ">
          <div class="row">
            @foreach ($soldUnits as $soldUnit)
              <div class="col-md-3 d-flex ">
                  <div class="card rounded-4">
                  <div class="d-flex justify-content-between align-items-center"> <span class="car-price">₱{{ number_format($soldUnit->car_price, 0, '.', ',') }}</span><span class="car-sold">SOLD</span> </div>
                  <img src="{{ asset('img/'.$soldUnit->image.'')}}" class="card-img-top">
                    <div class="card-body">
                      <h4><a class="text-danger">{{$soldUnit->car_year}}</a> {{$soldUnit->car_make}} {{$soldUnit->car_model}}</h4>
                      <h5>{{$soldUnit->car_variant}}</h5>
                          <p class="col-12">
                              <span class="fa-solid fa-user mb-2"></span> {{$soldUnit->first_name}} {{$soldUnit->last_name}}<br>
                              <span class="fa-solid fa-phone mb-2"></span> {{ substr_replace(substr_replace($soldUnit->contact, '-', 4, 0), '-', 8, 0) }} <br>
                              <span class="fa-solid fa-car"></span> {{$soldUnit->car_plate_no}}<br>
                              <span class="fa-solid fa-calendar-check"></span> {{ strtoupper(\Carbon\Carbon::parse($soldUnit->date)->format('F-d-Y')) }}
                            </p>
                        </div>
                        <div class="card-footer">
                          @if ($soldUnit->transaction_type === 'cash')
                            <h6 class="text-center"><i class="fa-solid fa-money-bill-wave"></i> Cash</h6>
                            @elseif ($soldUnit->transaction_type === 'financing')
                            <h6 class="text-center"><i class="fa-solid fa-building-columns"></i> Financing</h6>
                            @else
                            <h6 class="text-center"><i class="fa-solid fa-arrow-right-arrow-left"></i> Trade-in</h6>
                          @endif
                        </div>
                      </div>
                </div><!-- End Recent Sales -->
      @endforeach


      </div>
      </div>
    </section>

  </main><!-- End #main -->

</x-system-layout>