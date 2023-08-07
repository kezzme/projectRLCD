<x-system-layout>

<main id="main" class="main">

    <div class="pagetitle">
      <h1>Paint Job Records</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item">Home</li>
          <li class="breadcrumb-item">Paint Job</li>
          <li class="breadcrumb-item active">Records</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="col-12">
        <div class="card recent-sales overflow-auto rounded-5">

          <div class="card-body">
            <h5 class="card-title card-header">Client Records</h5>
            @if ($paintjob_records->isEmpty())
            <p>No Listings</p>
          @else
            <table id="dtHorizontalExample" class="table table-condensed table-hover" cellspacing="0" width="100%" >
              <thead class="table-success">
                <tr>
                  <th scope="col" class="align-middle">ID</th>
                  <th scope="col" class="align-middle">Name</th>
                  <th scope="col" class="align-middle">Phone</th>
                  <th scope="col" class="align-middle">Year</th>
                  <th scope="col" class="align-middle">Make</th>
                  <th scope="col" class="align-middle">Model</th>
                  <th scope="col" class="align-middle">Variant</th>
                  <th scope="col" class="align-middle">Plate No.</th>
                  <th scope="col" class="align-middle">Appointed Date</th>
                  <th scope="col" class="align-middle">Number of Panel</th>
                  <th scope="col" class="align-middle">Panel Price</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($paintjob_records as $records)
                  <tr>
                    <th scope="row">{{$records->user_id}}</th>
                    <td>{{$records->first_name}} {{$records->last_name}}</td>
                    <td>{{ substr_replace(substr_replace($records->contact, '-', 4, 0), '-', 8, 0) }}</td>
                    <td>{{$records->car_year}}</td>
                    <td style="text-transform: capitalize">{{$records->car_make}}</td>
                    <td style="text-transform: capitalize">{{$records->car_model}}</td>
                    <td style="text-transform: uppercase">{{$records->car_variant}}</td>
                    <td style="text-transform: uppercase">{{$records->unit_plate_no}}</td>
                    <td>{{ strtoupper(\Carbon\Carbon::parse($records->date)->format('F-d-Y')) }}</td>
                  </tr>
               @endforeach
              </tbody>
            </table>
            <div class="d-flex justify-content-center">
              {{ $paintjob_records->links() }}
            </div>
          </div>

        </div>
      </div><!-- End Recent Sales -->
    </section>

  </main><!-- End #main -->
</x-system-layout>