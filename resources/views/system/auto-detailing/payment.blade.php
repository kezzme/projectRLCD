<x-system-layout>

<main id="main" class="main">

<div class="pagetitle">
 
  <h1>Auto Detailing Payment</h1>
  
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item">Home</li>
      <li class="breadcrumb-item">Auto Detailing</li>
      <li class="breadcrumb-item active">Payment</li>
    </ol>
  </nav>
</div><!-- End Page Title -->

<section class="section">
  <div class="col-12">
    <div class="card recent-sales overflow-auto rounded-5">
      
      <div class="card-body table-responsive">
        <h5 class="card-title card-header">Client List</h5>
        @if ($payments->isEmpty())
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
              <th scope="col" class="align-middle">Special Request</th>
              <th scope="col" class="align-middle">Appointed Date</th>
              <th scope="col" class="align-middle">Time</th>
              <th scope="col" class="align-middle">Amount</th>
              <th scope="col" colspan="2" class="align-middle text-center">Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($payments as $payment)
            <tr>
              <th scope="row">{{$payment->user_id}}</th>
              <td>{{$payment->first_name}} {{$payment->last_name}}</td>
              <td>{{ substr_replace(substr_replace($payment->contact, '-', 4, 0), '-', 8, 0) }}</td>
              <td>{{$payment->car_year}}</td>
              <td style="text-transform: capitalize">{{$payment->car_make}}</td>
              <td style="text-transform: capitalize">{{$payment->car_model}}</td>
              <td style="text-transform: uppercase">{{$payment->car_variant}}</td>
              <td style="text-transform: uppercase">{{$payment->unit_plate_no}}</td>
              <td>{{$payment->special_request ?? 'no special request'}}</td>
              <td>{{ strtoupper(\Carbon\Carbon::parse($payment->date)->format('F-d-Y')) }}</td>
              <td>{{$payment->time}}</td>
              <td>
                <form id="confirmForm_{{$payment->id}}" action="{{ route('system.auto_detailing.toRecords', ['id' => $payment->id]) }}" method="POST">
                    @csrf
                    <div class="input-group">
                        <div class="input-group-text">₱</div>
                        <input class="form-control totalPrice" name="amount" id="totalPrice_{{$payment->id}}" type="text" >
                    </div>
                  </td>
                  <td class="text-center">
                      <button type="button" class="btn btn-danger" onclick="showConfirmationModal('Void', {{$payment->id}})"><i class="fa-solid fa-user-xmark"></i></button>
                      <button type="button" class="btn btn-success" onclick="showConfirmationModal('Confirm', {{$payment->id}})"><i class="fa-solid fa-user-check"></i></button>
                      <button type="submit" class="btn btn-primary" style="display: none;">Confirm</button>
                      </form>
                  </td>
              </tr>
          @endforeach
          </tbody>
        </table>
        <div class="d-flex justify-content-center">
          {{ $payments->links() }}
        </div>
      </div>
      @endif
    </div>
  </div><!-- End Recent Sales -->
</section>

</main><!-- End #main -->


<!-- Modal for Confirmation -->
<div class="modal fade" id="confirmationModal" tabindex="-1" role="dialog" aria-labelledby="confirmationModalLabel" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered">
  <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title" id="confirmationModalLabel">Confirmation</h5>
      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <div class="modal-body">
      Are you sure you want to <span id="actionType"></span> this payment?
    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      <button type="button" class="btn btn-primary" id="confirmAction">Confirm</button>
    </div>
  </div>
</div>
</div>

<!-- Modal for Amount -->
  <div class="modal fade" id="amountModal" tabindex="-1" role="dialog" aria-labelledby="amountModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="amountModalLabel">Error</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          Please enter the amount before confirming.
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" data-bs-dismiss="modal">OK</button>
        </div>
      </div>
    </div>
  </div>

@if(session('success'))
<div class="position-fixed bottom-0 end-0 w-40 mx-3 mb-3">
  <div class="alert alert-success alert-dismissible fade show" role="alert">
      <i class="fa-solid fa-circle-check"></i> {{ session('success') }}
      <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
  </div>
</div>
@endif

</x-system-layout>


<script>
  var totalPrices = document.querySelectorAll(".totalPrice");
  totalPrices.forEach(function(totalPriceInput) {
    totalPriceInput.addEventListener("input", function() {
      totalPriceInput.value = formatNumber(this.value.replace(/[^0-9.]/g, ""));
    });
  });

  function formatNumber(number) {
    return number.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
  }

  function showConfirmationModal(action, id) {
    // Get the form element
    const form = document.getElementById(`confirmForm_${id}`);

    // Set the action type in the confirmation modal
    document.getElementById('actionType').innerText = action;

    // Update the form action based on the selected action
    const formAction = action === 'Confirm'
        ? "{{ route('system.auto_detailing.toRecords', ['id' => ':id']) }}".replace(':id', id)
        : "{{ route('system.auto_detailing.phase_2', ['id' => ':id']) }}".replace(':id', id);
    form.action = formAction;

    // Check if the action is 'Void'
    if (action === 'Void') {
      // Show the confirmation modal directly for 'Void' action
      $('#confirmationModal').modal('show');
    } else {
      // If not 'Void', proceed with checking the amount value
      const amountInput = form.querySelector('input[name="amount"]');
      const amountValue = amountInput.value.replace(/[^0-9.]/g, "");

      // Check if the amount is null or empty
      if (!amountValue) {
        // Show the modal if the amount is null
        $('#amountModal').modal('show');
        return; // Stop further processing
      }

      // Show the confirmation modal for other actions (Confirm)
      $('#confirmationModal').modal('show');
    }

    // Set up a click event listener on the "Confirm" button in the modal
    $('#confirmAction').off('click').on('click', function () {
        // Submit the form
        form.submit();

        // Close the modal
        $('#confirmationModal').modal('hide');
    });
  }

  $(document).ready(function() {
    setTimeout(function() {
      $(".alert").alert('close');
    }, 3000);
  });
</script>
