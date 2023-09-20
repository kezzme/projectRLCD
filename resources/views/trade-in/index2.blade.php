<x-landing-layout>

  @include('home.nav-bar')

@if (session('error'))
  <div class="alert alert-danger">{{ session('error') }}</div>
@endif

<!-- Page Header Start -->
<div class="container-fluid page-header mb-5 p-0" style="background-image: url({{ asset('img/carousel-bg-10.jpg')}});">
  <div class="container-fluid page-header-inner py-5">
    <div class="container text-center">
      <h1 class="display-3 text-white mb-3 animated slideInDown">Trade Your Car</h1>
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb justify-content-center text-uppercase">
          <li class="breadcrumb-item">
            <a href="#">Home</a>
          </li>
          <li class="breadcrumb-item">
            <a href="#">Pages</a>
          </li>
          <li class="breadcrumb-item text-white active" aria-current="page">Trade-in</li>
        </ol>
      </nav>
    </div>
  </div>
</div>
<!-- Page Header End -->



<!-- About Start -->
<div class="container-xxl py-5">
  <div class="container">
    <div class="row g-5">
      <div class="col-lg-6 pt-4" style="min-height: 400px;">
        <div class="h-100 wow fadeIn" data-wow-delay="0.1s">
          <div id="carouselExampleFade" class="carousel slide carousel-fade">
            <div class="carousel-inner">
              @if ($units->display_image_1)
              <div class="carousel-item active">
                <img src="{{ url('storage/images/'.$units->car_model.'/'.$units->display_image_1) }}" class="d-block w-100" />
              </div>
              @endif
              @if ($units->display_image_2)
              <div class="carousel-item">
                <img src="{{ url('storage/images/'.$units->car_model.'/'.$units->display_image_2) }}" class="d-block w-100" />
              </div>
              @endif
              @if ($units->display_image_3)
              <div class="carousel-item">
                <img src="{{ url('storage/images/'.$units->car_model.'/'.$units->display_image_3) }}" class="d-block w-100" />
              </div>
              @endif
              @if ($units->display_image_4)
              <div class="carousel-item">
                <img src="{{ url('storage/images/'.$units->car_model.'/'.$units->display_image_4) }}" class="d-block w-100" />
              </div>
              @endif
              @if ($units->display_image_5)
              <div class="carousel-item">
                <img src="{{ url('storage/images/'.$units->car_model.'/'.$units->display_image_5) }}" class="d-block w-100" />
              </div>
              @endif
              @if ($units->display_image_6)
              <div class="carousel-item">
                <img src="{{ url('storage/images/'.$units->car_model.'/'.$units->display_image_6) }}" class="d-block w-100" />
              </div>
              @endif
              @if ($units->display_image_7)
              <div class="carousel-item">
                <img src="{{ url('storage/images/'.$units->car_model.'/'.$units->display_image_7) }}" class="d-block w-100" />
              </div>
              @endif
              @if ($units->display_image_8)
              <div class="carousel-item">
                <img src="{{ url('storage/images/'.$units->car_model.'/'.$units->display_image_8) }}" class="d-block w-100" />
              </div>
              @endif
              @if ($units->display_image_9)
              <div class="carousel-item">
                <img src="{{ url('storage/images/'.$units->car_model.'/'.$units->display_image_9) }}" class="d-block w-100" />
              </div>
              @endif
              <!-- 9 IMAGES -->
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>
          </div>
        </div>
      </div>
      <div class="col-lg-6">
        <h6>&nbsp;</h6>
        <h1 class="mb-4">
          <span class="text-primary">{{ $units->car_year }}</span> {{ $units->car_make }} {{ $units->car_model }} {{ $units->car_variant }}
        </h1>
        <p class="mb-4">{{ $units->description }} </p>
        <div class="row g-4 mb-3 pb-3">
          <div class="col-md-4 wow fadeIn" data-wow-delay="0.1s">
            <div class="d-flex">
              <div class="bg-light d-flex flex-shrink-0 align-items-center justify-content-center" style="width: 45px; height: 45px;">
                <span>
                  <i class="fa-solid fa-microchip"></i>
                </span>
              </div>
              <div class="ps-3">
                <h6>Engine</h6>
                <span>{{ $units->engine }}</span>
              </div>
            </div>
          </div>
          <div class="col-md-4 wow fadeIn" data-wow-delay="0.2s">
            <div class="d-flex">
              <div class="bg-light d-flex flex-shrink-0 align-items-center justify-content-center" style="width: 45px; height: 45px;">
                <span>
                  <i class="fa-solid fa-gauge"></i>
                </span>
              </div>
              <div class="ps-3">
                <h6>Transmission</h6>
                <span text-transform:uppercase;>{{ $units->transmission }}</span>
              </div>
            </div>
          </div>
          <div class="col-md-4 wow fadeIn" data-wow-delay="0.3s">
            <div class="d-flex">
              <div class="bg-light d-flex flex-shrink-0 align-items-center justify-content-center" style="width: 45px; height: 45px;">
                <span>
                  <i class="fa-solid fa-gas-pump"></i>
                </span>
              </div>
              <div class="ps-3">
                <h6>Fuel Type</h6>
                <span>{{ $units->fuel }}</span>
              </div>
            </div>
          </div>
          <div class="col-md-4 wow fadeIn" data-wow-delay="0.4s">
            <div class="d-flex">
              <div class="bg-light d-flex flex-shrink-0 align-items-center justify-content-center" style="width: 45px; height: 45px;">
                <span>
                  <i class="fa-solid fa-gauge-simple-high"></i>
                </span>
              </div>
              <div class="ps-3">
                <h6>Odometer</h6>
                <span>{{ $units->odometer }}</span>
              </div>
            </div>
          </div>
          <div class="col-md-4 wow fadeIn" data-wow-delay="0.5s">
            <div class="d-flex">
              <div class="bg-light d-flex flex-shrink-0 align-items-center justify-content-center" style="width: 45px; height: 45px;">
                <span>
                  <i class="fa-solid fa-palette"></i>
                </span>
              </div>
              <div class="ps-3">
                <h6>Interior Color</h6>
                <span>{{ $units->interior_color }}</span>
              </div>
            </div>
          </div>
          <div class="col-md-4 wow fadeIn" data-wow-delay="0.6s">
            <div class="d-flex">
              <div class="bg-light d-flex flex-shrink-0 align-items-center justify-content-center" style="width: 45px; height: 45px;">
                <span>
                  <i class="fa-solid fa-fill-drip"></i>
                </span>
              </div>
              <div class="ps-3">
                <h6>Exterior Color</h6>
                <span>{{ $units->exterior_color }}</span>
              </div>
            </div>
          </div>
          <div class="col-md-4 wow fadeIn" data-wow-delay="0.7s">
            <div class="d-flex">
              <div class="bg-light d-flex flex-shrink-0 align-items-center justify-content-center" style="width: 45px; height: 45px;">
                <span>
                  <i class="fa-solid fa-record-vinyl"></i>
                </span>
              </div>
              <div class="ps-3">
                <h6>Drive Train</h6>
                <span>{{ $units->drive_train }}</span>
              </div>
            </div>
          </div>
          <div class="col-md-4 wow fadeIn" data-wow-delay="0.8s">
            <div class="d-flex">
              <div class="bg-light d-flex flex-shrink-0 align-items-center justify-content-center" style="width: 45px; height: 45px;">
                <span>
                  <i class="fa-solid fa-car-side"></i>
                </span>
              </div>
              <div class="ps-3">
                <h6>Body Type</h6>
                <span>{{ $units->body_type}}</span>
              </div>
            </div>
          </div>
          <div class="col-md-4 wow fadeIn" data-wow-delay="0.9s">
            <div class="d-flex">
              <div class="bg-light d-flex flex-shrink-0 align-items-center justify-content-center" style="width: 45px; height: 45px;">
                <span>
                  <i class="fa-solid fa-user-plus"></i>
                </span>
              </div>
              <div class="ps-3">
                <h6>No. of Owners</h6>
                <span>{{ $units->no_of_owners }}</span>
              </div>
             
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- About End -->

