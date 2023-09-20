<x-system-layout>

    <main id="main" class="main">
    
        <div class="pagetitle col-md-12">
          <h1>Reservation</h1>
          <nav class="col-md-4">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="index.html">Home</a></li>
              <li class="breadcrumb-item active">Reservation</li>
            </ol>
          </nav>
          <div class="input-group col-md-8">
            <input type="text" class="form-control" id="searchInput" placeholder="Enter keywords...">
            <button type="button" class="btn btn-primary" id="searchButton">Search</button>
          
          </div>
          
        </div><!-- End Page Title -->
    
        <section class="section">
          <div class="col-12">
            <div class="card recent-sales overflow-auto rounded-5">
    
            <div class="card-body table-responsive">
                <h5 class="card-title card-header">Client List</h5>
                @if ($resFinancing->isEmpty())
                <p>No Listings</p>
              @else
             
                <table id="soldUnitsTable" class="table table-condensed table-hover" cellspacing="0" width="100%" >
                  <thead class="table-success">
                    <tr>
                      <th scope="col" class="align-middle">Client ID</th>
                      <th scope="col" class="align-middle">Name</th>
                      <th scope="col" class="align-middle">Phone</th>
                      <th scope="col" class="align-middle">Year</th>
                      <th scope="col" class="align-middle">Make</th>
                      <th scope="col" class="align-middle">Model</th>
                      <th scope="col" class="align-middle">Variant</th>
                      <th scope="col" class="align-middle">Deposit</th>
                      <th scope="col" class="align-middle">Balance</th>
                      <th scope="col" class="align-middle">Agreed Price</th>
                      <th scope="col" class="align-middle">Date Issued</th>
                      <th scope="col" class="align-middle">Due Date</th>
                      <th colspan="2" style="text-align: center;" class="align-middle">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    
                    @foreach ($resFinancing as $financing)
                     <tr id="row_{{ $financing->id }}">
                      <th scope="row">{{$financing->user_id}}</th>
                      <td>{{$financing->first_name}} {{$financing->last_name}}</td>
                      <td>{{ substr_replace(substr_replace($financing->contact, '-', 4, 0), '-', 8, 0) }}</td>
                      <td>{{$financing->car_year}}</td>
                      <td>{{$financing->car_make}}</td>
                      <td>{{$financing->car_model}}</td>
                      <td>{{$financing->car_variant}}</td>
                      <td>₱{{ number_format($financing->deposit, 0, '.', ',') }}</td>
                      <td>₱{{ number_format($financing->balance, 0, '.', ',') }}</td>
                      <td>₱{{ number_format($financing->agreed_price, 0, '.', ',') }}</td>
                      <td>{{ strtoupper(\Carbon\Carbon::parse($financing->date)->format('F d, Y')) }}</td>
                      <td>{{ strtoupper(\Carbon\Carbon::parse($financing->due_date)->format('F d, Y')) }}</td>
                      {{-- <form action="{{ route('system.reservations.toSoldunits', ['id' => $financing->id]) }}" method="POST"> --}}
                      @csrf
                      <td><button type="button" class="btn btn-danger" onclick="showVoidModal(this.form)"><i class="fa-solid fa-user-xmark"></i></button></td>
                    </form>
                    {{-- <form action="{{ route('system.reservations.toresReceipt', ['id' => $financing->id]) }}" method="POST"> --}}
                      @csrf
                      <td><button type="button" class="btn btn-success" onclick="showReceiptModal(this.form)"><i class="fa-solid fa-file-circle-plus"></i></button></td>
                    </form>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
                <div class="d-flex justify-content-center">
                  {{ $resFinancing->links() }}
                </div>
              </div>
              @endif
    
            </div>
          </div><!-- End Recent Sales -->
        </section>
      </main><!-- End #main -->
    
    
      <div class="modal fade" id="voidReservationModal" tabindex="-1" role="dialog" aria-labelledby="voidReservationModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="voidReservationModalLabel">Confirmation</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                  Are you sure you want to mark it as <strong>Rejected</strong>?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="confirmCashAction">Confirm</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="toReceiptModal" tabindex="-1" role="dialog" aria-labelledby="toReceiptModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="toReceiptModalLabel">Confirmation</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
              </div>
              <div class="modal-body">
                Are you sure you want to make a Receipt?
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  <button type="button" class="btn btn-primary" id="confirmFinancingAction">Confirm</button>
              </div>
          </div>
      </div>
    </div>
    
    
    @if(session('success'))
    <div class="position-fixed bottom-0 end-0 w-40 mx-3 mb-3">
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          <i class="fa-solid fa-circle-check"></i> {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            </button>
        </div>
    </div>
    @endif
    
    
    
    </x-system-layout>
    
    <script>
      function showVoidModal(form) {
        $('#voidReservationModal').modal('show');
        $('#confirmCashAction').click(function() {
          form.submit();
          $('#voidReservationModal').modal('hide');
        });
      }
    
      function showReceiptModal(form) {
        $('#toReceiptModal').modal('show');
        $('#confirmFinancingAction').click(function() {
          form.submit();
          $('#toReceiptModal').modal('hide');
        });
      }

      
    
      $(document).ready(function() {
          setTimeout(function() {
              $(".alert").fadeOut('slow', function() {
                  $(this).remove();
              });
          }, 3000);
      });
    </script>