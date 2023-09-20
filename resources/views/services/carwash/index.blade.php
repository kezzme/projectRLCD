<x-landing-layout>

  @include('home.nav-bar')

@if (session('error'))
  <div class="alert alert-danger">{{ session('error') }}</div>
@endif

<!-- Page Header Start -->
<div class="container-fluid page-header mb-5 p-0" style="background-image: url({{ asset('img/carousel-bg-2.jpg')}});">
  <div class="container-fluid page-header-inner py-5">
    <div class="container text-center">
      <h1 class="display-3 text-white mb-3 animated slideInDown">Car Wash</h1>
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb justify-content-center text-uppercase">
          <li class="breadcrumb-item">
            <a href="#">Home</a>
          </li>
          <li class="breadcrumb-item">
            <a href="#">Services</a>
          </li>
          <li class="breadcrumb-item text-white active" aria-current="page">Car Wash</li>
        </ol>
      </nav>
    </div>
  </div>
</div>
<!-- Page Header End -->

<!-- Booking Start -->
<div class="container-fluid bg-secondary carwash my-5 wow fadeInUp" data-wow-delay="0.1s">
  <div class="container">
    <div class="row gx-5">
      <div class="col-lg-5 py-5">
        <div class="py-5">
          <h1 class="text-white mb-4">Car Wash Service</h1>
          <p class="text-white mb-0">
              Experience the Ultimate Car Detailing Service! 
              Unveil the True Beauty of Your Vehicle with Our Expert Team. 
              From a Gleaming Exterior to a Spotless Interior, 
              We Take Pride in Every Detail. Pamper Your Car with Premium Treatments and Care.
          <ul class="text-white">
            <li><b class="text-danger">Premium Waxing</b>: Protect and Enhance Your Car's Shine with Our Top-Quality Waxing Products.</li>
            <li><b class="text-danger">Tire Care</b>: Enhance Your Car's Look with Tire Shiner.</li>
            <li><b class="text-danger">Interior Deep Cleaning</b>: Say Goodbye to Dirt and Dust with Our Thorough Interior Cleaning.</li>
            <li><b class="text-danger">Exterior Car Wash</b>: Give Your Car the Refreshing Clean It Deserves with Our Professional Car Wash Service.</li>
          </ul>
          </p>
        </div>
      </div>
      <div class="col-lg-7">
        <div class="bg-primary h-100 d-flex flex-column  p-5 wow zoomIn" data-wow-delay="0.6s">
          <h1 class="text-white mb-4 justify-content-center text-center">Car Wash Form</h1>
          <form action="carwash/check" method="POST" enctype="multipart/form-data" onsubmit="return validateForm()">
            @csrf 
            <div class="row g-3">
              <div class="col-md-6">
                    <label for="first_name" class="text-white">First Name</label>
                    <input type="text" name="first_name" class="form-control btn-rounded" style="height: 50px; text-transform:uppercase;" value="{{auth()->user()->first_name}}" readonly>
                </div>
                <div class="col-md-6">
                    <label for="last_name" class="text-white">Last Name</label>
                    <input type="text" name="last_name" class="form-control btn-rounded" style="height: 50px; text-transform:uppercase;" value="{{auth()->user()->last_name}}" readonly>
                </div>
                <div class="col-md-5">
                  <label for="contact" class="text-white">Contact</label>
                    <input type="text" name="contact" class="form-control btn-rounded" style="height: 50px; text-transform:uppercase;" value="{{auth()->user()->phone}}" readonly>
                </div>
                <div class="col-md-7">
                  <label for="email" class="text-white">Email</label>
                    <input type="text" name="email" class="form-control btn-rounded" style="height: 50px;" value="{{auth()->user()->email}}" readonly>
                </div>
                <div class="col-md-4">
                    <label for="make" class="text-white">Make</label>
                    <input type="text" name="car_make" class="form-control btn-rounded" style="height: 50px; text-transform:uppercase;" value="{{ old('car_make') }}"  required>
                </div>
                <div class="col-md-4">
                  <label for="model" class="text-white">Model</label>
                    <input type="text" name="car_model" class="form-control btn-rounded" style="height: 50px; text-transform:uppercase;" value="{{ old('car_model') }}" required>
                </div>
              <div class="col-md-4">
                <label for="plate_no" class="text-white">Plate No.</label>
                <input type="text" name="unit_plate_no" class="form-control btn-rounded" style="height: 50px; text-transform:uppercase;" value="{{ old('plate_no') }}" required>
              </div>
              <div class="col-md-7">
                    <label for="body_type" class="text-white">Body Type</label>
                      <select class="form-select btn-rounded" name="body_type" id="dropdownList" style="height: 50px;" value="{{ old('body_type') }}" required>
                        <option value="Sedan" data-price="90.00" selected>Sedan</option>
                          <option value="Hatchback" data-price="90.00">Hatchback</option>
                          <option value="SUV" data-price="120.00">SUV</option>
                          <option value="MPV" data-price="120.00">MPV</option>
                          <option value="AUV" data-price="120.00">AUV</option>
                          <option value="Coupe" data-price="90.00">Coupe</option>
                          <option value="Crossover" data-price="90.00">Crossover</option>
                          <option value="Pick-Up Truck" data-price="120.00">Pick-Up Truck</option>
                          <option value="Van" data-price="120.00">Van</option>
                      </select>
              </div>
              <div class="col-md-5">
                  <label for="datepicker" class="text-white">Amount</label>
                  <input type="text" class="form-control btn-rounded" name="amount" style="height: 50px;" id="outputInput" value="90.00"required>
              </div>
              <div class="col-md-6 ">
                  <label for="datepicker" class="text-white">Date</label>
                  <input type="text" class="form-control btn-rounded" id="datepicker" name="date" style="height: 50px;" placeholder="select date" required>
              </div>  
              <div class="col-md-6">
                <label for="dropdownList" class="text-white">Time</label>
                      <select class="form-select btn-rounded" name="time" id="dropdownList" style="height: 50px;" value="{{ old('time') }}" required>
                        <option id="btn9AM" selected>9:00 AM</option>
                          <option id="btn9:30AM">9:30 AM</option>
                          <option id="btn10AM">10:00 AM</option>
                          <option id="btn10:30AM">10:30 AM</option>
                          <option id="btn11AM">11:00 AM</option>
                          <option id="btn11:30AM">11:30 AM</option>
                          <option id="btn1PM">1:00 PM</option>
                          <option id="btn1:30PM">1:30 PM</option>
                          <option id="btn2PM">2:00 PM</option>
                          <option id="btn2:30PM">2:30 PM</option>
                          <option id="btn3PM">3:00 PM</option>
                          <option id="btn3:30PM">3:30 PM</option>
                          <option id="btn4PM">4:00 PM</option>
                          <option id="btn4:30PM">4:30 PM</option>
                      </select>
              </div>
              

              <input type="text" class="hidden" name="user_id" value="{{auth()->user()->id}}" readonly>
              
              <div class="col-12 mb-3">
                <label for="special_request" class="text-white">Special Request</label>
                <textarea class="form-control btn-rounded" name="special_request" maxlength="250" placeholder="enter your special request" value="{{ old('special_request') }}"></textarea>
            </div>
              <div class="col-12">
                <button id="submitButton" class="btn btn-secondary w-100 py-3 btn-rounded" type="submit">Submit</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Booking End -->

 <!-- Modal -->