<!-- Booking Start -->
<div class="container-fluid bg-secondary tradeIn my-5 wow fadeInUp" data-wow-delay="0.1s">
  <div class="container">
    <div class="row gx-5">
      <div class="col-lg-5 py-5">
        <div class="py-5" style="font-size: 20px">
          <h1 class="text-white mb-4">Requirements</h1>
          <p class="text-white mb-0">
            <ol type="1">
              <li class="text-white">Capture and upload high-quality pictures of your car.</li>
              <li class="text-white">Ensure that your car is in good running condition.</li>
              <li class="text-white">Gather all the necessary documents:</li>
          <ul class="text-white">
              <li>Official Receipt and Certificate of Registration (ORCR) of your vehicle.</li>
              <li>Deed of Sale (if applicable).</li>
              <li>Insurance documents (if you have insurance for your car).</li>
              <li>Photocopy of your valid ID.</li>
          </ul>
        </ol>
          </p>
        </div>
      </div>
      <div class="col-lg-7">
        <div class="bg-primary h-100 d-flex flex-column  p-5 wow zoomIn" data-wow-delay="0.6s">
          <h1 class="text-white mb-4 justify-content-center text-center">Trade-in Form</h1>
          <form action="{{route('new-arrival.tradeIn.check')}}" method="POST" enctype="multipart/form-data" onsubmit="return validateForm()">
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
              <div class="col-md-6">
                <label for="year" class="text-white">Year</label>
                  <input type="text" name="car_year" class="form-control btn-rounded" style="height: 50px; text-transform:uppercase;" placeholder="ex. 2019" value="{{ old('car_year') }}" required>
              </div>
              <div class="col-md-6">
                <label for="make" class="text-white">Make</label>
                <input type="text" name="car_make" class="form-control btn-rounded" style="height: 50px; text-transform:uppercase;" placeholder="ex. Toyota" value="{{ old('car_make') }}"  required>
              </div>
              <div class="col-md-6">
                <label for="model" class="text-white">Model</label>
                  <input type="text" name="car_model" class="form-control btn-rounded" style="height: 50px; text-transform:uppercase;" placeholder="ex. Vios" value="{{ old('car_model') }}" required>
              </div>
              <div class="col-md-6">
                <label for="car_variant" class="text-white">Variant</label>
                <input type="text" name="car_variant" class="form-control btn-rounded" style="height: 50px; text-transform:uppercase;" placeholder="ex. G" value="{{ old('car_variant') }}"  required>
              </div>
              <div class="col-md-5">
                <label for="plate_no" class="text-white">Plate No.</label>
                <input type="text" name="unit_plate_no" class="form-control btn-rounded" style="height: 50px; text-transform:uppercase;" value="{{ old('plate_no') }}" required>
              </div>
              <div class="col-md-7">
                <label for="unit_trade_value" class="text-white">Trade Value</label>
                <input type="text" id="totalPrice" name="unit_trade_value" class="form-control btn-rounded" style="height: 50px;" maxlength="7" required>
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
              <input type="text" class="hidden" name="uid" value="{{$units->uid}}" readonly>
              <input type="text" class="hidden" name="car_year" value="{{$units->car_year}}" readonly>
              <input type="text" class="hidden" name="car_make" value="{{$units->car_make}}" readonly>
              <input type="text" class="hidden" name="car_model" value="{{$units->car_model}}" readonly>
              <input type="text" class="hidden" name="car_variant" value="{{$units->car_variant}}" readonly>
              <input type="text" class="hidden" name="car_plate_no" value="{{$units->plate_no}}" readonly>
              <input type="text" class="hidden" name="bought_price" value="{{$units->bought_price}}" readonly>
              <input type="text" class="hidden" name="car_price" value="{{$units->car_price}}" readonly>
              <input type="text" class="hidden" name="image" value="{{$units->image}}" readonly>
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
                <button class="btn btn-secondary w-100 py-3 btn-rounded" type="submit">Submit</button>
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
    var selectedDate = ""; 
    var selectedButton = null; 
    var datePickerInstance = null;
    
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