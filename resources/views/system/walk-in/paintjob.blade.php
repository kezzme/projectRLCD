<x-system-layout>

  <main id="main" class="main">
      <div class="row g-3">
        <div class="pagetitle col-md-10">
          <h1>Walk-in</h1>
            <nav>
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                  <li class="breadcrumb-item">Walk-in</li>
                  <li class="breadcrumb-item active">Paint Job</li>
                </ol>
              </nav>
         </div>
    </div><!-- End Page Title -->
  
    <section class="section gradient-custom rounded-2">
      <div class="row mt-3 mx-3 ">
        <div class="col-md-3">
          <div style="margin-top: 50px; margin-left: 10px;" class="text-center">
            <i class="fa-solid fa-fill-drip fa-3x" style="color: #ffffff;"></i>
            <h3 class="mt-3 text-white">Paint Job</h3>
            <p class="white-text">Adding a touch of elegance and vibrancy to every corner.</p>
          </div>
        </div>
        <div class="col-md-9 justify-content-center" style="margin-top:30px ;">
          <div class="card card-custom pb-4">
            <div class="card-body mt-0 mx-5">
              <div class="text-center mb-3 pb-2 mt-3">
                <h4 style="color: #495057 ;">Client Details</h4>
              </div>
              <form action="{{route('system.walk_in.paintjob_store')}}" method="POST">
                @csrf
              <div class="col-12">
                <div class="row">
                  <div class="col-md-8 mb-3"></div>
                  <div class="col-md-4 mb-3">
                    <input type="text" id="dateInput" name="date" class="form-control text-center" readonly>
                    <label for="date">Date</label>
                  </div>
                  <div class="col-md-4 mb-3">
                    <input type="text" name="first_name" class="form-control" style="text-transform: capitalize" required>
                    <label for="first_name">First Name</label>
                  </div>
                  <div class="col-md-4 mb-3">
                    <input type="text" name="last_name" class="form-control" style="text-transform: capitalize" required>
                    <label for="last_name">Last Name</label>
                  </div>
                  <div class="col-md-4 mb-3">
                    <input type="text" name="contact" class="form-control" maxlength="11" required>
                    <label for="contact">Contact</label>
                  </div>
                  <div class="col-md-3 mb-3">
                    <input type="text" name="car_year" class="form-control" required>
                    <label for="car_year">Year</label>
                  </div>
                  <div class="col-md-3 mb-3">
                    <input type="text" name="car_make" class="form-control" style="text-transform: capitalize" required>
                    <label for="car_make">Make</label>
                  </div>
                  <div class="col-md-3 mb-3">
                    <input type="text" name="car_model" class="form-control" style="text-transform: capitalize" required>
                    <label for="car_model">Model</label>
                  </div>
                  <div class="col-md-3 mb-3">
                    <input type="text" name="car_variant" class="form-control" style="text-transform: uppercase" required>
                    <label for="car_variant">Variant</label>
                  </div>
                  <div class="col-md-4 mb-3">
                    <input type="text" name="unit_plate_no" class="form-control" style="text-transform: uppercase" required>
                    <label for="unit_plate_no">Plate No.</label>
                  </div>
                  <div class="col-md-4">
                        <select class="form-select btn-rounded" name="panel" id="dropdownList" required>
                          <option value="1 - Panel" data-price="2,500" selected>1 - Panel</option>
                            <option value="2 - Panel" data-price="5,000">2 - Panel</option>
                            <option value="3 - Panel" data-price="7,500">3 - Panel</option>
                            <option value="4 - Panel" data-price="10,000">4 - Panel</option>
                            <option value="5 - Panel" data-price="12,500">5 - Panel</option>
                            <option value="5 - Panel" data-price="15,000">5 - Panel</option>
                            <option value="6 - Panel" data-price="17,500">6 - Panel</option>
                            <option value="7 - Panel" data-price="20,000">7 - Panel</option>
                            <option value="8 - Panel" data-price="22,500">8 - Panel</option>
                            <option value="9 - Panel" data-price="25,000">9 - Panel</option>
                        </select>
                    <label for="panel">Panel</label>
                </div>
                  <div class="col-md-4">
                    <div class=" input-group">
                        <label class="col-md-5 input-group-text justify-content-center btn-rounded">Amount</label>
                        <input type="text" class="form-control btn-rounded" name="amount" id="outputInput" value="2,500" readonly required>
                    </div>
                </div>
                <input type="hidden" name="user_id" value="{{$nextidNumber}}">
                </div>
              </div>
              <div class="float-end">
                <!-- Submit button -->
                <button type="button" class="btn btn-primary rounded-2" style="background-color: #0062CC ;" onclick="showConfirmationModal('CONFIRM')">Confirm</button>
              </div>
  
              <div class="float-end mx-3">
                <!-- Submit button -->
                <button type="button" class="btn btn-primary rounded-2" style="background-color: #cc1100 ;">Clear Form</button>
              </div>
  
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>
  <!-- End #main -->
  
  
    <div class="modal fade" id="validationModal" tabindex="-1" aria-labelledby="validationModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="validationModalLabel">Validation Error</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <p id="validationMessage"></p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
  
    <div class="modal fade" id="confirmationModal" tabindex="-1" aria-labelledby="confirmationModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="confirmationModalLabel">Confirmation</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body" id="confirmationMessage">
            <!-- The confirmation message will be inserted here -->
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
            <button type="button" class="btn btn-primary" id="confirmActionButton">Confirm</button>
            <input type="hidden" name="action" id="action" value="">
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
    function validateForm() {
      const requiredFields = document.querySelectorAll('[required]');
      for (const field of requiredFields) {
        if (!field.value.trim()) {
          const errorMessage = 'Please fill out all required fields before submitting.';
          showModal(errorMessage);
          field.focus();
          return false;
        }
      }
         
          return true;
        }
    
      function showModal(message) {
        const validationMessage = document.getElementById('validationMessage');
        validationMessage.textContent = message;
        const validationModal = new bootstrap.Modal(document.getElementById('validationModal'));
        validationModal.show();
    }
      </script>
    
    <script>
     function handleBlur(input) {
      if (input.value === '') {
        input.value = '0';
      }
    }
    
     function setAction(action) {
        document.getElementById('action').value = action;
        const isValid = validateForm();
        if (isValid) {
    
        document.getElementById('action').value = action;
    
        // Depending on the action, set the form action attribute
        if (action === 'CONFIRM') {
          document.querySelector('form').action = "{{ route('system.walk_in.paintjob_store') }}";
        } 
    
        // Submit the form
        document.querySelector('form').submit();
      }
    }
    </script>
  
  
  <script>
    const dropdownList = document.getElementById("dropdownList");
    const outputInput = document.getElementById("outputInput");
  
    // Add event listener to the dropdown list
    dropdownList.addEventListener("change", updatePrice);
  
    // Function to update the price input field with the selected option's price
    function updatePrice() {
        const selectedOption = dropdownList.options[dropdownList.selectedIndex].value;
        const selectedPrice = dropdownList.options[dropdownList.selectedIndex].dataset.price;
        outputInput.value = selectedPrice;
    }
  
     // Get the current date in the format "YYYY-MM-DD"
     function getCurrentDate() {
      const now = new Date();
      const year = now.getFullYear();
      const month = String(now.getMonth() + 1).padStart(2, '0');
      const day = String(now.getDate()).padStart(2, '0');
      return `${year}-${month}-${day}`;
    }
  
    // Set the current date in the input field on page load
    document.addEventListener('DOMContentLoaded', function() {
      const dateInput = document.getElementById('dateInput');
      dateInput.value = getCurrentDate();
    });
  
    function showConfirmationModal(action) {
      const confirmationModal = new bootstrap.Modal(document.getElementById('confirmationModal'));
      const confirmActionButton = document.getElementById('confirmActionButton');
      const confirmationMessage = document.getElementById('confirmationMessage');
      
      // Set the confirmation message based on the action
      confirmationMessage.textContent = `Are you sure you want to mark this as ${action.toLowerCase()}?`;
      
      confirmActionButton.onclick = function() {
        setAction(action.toUpperCase());
        confirmationModal.hide();
      };
  
      confirmationModal.show();
    }
  </script>