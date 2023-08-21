<x-system-layout>

<main id="main" class="main">

    <div class="pagetitle">
      <h1>Financing Confirmation</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Financing</li>
          <li class="breadcrumb-item active">Confirmation</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
        
     <!-- Recent Sales -->
     <div class="col-12">
        <div class="card recent-sales overflow-auto rounded-5">

          <div class="card-body table-responsive">
            <h5 class="card-title card-header">Client List</h5>
            @if ($financing_confirmations->isEmpty())
            <p>No Listings</p>
          @else
           
            <table id="dtHorizontalExample" class="table table-condensed table-hover" cellspacing="0" width="100%" >
              <thead class="table-success">
                <tr>
                  <th scope="col">ID</th>
                  <th scope="col">Name</th>
                  <th scope="col">Phone</th>
                  <th scope="col">Year</th>
                  <th scope="col">Make</th>
                  <th scope="col">Model</th>
                  <th scope="col">Variant</th>
                  <th scope="col">Price</th>
                  <th scope="col">Date</th>
                  <th scope="col">Financing Bank</th>
                  <th colspan="2" style="text-align: center;" class="align-middle">Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($financing_confirmations as $finCon)
                <tr>
                    <th scope="row"><a href="#">{{$finCon->user_id}}</a></th>
                    <td>{{$finCon->first_name}} {{$finCon->last_name}}</td>
                    <td>{{ substr_replace(substr_replace($finCon->contact, '-', 4, 0), '-', 8, 0) }}</td>
                    <td>{{$finCon->car_year}}</td>
                    <td>{{$finCon->car_make}}</td>
                    <td>{{$finCon->car_model}}</td>
                    <td>{{$finCon->car_variant}}</td>
                    <td>₱{{ number_format($finCon->car_price, 0, '.', ',') }}</td>
                    <td>{{ strtoupper(\Carbon\Carbon::parse($finCon->date)->format('F-d-Y')) }}</td>
                    <td>
                      <form id="confirmForm_{{$finCon->id}}" action="{{ route('system.financing.toStatus', ['id' => $finCon->id]) }}" method="POST">
                          @csrf
                          <select name="financing_bank" class="form-select" aria-label="Default select example">
                              <option value="JACCS" selected>JACCS</option>
                              <option value="Global Domination">Global Domination</option>
                              <option value="Primary">Primary</option>
                              <option value="Asialink">Asialink</option>
                          </select>
                          <input type="hidden" name="status" value="">
                          <td>
                            <button type="button" class="btn btn-danger" onclick="showConfirmationModal('Void', {{$finCon->id}})"><i class="fa-solid fa-user-xmark"></i></button>
                            <button type="button" class="btn btn-success" onclick="showConfirmationModal('Confirm', {{$finCon->id}})"><i class="fa-solid fa-user-check"></i></button>
                            <button type="submit" class="btn btn-primary" style="display: none;">Confirm</button>
                        </td>
                        </form>
                  </td>
              </tr>
              @endforeach
              </tbody>
            </table>
            <div class="d-flex justify-content-center">
              {{ $financing_confirmations->links() }}
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
        Are you sure you want to mark it as <span id="actionType"></span>?
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
  
      // Get the select element for financing_bank
      const financingBankSelect = form.querySelector('select[name="financing_bank"]');
  
      // Set the action type in the confirmation modal
      document.getElementById('actionType').innerText = action;
  
      // Update the value of the hidden input field 'status'
      form.querySelector('input[name="status"]').value = action === 'Reject' ? 'Rejected' : 'Approved';
  
      // Update the form action based on the selected action
      const formAction = action === 'Approve'
          ? "{{ route('system.financing.toSold', ['id' => ':id']) }}".replace(':id', id)
          : "{{ route('system.financing.toStatus', ['id' => ':id']) }}".replace(':id', id);
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