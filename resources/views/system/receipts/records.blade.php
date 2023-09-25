<x-system-layout>

<main id="main" class="main">
  <div class="row g-3" >
    <div class="pagetitle col-md-5">
          <h1>Records</h1>
            <nav>
                <ol class="breadcrumb">
                  <li class="breadcrumb-item">Home</li>
                  <li class="breadcrumb-item">Receipts</li>
                  <li class="breadcrumb-item active">Records</li>
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
      <div class="col-12">
        <div class="card recent-sales overflow-auto rounded-5">
          <div class="card-body table-responsive">
            <h5 class="card-title card-header">Client Records</h5>
            @if ($acknowledgment_receipt->isEmpty())
            <p>No Listings</p>
          @else
            <table id="dtHorizontalExample" class="table table-condensed table-hover" cellspacing="0" width="100%" >
              <thead class="table-success">
                <tr>
                    <th scope="col">TXN No.</th>
                    <th scope="col">Name</th>
                    <th scope="col">Contact</th>
                    <th scope="col">Year</th>
                    <th scope="col">Make</th>
                    <th scope="col">Model</th>
                    <th scope="col">Variant</th>
                    <th scope="col">Exterior Color</th>
                    <th scope="col">Car Price</th>
                    <th scope="col">Plate No.</th>
                    <th scope="col">Agreed Price</th>
                    <th scope="col">Balance</th>
                    <th scope="col">Deposit</th>
                    <th scope="col">Date</th>
                    {{-- <th scope="col">Required Documents</th> --}}
                    <th scope="col">Due Date</th>
                    <th scope="col">Received By</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($acknowledgment_receipt as $records)
                  <tr>
                    <th scope="row">{{$records->TNX_No}}</th>
                    <td>{{$records->first_name}} {{$records->last_name}}</td>
                    <td>{{ substr_replace(substr_replace($records->contact, ' ', 4, 0), ' ', 8, 0) }}</td>      
                    <td>{{$records->car_year}}</td>
                    <td>{{$records->car_make}}</td>
                    <td>{{$records->car_model}}</td>
                    <td>{{$records->car_variant}}</td>
                    <td>{{$records->exterior_color}}</td>
                    <td>₱{{ number_format($records->car_price, 0, '.', ',') }}</td>
                    <td>{{$records->car_plate_no}}</td>
                    <td>₱{{ number_format($records->agreed_price, 0, '.', ',') }}</td>
                    <td>₱{{ number_format($records->balance, 0, '.', ',' ?? 0) }}</td>
                    <td>₱{{ number_format($records->deposit, 0, '.', ',' ?? 0) }}</td>
                    <td>{{ strtoupper(\Carbon\Carbon::parse($records->date)->format('F d, Y')) }}</td>
                    <td>
                      @if ($records->due_date)
                      {{ strtoupper(\Carbon\Carbon::parse($records->due_date)->format('F d, Y')) }}
                      @else
                      <div class="text-center">n/a</div>
                      @endif
                    </td>
                    {{-- <td>
                      @if ($records->checkboxes === null)
                      No Documents Submitted
                  @elseif (is_array(json_decode($records->checkboxes)))
                      @foreach (json_decode($records->checkboxes) as $checkbox)
                          {{ $checkbox }}<br>
                      @endforeach
                  @endif
                    </td> --}}
                    
                    <td>{{$records->client_name}}</td>
                  </tr>
                  @endforeach
              </tbody>
            </table>
            <div class="d-flex justify-content-center">
              {{ $acknowledgment_receipt->links() }}
            </div>
            </div>
            @endif
          </div>
        </div>
      </div><!-- End Recent Sales -->
    </section>

  </main><!-- End #main -->
</x-system-layout>