<div class="modal fade" id="validationModal" tabindex="-1" role="dialog" aria-labelledby="validationModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="validationModalLabel">Validation Error</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </button>
      </div>
      <div class="modal-body">
        Please select a date and time before submitting the form.
      </div>
      <div class="modal-footer">
          <button type="button" class="btn btn-primary btn-rounded" data-bs-dismiss="modal">OK</button>
      </div>
    </div>
  </div>
</div>




@include('home.footer')
</x-landing-layout>

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
</script>

<script>
  document.getElementById('dropdownList').addEventListener('change', function() {
    var dropdownValue = this.value;
    document.getElementById('targetInput').value = dropdownValue;
    targetInput.value = dropdownValue + '.00';
  });

  var selectedDate = ""; // Global variable to store the selected date
  var selectedButton = null; // Global variable to store the selected button
  var datePickerInstance = null; // Reference to the Flatpickr instance
  
  function selectDate(selectedDates, dateStr) {
    selectedDate = dateStr;
    document.getElementById("selectedDate").textContent = formatSelectedDate(selectedDate);
    
}

  function formatSelectedDate(date) {
    var options = {
      weekday: 'long',
      year: 'numeric',
      month: 'long',
      day: 'numeric'
    };
    var formattedDate = new Date(date).toLocaleDateString('en-US', options);
    return formattedDate;
  }


flatpickr("#datepicker", {
    defaultDate: "tomorrow",
    minDate: new Date().fp_incr(1),
    maxDate: new Date().fp_incr(30),
    disable: [
        function(date) {
            // Disable Sundays
            return date.getDay() === 0;
        }
    ],
    onChange: selectDate,
    onOpen: function(selectedDates, dateStr, instance) {
        datePickerInstance = instance;
    }
});


  function validateForm() {
      var selectedDate = document.getElementById("selectedDate").value;
      var submitButton = document.getElementById("submitButton");

      if (selectedDate === "" || selectedTime === "") {
          $('#validationModal').modal('show');
          return false; // Prevent form submission
      }

      // If both fields have values, enable the submit button
      submitButton.disabled = false;

      // You can add further checks or actions here if needed.

      return true; // Allow form submission
}
</script>