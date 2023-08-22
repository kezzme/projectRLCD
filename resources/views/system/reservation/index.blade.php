<x-system-layout>

    <main id="main" class="main">
    
        <div class="pagetitle">
          <h1>Appointment</h1>
          <nav>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="index.html">Home</a></li>
              <li class="breadcrumb-item active">Appointment</li>
            </ol>
          </nav>
        </div><!-- End Page Title -->
    
        <section class="section">
          <div class="col-12">
            <div class="card recent-sales overflow-auto rounded-5">
    
            <div class="card-body table-responsive">
                <h5 class="card-title card-header">Client Confirmation</h5>
                @if ($reservation->isEmpty())
                <p>No Listings</p>
              @else
             
                <table id="soldUnitsTable" class="table table-condensed table-hover" cellspacing="0" width="100%" >
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
                      <th scope="col" class="align-middle">Price</th>
                      <th scope="col" class="align-middle">Date</th>
                      <th scope="col" class="align-middle">Time</th>
                      <th colspan="2" style="text-align: center;" class="align-middle">Transaction Type</th>
                    </tr>
                  </thead>
                  <tbody>
                    
                    @foreach ($reservation as $reserve)
                     <tr id="row_{{ $reserve->id }}">
                      <th scope="row"><a href="#">{{$reserve->user_id}}</a></th>
                      <td>{{$reserve->first_name}} {{$reserve->last_name}}</td>
                      <td>{{$reserve->contact}}</td>
                      <td>{{$reserve->car_year}}</td>
                      <td>{{$reserve->car_make}}</td>
                      <td>{{$reserve->car_model}}</td>
                      <td>{{$reserve->car_variant}}</td>
                      <td>{{$reserve->car_plate_no}}</td>
                      <td>₱{{ number_format($reserve->car_price, 0, '.', ',') }}</td>
                      <td>{{$reserve->date}}</td>
                      <td>{{$reserve->time}}</td>
                      <form action="{{ route('system.appointments.toSoldunits', ['id' => $reserve->id]) }}" method="POST">
                      @csrf
                      <td><button type="button" class="btn btn-danger" onclick="showCashModal(this.form)">Cash</button></td>
                    </form>
                    <form action="{{ route('system.appointments.toFinancing', ['id' => $reserve->id]) }}" method="POST">
                      @csrf
                      <td><button type="button" class="btn btn-success" onclick="showFinancingModal(this.form)">Financing</button></td>
                    </form>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
                <div class="d-flex justify-content-center">
                  {{ $reservation->links() }}
                </div>
              </div>
              @endif
    
            </div>
          </div><!-- End Recent Sales -->
        </section>
      </main><!-- End #main -->
    
    
      <div class="modal fade" id="confirmationCashModal" tabindex="-1" role="dialog" aria-labelledby="confirmationCashModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="confirmationCashModalLabel">Confirmation</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                  Are you sure you want to mark it as Sold Unit?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="confirmCashAction">Confirm</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="confirmationFinancingModal" tabindex="-1" role="dialog" aria-labelledby="confirmationFinancingModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="confirmationFinancingModalLabel">Confirmation</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
              </div>
              <div class="modal-body">
                Are you sure you want to mark it as Financed Unit?
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
      function showCashModal(form) {
        // Show the confirmation modal
        $('#confirmationCashModal').modal('show');
    
        // Set up a click event listener on the "Confirm" button in the modal
        $('#confirmCashAction').click(function() {
          // Submit the form after the action is confirmed
          form.submit();
    
          // Close the modal
          $('#confirmationCashModal').modal('hide');
        });
      }
    
      function showFinancingModal(form) {
        // Show the confirmation modal
        $('#confirmationFinancingModal').modal('show');
    
        // Set up a click event listener on the "Confirm" button in the modal
        $('#confirmFinancingAction').click(function() {
          // Submit the form after the action is confirmed
          form.submit();
    
          // Close the modal
          $('#confirmationFinancingModal').modal('hide');
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