<x-system-layout>

<main id="main" class="main">
  <div class="row g-3" >
    <div class="pagetitle col-md-5">
          <h1>Appointment</h1>
            <nav>
                <ol class="breadcrumb">
                <li class="breadcrumb-item">Home</li>
                  <li class="breadcrumb-item active">Appointment</li>
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
              <h5 class="card-title card-header">Client Confirmation</h5>
              @if ($appointments->isEmpty())
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
                  <th scope="col" class="align-middle">Void</th>
                  <th scope="col" class="align-middle">Receipt</th>
                </tr>
              </thead>
              <tbody>
                
                @foreach ($appointments as $app)
                 <tr id="row_{{ $app->id }}">
                  <th scope="row"><a href="#">{{$app->user_id}}</a></th>
                  <td>{{$app->first_name}} {{$app->last_name}}</td>
                  <td>{{$app->contact}}</td>
                  <td>{{$app->car_year}}</td>
                  <td>{{$app->car_make}}</td>
                  <td>{{$app->car_model}}</td>
                  <td>{{$app->car_variant}}</td>
                  <td>{{$app->car_plate_no}}</td>
                  <td>₱{{ number_format($app->car_price, 0, '.', ',') }}</td>
                  <td>{{$app->date}}</td>
                  <td>{{$app->time}}</td>
                  <form action="{{ route('system.appointments.toVoid', ['id' => $app->id]) }}" method="POST">
                  @csrf
                  <td><button type="button" class="btn btn-danger" onclick="showVoid(this.form)"><i class="fa-solid fa-user-xmark"></i></button></td>
                </form>
                <form action="{{ route('system.appointments.toReceipt', ['id' => $app->id]) }}" method="POST">
                  @csrf
                  <td class="text-center"><button type="button" class="btn btn-success" onclick="showCashModal(this.form)"><i class="fa-solid fa-file-circle-plus"></i></button></td>
                </form>
                </tr>
                @endforeach
              </tbody>
            </table>
            <div class="d-flex justify-content-center">
              {{ $appointments->links() }}
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
              Are you sure you want to make a receipt?
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
            Are you sure you want to mark it as Void?
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

  function showVoid(form) {
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