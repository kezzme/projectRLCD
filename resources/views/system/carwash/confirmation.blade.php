<x-system-layout>

<main id="main" class="main">

<div class="pagetitle">
  <h1>Car Wash</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item">Home</li>
      <li class="breadcrumb-item">Car Wash</li>
      <li class="breadcrumb-item active">Confirmation</li>
    </ol>
  </nav>
</div><!-- End Page Title -->

<section class="section">
  <div class="col-12">
    <div class="card recent-sales overflow-auto rounded-5">

      <div class="card-body table-responsive">
        <h5 class="card-title card-header">Client List</h5>
        @if ($carwashes->isEmpty())
            <p>No Listings</p>
          @else
        <table id="dtHorizontalExample" class="table table-condensed table-hover" cellspacing="0" width="100%" >
          <thead class="table-success">
            <tr>
              <th scope="col">ID</th>
              <th scope="col">Name</th>
              <th scope="col">Phone</th>
              <th scope="col">Make</th>
              <th scope="col">Model</th>
              <th scope="col">Body Type</th>
              <th scope="col">Plate No.</th>
              <th scope="col">Amount</th>
              <th scope="col">Appointed Date</th>
              <th scope="col">Time</th>
              <th scope="col">Special Request</th>
              <th scope="col" class="text-center">Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($carwashes as $carwash)
            <tr>
              <th scope="row"><a href="#">{{$carwash->id}}</a></th>
              <td>{{$carwash->first_name}} {{$carwash->last_name}}</td>
              <td>{{ substr_replace(substr_replace($carwash->contact, '-', 4, 0), '-', 8, 0) }}</td>
              <td style="text-transform: capitalize">{{$carwash->car_make}}</td>
              <td style="text-transform: capitalize">{{$carwash->car_model}}</td>
              <td>{{$carwash->body_type}}</td>
              <td style="text-transform: uppercase">{{$carwash->unit_plate_no}}</td>
              <td>₱{{ $carwash->amount}}</td>
              <td>{{ strtoupper(\Carbon\Carbon::parse($carwash->date)->format('F-d-Y')) }}</td>
              <td>{{$carwash->time}}</td>
              <td>{{$carwash->special_request ?? 'no special request'}}</td></td>
              <td class="text-center"> 
                <button type="button" class="btn btn-danger" onclick="showConfirmationModal('Void', {{$carwash->id}})"><i class="fa-solid fa-user-xmark"></i></button>
                <button type="button" class="btn btn-success" onclick="showConfirmationModal('Checkout', {{$carwash->id}})"><i class="fa-solid fa-user-check"></i></button>
                <form id="confirmForm_{{$carwash->id}}" action="" method="POST" style="display: none;">
                    @csrf
                    @method('POST')
                </form>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
        <div class="d-flex justify-content-center">
          {{ $carwashes->links() }}
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
        Are you sure you want to <span class="font-weight-bold" id="actionType"></span> this book?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="confirmAction">Confirm</button>
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
    function showConfirmationModal(action, id) {
      // Get the form element
      const form = document.getElementById(`confirmForm_${id}`);
  
      // Set the action type in the confirmation modal
      document.getElementById('actionType').innerText = action;
  
      // Update the form action based on the selected action
      const formAction = action === 'Checkout'
          ? "{{ route('system.carwash.toRecords', ['id' => ':id']) }}".replace(':id', id)
          : "{{ route('system.carwash.void', ['id' => ':id']) }}".replace(':id', id);
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


      $(document).ready(function() {
          setTimeout(function() {
              $(".alert").fadeOut('slow', function() {
                  $(this).remove();
              });
          }, 3000);
      });
  </script>