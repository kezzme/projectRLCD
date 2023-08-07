<x-system-layout>

<main id="main" class="main">

    <div class="pagetitle">
      <h1>Financing Status</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Financing</li>
          <li class="breadcrumb-item active">Status</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">

     <!-- Recent Sales -->
     <div class="col-12">
        <div class="card recent-sales overflow-auto rounded-5">

          <div class="card-body table-responsive">
            <h5 class="card-title card-header">Client Status</h5>
            @if ($financing_statuses->isEmpty())
            <p>No Listings</p>
          @else

            <table id="dtHorizontalExample" class="table table-condensed table-hover" cellspacing="0" width="100%" >
              <thead class="table-success">
                <tr>
                  <th scope="col">ID</th>
                  <th scope="col">Name</th>
                  <th scope="col">Year</th>
                  <th scope="col">Make</th>
                  <th scope="col">Model</th>
                  <th scope="col">Variant</th>
                  <th scope="col">Plate No.</th>
                  <th scope="col">Price</th>
                  <th scope="col">Date</th>
                  <th scope="col">Financing Bank</th>
                  <th scope="col" class="text-center">Status</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($financing_statuses as $finStatus)
                <tr>
                  <th scope="row"><a href="#">{{$finStatus->user_id}}</a></th>
                  <td>{{$finStatus->first_name}} {{$finStatus->last_name}}</td>
                  <td>{{$finStatus->car_year}}</td>
                  <td>{{$finStatus->car_make}}</td>
                  <td>{{$finStatus->car_model}}</td>
                  <td>{{$finStatus->car_variant}}</td>
                  <td>{{$finStatus->car_plate_no}}</td>
                  <td>₱{{ number_format($finStatus->car_price, 0, '.', ',') }}</td>
                  <td>{{ strtoupper(\Carbon\Carbon::parse($finStatus->date)->format('F-d-Y')) }}</td>
                  <td>{{$finStatus->financing_bank}}</td>
                  <td>
                    @if($finStatus->status === 'Approved')
                    <span class="badge bg-success w-100">{{$finStatus->status}}</span>
                  @else
                    <span class="badge bg-danger w-100">{{$finStatus->status}}</span>
                  @endif
                </td>
                </tr>
                @endforeach
              </tbody>
            </table>
            <div class="d-flex justify-content-center">
              {{ $financing_statuses->links() }}
            </div>
          </div>
          @endif
        </div>
      </div><!-- End Recent Sales -->
    </section>

  </main><!-- End #main -->
</x-system-layout>