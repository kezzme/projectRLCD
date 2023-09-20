<x-landing-layout>

  @include('home.nav-bar')

@if (session('error'))
  <div class="alert alert-danger">{{ session('error') }}</div>
@endif

<!-- Page Header Start -->
<div class="container-fluid page-header mb-5 p-0" style="background-image: url({{ asset('img/carousel-bg-2.jpg')}});">
  <div class="container-fluid page-header-inner py-5">
    <div class="container text-center">
      <h1 class="display-3 text-white mb-3 animated slideInDown">Paint Job</h1>
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb justify-content-center text-uppercase">
          <li class="breadcrumb-item">
            <a href="#">Home</a>
          </li>
          <li class="breadcrumb-item">
            <a href="#">Services</a>
          </li>
          <li class="breadcrumb-item text-white active" aria-current="page">Paint Job</li>
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
          <h1 class="text-white mb-4">Paint Job Service</h1>
          <p class="text-white mb-0">
            Elevate Your Car's Appearance with Our Professional Paint Job Services!
            Trust Our Expert Team to Transform Your Vehicle into a Work of Art. 
            From Color Customization to Impeccable Finishes, 
            We Take Pride in Every Stroke of Paint. Give Your Car the Star Treatment with Our Premium Services.
            <ul class="text-white">
                <li><b class="text-danger">Color Customization</b>: Choose from a Wide Palette of Colors and Finishes to Create Your Dream Look.</li>
                <li><b class="text-danger">High-Quality Paint</b>: We Use Automotive-Grade Paint for a Durable and Head-Turning Finish.</li>
                <li><b class="text-danger">Masterful Craftsmanship</b>: Our Skilled Technicians Are Artists, Ensuring a Flawless Paint Job Every Time.</li>
                <li><b class="text-danger">Surface Preparation</b>: We Meticulously Prepare the Surface, Including Sanding, Priming, and Smoothing, for a Perfect Canvas.</li>
                <li><b class="text-danger">Quality Assurance</b>: We Stand by Our Work. Your Satisfaction Is Our Guarantee, Backed by Our Quality Promise.</li>
                <li><b class="text-danger">Paint Protection</b>: Our Paint Job Comes with Built-In Protection to Shield Against Environmental Hazards and UV Rays.</li>
                <li><b class="text-danger">Competitive Pricing</b>: Enjoy Professional Paint Services at Affordable Rates without Compromising Quality.</li>  
            </ul>
        </p>
        
        </div>
      </div>
      <div class="col-lg-7">
        <div class="bg-primary h-100 d-flex flex-column  p-5 wow zoomIn" data-wow-delay="0.6s">
          <h1 class="text-white mb-4 justify-content-center text-center">Paint Job Form</h1>
          <form action="paintjob/check" method="POST" enctype="multipart/form-data" onsubmit="return validateForm()">
            @csrf 
            <div class="row g-3 justify-content-center">
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
              <div class="col-md-6">
                  <label for="make" class="text-white">Make</label>
                  <input type="text" name="car_make" class="form-control btn-rounded" style="height: 50px; text-transform:uppercase;" value="{{ old('car_make') }}"  required>
              </div>
              <div class="col-md-6">
                <label for="model" class="text-white">Model</label>
                  <input type="text" name="car_model" class="form-control btn-rounded" style="height: 50px; text-transform:uppercase;" value="{{ old('car_model') }}" required>
              </div>
              <div class="col-md-4">
                <label for="car_variant" class="text-white">Variant</label>
                <input type="text" name="car_variant" class="form-control btn-rounded" style="height: 50px; text-transform:uppercase;" value="{{ old('car_variant') }}"  required>
            </div>
            <div class="col-md-4">
              <label for="year" class="text-white">Year</label>
                <input type="text" name="car_year" class="form-control btn-rounded" style="height: 50px; text-transform:uppercase;" value="{{ old('car_year') }}" required>
            </div>
            <div class="col-md-4">
              <label for="plate_no" class="text-white">Plate No.</label>
              <input type="text" name="unit_plate_no" class="form-control btn-rounded" style="height: 50px; text-transform:uppercase;" value="{{ old('plate_no') }}" required>
            </div>
              <div class="col-md-6 ">
                <label for="datepicker" class="text-white">Date</label>
                <input type="text" class="form-control btn-rounded" id="datepicker" name="date" style="height: 50px;" placeholder="Select Date" required>
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
              <input type="text" class="hidden" name="status" value="pending" readonly>
              <div class="col-md-12">
                <label for="special_request" class="text-white">Special Request</label>
                <textarea class="form-control btn-rounded" name="special_request" maxlength="250" placeholder="enter your special request" value="{{ old('special_request') }}"></textarea>
            </div>
            <div class="col-sm-12">
              <label for="photoInput" class="text-white">Upload Car Images</label>
              <input type="file" class="form-control btn-rounded" name="photos[]" id="photoInput" accept="image/*" multiple required>
          </div>
            <div class="col-12 col-sm-12 d-grid gap-2 d-md-flex justify-content-center">
              <div class="row">
                  <div id="selectedPhotos"></div>
              </div>
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
 <div class="modal fade" id="limitModal" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title">Maximum Limit Reached</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </button>
          </div>
          <div class="modal-body">
              <p>You can select a maximum of 6 image files.</p>
          </div>
          <div class="modal-footer">
              <button type="button" class="btn btn-primary btn-rounded" data-bs-dismiss="modal">OK</button>
          </div>
      </div>
  </div>
</div>
<div class="modal fade" id="validationModal" tabindex="-1" role="dialog" aria-labelledby="validationModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="validationModalLabel">Validation Error</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </button>
      </div>
      <div class="modal-body">
        Please select a Date and and check your Time before submitting the form.
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
  // Format the "Total Price" field with decimal places and comma separators
  var totalPriceInput = document.getElementById("totalPrice");
  totalPriceInput.addEventListener("input", function() {
    totalPriceInput.value = formatNumber(this.value.replace(/[^0-9.]/g, ""));
  });
</script>

<script>
  function formatNumber(number) {
  return number.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
}
   const photoInput = document.getElementById('photoInput');
      const selectedPhotosDiv = document.getElementById('selectedPhotos');
      const MAX_PHOTOS = 6;

      photoInput.addEventListener('change', handleFileSelect);

      function handleFileSelect(event) {
          const files = event.target.files;
          selectedPhotosDiv.innerHTML = ""; // Clear previous selection

          if (files.length > MAX_PHOTOS) {
              // Reset file input
              photoInput.value = "";
              // Show the modal
              $('#limitModal').modal('show');
              return;
          }

          for (let i = 0; i < files.length; i++) {
              const file = files[i];

              if (file.type.startsWith('image/')) {
                  // Check if the file is an image
                  const card = document.createElement('div');
                  card.className = "card photo-card";
                  const img = document.createElement('img');
                  img.src = URL.createObjectURL(file);
                  img.className = "card-img-top";
                  card.appendChild(img);
                  selectedPhotosDiv.appendChild(card);
              }
          }
      }
</script>


<script>
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
      dateFormat: "F d, Y",
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
    var selectedDate = document.getElementById("datepicker").value;
    var selectedTime = document.getElementById("dropdownList").value;
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