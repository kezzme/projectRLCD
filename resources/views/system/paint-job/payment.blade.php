<x-system-layout>

<main id="main" class="main">
  <div class="row g-3" >
    <div class="pagetitle col-md-5">
          <h1>Payment</h1>
            <nav>
                <ol class="breadcrumb">
                  <li class="breadcrumb-item">Home</li>
                  <li class="breadcrumb-item">Paint Job</li>
                  <li class="breadcrumb-item active">Payment</li>
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
        <h5 class="card-title card-header">Client List</h5>
        @if ($paintjob_payments->isEmpty())
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
              <th scope="col" class="align-middle">Number of Panel</th>
              <th scope="col" class="align-middle">Panel Price</th>
              <th scope="col" colspan="2" class="align-middle text-center">Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($paintjob_payments as $payment)
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
                <form id="confirmForm_{{$payment->id}}" action="{{ route('system.paintjob.toRecords', ['id' => $payment->id]) }}" method="POST">
                    @csrf
                    <select class="form-select w-100 dropdownList" name="panel">
                        <option value="1 Panel" data-price="2500">1 Panel</option>
                          <option value="2 Panel" data-price="5000">2 Panel</option>
                          <option value="3 Panel" data-price="7500">3 Panel</option>
                          <option value="4 Panel" data-price="10000">4 Panel</option>
                          <option value="5 Panel" data-price="12500">5 Panel</option>
                          <option value="6 Panel" data-price="15000">6 Panel</option>
                          <option value="7 Panel" data-price="17500">7 Panel</option>
                          <option value="8 Panel" data-price="20000">8 Panel</option>
                          <option value="9 Panel" data-price="22500">9 Panel</option>
                      </select>
                  </td>
                  <td>
                    <input type="text" class="form-control outputInput totalPrice_{{$payment->id}}" name="amount" value="2,500" readonly>
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
          {{ $paintjob_payments->links() }}
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
          Please select panel before confirming.
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

  const dropdownLists = document.querySelectorAll(".dropdownList");
  const outputInputs = document.querySelectorAll(".outputInput");

  // Add event listener to each dropdown list
  dropdownLists.forEach(function (dropdownList, index) {
    dropdownList.addEventListener("change", function () {
      updatePrice(index); // Pass the index of the selected row to the function
    });
  });

  // Function to update the price input field with the selected option's price
  function updatePrice(rowIndex) {
    const selectedOption = dropdownLists[rowIndex].options[dropdownLists[rowIndex].selectedIndex].value;
    const selectedPrice = dropdownLists[rowIndex].options[dropdownLists[rowIndex].selectedIndex].dataset.price;
    outputInputs[rowIndex].value = formatNumber(selectedPrice);
  }

  function showConfirmationModal(action, id) {
    // Get the form element
    const form = document.getElementById(`confirmForm_${id}`);

    // Get the select element for financing_bank
    const financingBankSelect = form.querySelector('select[name="financing_bank"]');

    // Set the action type in the confirmation modal
    document.getElementById('actionType').innerText = action;

    // Update the form action based on the selected action
    const formAction =
      action === 'Confirm'
        ? `{{ route('system.paintjob.toRecords', ['id' => ':id']) }}`.replace(':id', id)
        : `{{ route('system.paintjob.phase_2', ['id' => ':id']) }}`.replace(':id', id);
    form.action = formAction;

    // Show the confirmation modal
    $('#confirmationModal').modal('show');

    // Set up a click event listener on the "Confirm" button in the modal
    $('#confirmAction').off('click').on('click', function () {
      // Submit the form
      form.submit();

      // Close the modal
      $('#confirmationModal').modal('hide');
    });
  }

  $(document).ready(function () {
    setTimeout(function () {
      $(".alert").fadeOut('slow', function () {
        $(this).remove();
      });
    }, 3000);
  });
</script>