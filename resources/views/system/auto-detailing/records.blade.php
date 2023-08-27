<x-system-layout>

<main id="main" class="main">

<div class="pagetitle">
 
  <h1>Auto Detailing Records</h1>
  
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item">Home</li>
      <li class="breadcrumb-item">Auto Detailing</li>
      <li class="breadcrumb-item active">Records</li>
    </ol>
  </nav>
</div><!-- End Page Title -->

<section class="section">
  <div class="col-12">
    <div class="card recent-sales overflow-auto rounded-5">
      
      <div class="card-body table-responsive">
        <h5 class="card-title card-header">Client Records</h5>
        @if ($auto_detailing_records->isEmpty())
        <p>No Listings</p>
      @else
        <table id="dtHorizontalExample" class="table table-condensed table-hover" cellspacing="0" width="100%" >
          <thead class="table-success">
            <tr>
              <th scope="col" class="align-middle">TNX No</th>
              <th scope="col" class="align-middle">Name</th>
              <th scope="col" class="align-middle">Phone</th>
              <th scope="col" class="align-middle">Year</th>
              <th scope="col" class="align-middle">Make</th>
              <th scope="col" class="align-middle">Model</th>
              <th scope="col" class="align-middle">Variant</th>
              <th scope="col" class="align-middle">Plate No.</th>
              <th scope="col" class="align-middle">Appointed Date</th>
              <th scope="col" class="align-middle">Amount</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($auto_detailing_records as $records)
            <tr>
              <th scope="row">{{$records->TNX_No3}}</th>
              <td>{{$records->first_name}} {{$records->last_name}}</td>
              <td>{{ substr_replace(substr_replace($records->contact, '-', 4, 0), '-', 8, 0) }}</td>
              <td>{{$records->car_year}}</td>
              <td style="text-transform: capitalize">{{$records->car_make}}</td>
              <td style="text-transform: capitalize">{{$records->car_model}}</td>
              <td style="text-transform: uppercase">{{$records->car_variant}}</td>
              <td style="text-transform: uppercase">{{$records->unit_plate_no}}</td>
              <td>{{ strtoupper(\Carbon\Carbon::parse($records->date)->format('F-d-Y')) }}</td>
              <td>₱{{ number_format($records->amount, 0, '.', ',') }}</td>
            </tr>
            @endforeach
          </tbody>
        </table>
        <div class="d-flex justify-content-center">
          {{ $auto_detailing_records->links() }}
        </div>
      </div>
      @endif
    </div>
  </div><!-- End Recent Sales -->

</section>

</main><!-- End #main -->
</x-system-layout>
