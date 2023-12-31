<x-system-layout>

<main id="main" class="main">
  <div class="row g-3" >
    <div class="pagetitle col-md-5">
          <h1>Records</h1>
            <nav>
                <ol class="breadcrumb">
                  <li class="breadcrumb-item">Home</li>
                  <li class="breadcrumb-item">Car Wash</li>
                  <li class="breadcrumb-item active">Records</li>
                </ol>
              </nav>
            </div>
              <div class="col-md-7">
                <div class="col-md-12">
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
      <div class="col-12">
        <div class="card recent-sales overflow-auto rounded-5">

          <div class="card-body table-responsive">
            <h5 class="card-title card-header">Client Records</h5>
            @if ($records->isEmpty())
            <p>No Listings</p>
              @else
           
            <table id="dtHorizontalExample" class="table table-condensed table-hover" cellspacing="0" width="100%" >
              <thead class="table-success">
                <tr>
                  <th scope="col">TNX No</th>
                  <th scope="col">Name</th>
                  <th scope="col">Phone</th>
                  <th scope="col">Make</th>
                  <th scope="col">Model</th>
                  <th scope="col">Body Type</th>
                  <th scope="col">Plate No.</th>
                  <th scope="col">Special Request</th>
                  <th scope="col">Appointed Date</th>
                  <th scope="col">Amount</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($records as $record)
                  <tr>
                    <th scope="row">{{$record->TNX_No2}}</th>
                    <td>{{$record->first_name}} {{$record->last_name}}</td>
                    <td>{{ substr_replace(substr_replace($record->contact, '-', 4, 0), '-', 8, 0) }}</td>
                    <td style="text-transform: capitalize">{{$record->car_make}}</td>
                    <td style="text-transform: capitalize">{{$record->car_model}}</td>
                    <td>{{$record->body_type}}</td>
                    <td style="text-transform: uppercase">{{$record->unit_plate_no}}</td>
                    <td>{{$record->special_request ?? 'no special request' }}</td>
                    <td>{{ strtoupper(\Carbon\Carbon::parse($record->date)->format('F-d-Y')) }}</td>
                    <td>₱{{ $record->amount}}</td>
                  </tr>
                   @endforeach
              </tbody>
            </table>
            <div class="d-flex justify-content-center">
              {{ $records->links() }}
            </div>
          </div>
          @endif
        </div>
      </div><!-- End Recent Sales -->
    </section>

  </main><!-- End #main -->
</x-system-layout>
