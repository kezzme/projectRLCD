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
          <h1 class="text-white mb-4">Requirements</h1>
          <p class="text-white mb-0">
              Experience the Ultimate Car Detailing Service! 
              Unveil the True Beauty of Your Vehicle with Our Expert Team. 
              From a Gleaming Exterior to a Spotless Interior, 
              We Take Pride in Every Detail. Pamper Your Car with Premium Treatments and Care.
          <ul class="text-white">
            <li><b class="text-danger">Power Tools</b>:  Our High-Performance Power Tools Ensure an Impeccable Finish for Your Car's Exterior.</li>
            <li><b class="text-danger">Interior Deep Cleaning</b>: Say Goodbye to Dirt and Dust with Our Thorough Interior Cleaning.</li>
            <li><b class="text-danger">Paint Restoration</b>: Revive the Brilliance of Your Car's Paint with Our Professional Restoration Techniques.</li>
            <li><b class="text-danger">Premium Waxing</b>: Protect and Enhance Your Car's Shine with Our Top-Quality Waxing Products.</li>
            <li><b class="text-danger">Headlight Restoration</b>: Improve Nighttime Visibility with Crystal Clear Headlights.</li>
            <li><b class="text-danger">Tire Care</b>: Enhance Your Car's Look with Tire Cleaning and Conditioning.</li>
            <li><b class="text-danger">Engine Bay Cleaning</b>: Keep Your Engine Looking Fresh and Running Smoothly.</li>
            <li><b class="text-danger">Glass Polishing</b>: Achieve Crystal Clear Windows for Optimal Visibility.</li>
            <li><b class="text-danger">Wheel and Rim Detailing</b>: Bring Out the Shine in Your Wheels for a Stylish Look.</li>
            <li><b class="text-danger">Paint Sealant</b>: Shield Your Car's Paint from Environmental Hazards and UV Rays.</li>
            
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
              <div class="col-12 col-sm-6">
                  <div class=" input-group">
                    <label class="col-md-4 input-group-text justify-content-center btn-rounded">First Name</label>
                    <input type="text" name="first_name" class="form-control btn-rounded" style="height: 50px; text-transform:uppercase;" value="{{auth()->user()->first_name}}" readonly>
                  </div>
                </div>
                <div class="col-12 col-sm-6">
                  <div class=" input-group">
                    <label class="col-md-4 input-group-text justify-content-center btn-rounded">Last Name</label>
                    <input type="text" name="last_name" class="form-control btn-rounded" style="height: 50px; text-transform:uppercase;" value="{{auth()->user()->last_name}}" readonly>
                  </div>
                </div>
                <div class="col-12 col-sm-5">
                  <div class=" input-group">
                    <label class="col-md-4 input-group-text justify-content-center btn-rounded">Contact</label>
                    <input type="text" name="contact" class="form-control btn-rounded" style="height: 50px; text-transform:uppercase;" value="{{auth()->user()->phone}}" readonly>
                  </div>
                </div>
                <div class="col-12 col-sm-7">
                  <div class=" input-group">
                    <label class="col-md-4 input-group-text justify-content-center btn-rounded">Email</label>
                    <input type="text" name="email" class="form-control btn-rounded" style="height: 50px;" value="{{auth()->user()->email}}" readonly>
                  </div>
                </div>
                <div class="col-12 col-sm-4">
                  <div class=" input-group">
                    <label class="col-md-5 input-group-text justify-content-center btn-rounded">Make</label>
                    <input type="text" name="car_make" class="form-control btn-rounded" style="height: 50px; text-transform:uppercase;" value="{{ old('car_make') }}"  required>
                  </div>
                </div>
                <div class="col-12 col-sm-4">
                  <div class=" input-group">
                    <label class="col-md-5 input-group-text justify-content-center btn-rounded">Model</label>
                    <input type="text" name="car_model" class="form-control btn-rounded" style="height: 50px; text-transform:uppercase;" value="{{ old('car_model') }}" required>
                  </div>
                </div>
              <div class="col-12 col-sm-4">
                  <div class=" input-group">
                      <label class="col-md-5 input-group-text justify-content-center btn-rounded">Plate No.</label>
                      <input type="text" name="unit_plate_no" class="form-control btn-rounded" style="height: 55px; text-transform:uppercase;" value="{{ old('plate_no') }}" required>
                  </div>
              </div>
              <div class="col-12 col-sm-7">
                  <div class=" input-group">
                      <label class="col-md-5 input-group-text justify-content-center btn-rounded">Body Type</label>
                      <select class="form-select btn-rounded" name="body_type" id="dropdownList" style="height: 55px;" value="{{ old('body_type') }}" required>
                        <option value="Sedan" data-price="90.00" selected>Sedan</option>
                          <option value="Hatchback" data-price="90.00">Hatchback</option>
                          <option value="SUV" data-price="120.00">SUV</option>
                          <option value="MPV" data-price="120.00">MPV</option>
                          <option value="AUV" data-price="120.00">AUV</option>
                          <option value="Coupe" data-price="90.00">Coupe</option>
                          <option value="Crossover" data-price="120.00">Crossover</option>
                          <option value="Pick-Up Truck" data-price="120.00">Pick-Up Truck</option>
                          <option value="Van" data-price="120.00">Van</option>
                      </select>
                  </div>
              </div>
              <div class="col-12 col-sm-5">
                  <div class=" input-group">
                      <label class="col-md-5 input-group-text justify-content-center btn-rounded">Amount</label>
                      <input type="text" class="form-control btn-rounded" name="amount" style="height: 55px;" id="outputInput" value="90.00" readonly required>
                  </div>
              </div>
              <div class="col-lg-6">
                <div class="col-md-12" id="custom-calendar">
                  <input type="text" class="form-control btn-rounded hidden" id="datepicker" name="date" required>
                </div>
              </div>              
              <div class="col-lg-6">
                <div class="row">
                  <div class="col-md-6 mb-3">
                    <button id="btn7AM" class="btn btn-secondary btn-rounded w-100" onclick="selectTime('7:00 AM')" type="button" disabled>7:00 AM</button>
                  </div>
                  <div class="col-md-6 mb-3">
                    <button id="btn9AM" class="btn btn-secondary btn-rounded w-100" onclick="selectTime('9:00 AM')" type="button" disabled>9:00 AM</button>
                  </div>
                  <div class="col-md-6 mb-3">
                    <button id="btn11AM" class="btn btn-secondary btn-rounded w-100" onclick="selectTime('11:00 AM')" type="button" disabled>11:00 AM</button>
                  </div>
                  <div class="col-md-6 mb-3">
                    <button id="btn1PM" class="btn btn-secondary btn-rounded w-100" onclick="selectTime('1:00 PM')" type="button" disabled>1:00 PM</button>
                  </div>
                  <div class="col-md-6 mb-3">
                    <button id="btn3PM" class="btn btn-secondary btn-rounded w-100" onclick="selectTime('3:00 PM')" type="button" disabled>3:00 PM</button>
                  </div>
                  <div class="col-md-6 mb-3">
                    <button id="btn5PM" class="btn btn-secondary btn-rounded w-100" onclick="selectTime('5:00 PM')" type="button" disabled>5:00 PM</button>
                  </div>
                </div>
              </div>
              <input type="text" class="hidden" name="user_id" value="{{auth()->user()->id}}" readonly>
              <div class="col-12 hidden" id="selectedDateTime">
                  <div class="row">
                    <div class="col-md-12">
                      
                        <div class="input-group"> 
                          <span class="bg-warning input-group-text btn-rounded">You've selected</span>
                          <input type="text" class="bg-warning form-control btn-rounded text-center" id="selectedTime" name="time" readonly required>
                          <span class="bg-warning input-group-text">on</span>
                          <input type="text" class="bg-warning form-control btn-rounded text-center" id="selectedDate" name="date" readonly required>
                          <button class="bg-warning input-group-text btn btn-light btn-rounded" type="button" onclick="closeDateTime()"><i class="fa-solid fa-xmark"></i></button>
                        </div>
                    </div>
                  </div>
              </div>
              <div class="col-12">
                <textarea class="form-control btn-rounded" name="special_request" maxlength="250" placeholder="Special Request" value="{{ old('special_request') }}"></textarea>
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
  <div class="modal-dialog">
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
    document.getElementById("selectedDate").value = selectedDate;
    enableTimeButtons();
    updateSelectedDateTime();
    
  }
  var selectedDate = document.getElementById("selectedDate").innerHTML;
  var selectedTime = document.getElementById("selectedTime").innerHTML;

  function selectTime(time) {
  if (selectedDate !== "") {
    var selectedTime = time;
    document.getElementById("selectedDate").value = selectedDate;
    document.getElementById("selectedTime").value = selectedTime;
    document.getElementById("selectedDateTime").style.display = "block";
    if (selectedButton !== null) {
      selectedButton.classList.remove("selected");
    }
    // Set the clicked button as selected
    selectedButton = document.getElementById("btn" + time.replace(/:/g, ""));
    selectedButton.classList.add("selected");
  }
}

  function updateSelectedDateTime() {
    if (selectedDate !== "") {
      var time = document.getElementById("timepicker").value;
      var selectedTime = time;
      document.getElementById("selectedDate").textContent = formatSelectedDate(selectedDate);
      document.getElementById("selectedTime").textContent = selectedTime;
      document.getElementById("selectedDateTime").style.display = "block";
      if (selectedButton !== null) {
        selectedButton.classList.remove("selected");
      }
    }
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

  function enableTimeButtons() {
  document.getElementById("btn7AM").removeAttribute("disabled");
  document.getElementById("btn9AM").removeAttribute("disabled");
  document.getElementById("btn11AM").removeAttribute("disabled");
  document.getElementById("btn1PM").removeAttribute("disabled");
  document.getElementById("btn3PM").removeAttribute("disabled");
  document.getElementById("btn5PM").removeAttribute("disabled");
}

function disableTimeButtons() {
  document.getElementById("btn7AM").disabled = true;
  document.getElementById("btn9AM").disabled = true;
  document.getElementById("btn11AM").disabled = true;
  document.getElementById("btn1PM").disabled = true;
  document.getElementById("btn3PM").disabled = true;
  document.getElementById("btn5PM").disabled = true;
}



  flatpickr("#datepicker", {
    inline: true,
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
      resizeCalendar();
    }
  });

  function resizeCalendar() {
    if (datePickerInstance !== null) {
      var calendarElement = datePickerInstance.calendarContainer;
      calendarElement.classList.add("custom-calendar");
    }
  }

  function closeDateTime() {
    document.getElementById("selectedDateTime").style.display = "none";
    if (selectedButton !== null) {
      selectedButton.classList.remove("selected");
      selectedButton = null;
    }
    document.getElementById("selectedDate").value = ""; // Clear the selectedDate input
    document.getElementById("selectedTime").value = ""; // Clear the selectedTime input
    disableTimeButtons(); // Disable the time buttons

  }

  function validateForm() {
      var selectedDate = document.getElementById("selectedDate").value;
      var selectedTime = document.getElementById("selectedTime").value;
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