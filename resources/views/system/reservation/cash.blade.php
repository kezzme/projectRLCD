<x-system-layout>

    <main id="main" class="main">
    
        <div class="pagetitle">
          <h1>Reservation</h1>
          <nav>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="index.html">Home</a></li>
              <li class="breadcrumb-item active">Reservation</li>
            </ol>
          </nav>
        </div><!-- End Page Title -->
    
        <section class="section">
          <div class="col-12">
            <div class="card recent-sales overflow-auto rounded-5">
    
            <div class="card-body table-responsive">
                <h5 class="card-title card-header">Client List</h5>
                @if ($resCash->isEmpty())
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
                    
                    @foreach ($resCash as $cash)
                     <tr id="row_{{ $cash->id }}">
                      <th scope="row">{{$cash->user_id}}</th>
                      <td>{{$cash->first_name}} {{$cash->last_name}}</td>
                      <td>{{ substr_replace(substr_replace($cash->contact, '-', 4, 0), '-', 8, 0) }}</td>
                      <td>{{$cash->car_year}}</td>
                      <td>{{$cash->car_make}}</td>
                      <td>{{$cash->car_model}}</td>
                      <td>{{$cash->car_variant}}</td>
                      <td>₱{{ number_format($cash->deposit, 0, '.', ',') }}</td>
                      <td>₱{{ number_format($cash->balance, 0, '.', ',') }}</td>
                      <td>₱{{ number_format($cash->agreed_price, 0, '.', ',') }}</td>
                      <td>{{ strtoupper(\Carbon\Carbon::parse($cash->date)->format('F d, Y')) }}</td>
                      <td>{{ strtoupper(\Carbon\Carbon::parse($cash->due_date)->format('F d, Y')) }}</td>
                      <form action="{{ route('system.reservations.cashVoid', ['id' => $cash->id]) }}" method="POST">
                      @csrf
                      <td><button type="button" class="btn btn-danger" onclick="showVoidModal(this.form)"><i class="fa-solid fa-calendar-xmark"></i></button></td>
                    </form>
                    <form action="{{ route('system.reservations.cashReceipt', ['id' => $cash->id]) }}" method="POST">
                      @csrf
                      <td><button type="button" class="btn btn-success" onclick="showReceiptModal(this.form)"><i class="fa-solid fa-file-circle-plus"></i></button></td>
                    </form>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
                <div class="d-flex justify-content-center">
                  {{ $resCash->links() }}
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
                  Are you sure you want to mark it as Void?
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
        // Show the confirmation modal
        $('#voidReservationModal').modal('show');
    
        // Set up a click event listener on the "Confirm" button in the modal
        $('#confirmCashAction').click(function() {
          // Submit the form after the action is confirmed
          form.submit();
    
          // Close the modal
          $('#voidReservationModal').modal('hide');
        });
      }
    
      function showReceiptModal(form) {
        // Show the confirmation modal
        $('#toReceiptModal').modal('show');
    
        // Set up a click event listener on the "Confirm" button in the modal
        $('#confirmFinancingAction').click(function() {
          // Submit the form after the action is confirmed
          form.submit();
    
          // Close the modal
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