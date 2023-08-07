<x-landing-layout>

    @include('home.nav-bar')
<!-- Page Header Start -->
<div class="container-fluid page-header  p-0" style="background-image: url(img/carousel-bg-16.jpg);">
    <div class="container-fluid page-header-inner py-5">
        <div class="container text-center">
            <h1 class="display-3 text-white mb-3 animated slideInDown">Services</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-center text-uppercase">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item text-white active" aria-current="page">Services</li>
                </ol>
            </nav>
        </div>
    </div>
</div>
<!-- Page Header End -->


<!-- Service Start -->

    <!-- Service End -->


    <!-- Booking Start -->
    <div class="container-fluid bg-secondary py-5 my-5 booking wow fadeInUp" data-wow-delay="0.1s">
        <div class="container">
            <div class="row gx-5">
                
                <div class="container-xxl service py-5">
                    <div class="container">
                        <div class="row g-4 wow fadeInUp">
                            <div class="col-lg-4">
                                <div class="nav w-100 nav-pills me-4">
                                    <button class="nav-link w-100 d-flex align-items-center text-start p-4 mb-4 active" data-bs-toggle="pill" data-bs-target="#tab-pane-1" type="button">
                                            <i class="fa-solid fa-car-side fa-2x me-3"></i>
                                            <h4 class="m-0">Car Wash</h4>
                                        </button>
                                    <button class="nav-link w-100 d-flex align-items-center text-start p-4 mb-4" data-bs-toggle="pill" data-bs-target="#tab-pane-2" type="button">
                                            <i class="fa-solid fa-screwdriver-wrench fa-2x me-3"></i>
                                            <h4 class="m-0">Auto Detailing</h4>
                                        </button>
                                    <button class="nav-link w-100 d-flex align-items-center text-start p-4 mb-4" data-bs-toggle="pill" data-bs-target="#tab-pane-3" type="button">
                                            <i class="fa-solid fa-fill-drip fa-2x me-3"></i>
                                            <h4 class="m-0">Paint Job</h4>
                                        </button>
                
                                </div>
                            </div>
                            <div class="col-lg-7">
                                <div class="tab-content">
                                    <div class="tab-pane fade show active" id="tab-pane-1">
                                        <div class="row g-4">
                                            <div class="bg-primary h-100 d-flex flex-column  p-5 ">
                                                <h1 class="text-white mb-4 justify-content-center text-center">Car Wash Form</h1>
                                                <form action="services/carwash/process" method="POST">
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
                                                          <div class="col-12 col-sm-4">
                                                            <div class=" input-group">
                                                              <label class="col-md-4 input-group-text justify-content-center btn-rounded">Contact</label>
                                                              <input type="text" name="phone" class="form-control btn-rounded" style="height: 50px; text-transform:uppercase;" value="{{auth()->user()->phone}}" readonly>
                                                            </div>
                                                          </div>
                                                          <div class="col-12 col-sm-4">
                                                            <div class=" input-group">
                                                              <label class="col-md-5 input-group-text justify-content-center btn-rounded">Make</label>
                                                              <input type="text" name="car_make" class="form-control btn-rounded" style="height: 50px; text-transform:uppercase;" required>
                                                            </div>
                                                          </div>
                                                          <div class="col-12 col-sm-4">
                                                            <div class=" input-group">
                                                              <label class="col-md-5 input-group-text justify-content-center btn-rounded">Model</label>
                                                              <input type="text" name="car_model" class="form-control btn-rounded" style="height: 50px; text-transform:uppercase;" required>
                                                            </div>
                                                          </div>
                                                        <div class="col-12 col-sm-4">
                                                            <div class=" input-group">
                                                                <label class="col-md-5 input-group-text justify-content-center btn-rounded">Plate No.</label>
                                                                <input type="text" name="plate_no" class="form-control btn-rounded" style="height: 55px; text-transform:uppercase;" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-12 col-sm-4">
                                                            <div class=" input-group">
                                                                <label class="col-md-5 input-group-text justify-content-center btn-rounded">Body Type</label>
                                                                <select class="form-select btn-rounded" name="body_type" id="dropdownList" style="height: 55px;" required>
                                                                  <option value="Sedan" data-price="90" selected>Sedan</option>
                                                                    <option value="Hatchback" data-price="90">Hatchback</option>
                                                                    <option value="SUV" data-price="120">SUV</option>
                                                                    <option value="MPV" data-price="120">MPV</option>
                                                                    <option value="AUV" data-price="120">AUV</option>
                                                                    <option value="Coupe" data-price="90">Coupe</option>
                                                                    <option value="Crossover" data-price="120">Crossover</option>
                                                                    <option value="Pick-Up Truck" data-price="120">Pick-Up Truck</option>
                                                                    <option value="Van" data-price="120">Van</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-12 col-sm-4">
                                                            <div class=" input-group">
                                                                <label class="col-md-5 input-group-text justify-content-center btn-rounded">Amount</label>
                                                                <input type="text" class="form-control btn-rounded" name="amount" style="height: 55px;" id="outputInput" readonly required>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                                <div class="col-md-12" id="datepicker1" name="date"></div>
                                                            </div>
                                                        <div class="col-lg-6">
                                                            <div class="row">
                                                                <div class="col-md-6 mb-3">
                                                                    <button id="btn7AM_1" class="btn btn-secondary btn-rounded w-100" onclick="selectTime('7:00 AM', 1)" type="button" disabled>7:00 AM</button>
                                                                </div>
                                                                <div class="col-md-6 mb-3">
                                                                    <button id="btn9AM_1" class="btn btn-secondary btn-rounded w-100" onclick="selectTime('9:00 AM', 1)" type="button" disabled>9:00 AM</button>
                                                                </div>
                                                                <div class="col-md-6 mb-3">
                                                                    <button id="btn11AM_1" class="btn btn-secondary btn-rounded w-100" onclick="selectTime('11:00 AM', 1)" type="button" disabled>11:00 AM</button>
                                                                </div>
                                                                <div class="col-md-6 mb-3">
                                                                    <button id="btn1PM_1" class="btn btn-secondary btn-rounded w-100" onclick="selectTime('1:00 PM', 1)" type="button" disabled>1:00 PM</button>
                                                                </div>
                                                                <div class="col-md-6 mb-3">
                                                                    <button id="btn3PM_1" class="btn btn-secondary btn-rounded w-100" onclick="selectTime('3:00 PM', 1)" type="button" disabled>3:00 PM</button>
                                                                </div>
                                                                <div class="col-md-6 mb-3">
                                                                    <button id="btn5PM_1" class="btn btn-secondary btn-rounded w-100" onclick="selectTime('5:00 PM', 1)" type="button" disabled>5:00 PM</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12 hidden" id="selectedDateTime_1">
                                                            <div class="card bg-blue btn-rounded justify-content-center text-white" style="height: 35px;">
                                                                <div class="card-body row ">
                                                                    <div class="col-md-11">
                                                                        <span><i class="fa-regular fa-calendar-days"></i> You've selected <label id="selectedTime_1" name="selectedTime_1"></label> on <label id="selectedDate_1" name="date"></label><span>
                                                                      </div>
                                                                    <div class="col-md-1 justify-content-end">
                                                                        <i class="fa-solid fa-circle-xmark" type="button" onclick="closeDateTime(1)"></i>
                                                                      </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                     
                                                            <div class="col-12">
                                                                <textarea class="form-control btn-rounded" maxlength="250" placeholder="Special Request"></textarea>
                                                            </div>
                                                            
                
                                                            <div class="col-12">
                                                                <button class="btn btn-secondary w-100 py-3 btn-rounded" type="submit">Book Now</button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                             </div>
                                          </div>
                                        <div class="tab-pane fade" id="tab-pane-2">
                                            <div class="row g-4">
                                            <div class="bg-primary h-100 d-flex flex-column  p-5 " data-wow-delay="0.6s">
                                                    <h1 class="text-white mb-4 justify-content-center text-center">Auto Detailing Form</h1>
                                                    <form>
                                                    <div class="row g-3">
                                                        <div class="col-12 col-sm-6">
                                                            <div class=" input-group">
                                                              <div class="col-md-4 input-group-text justify-content-center btn-rounded">First Name</div>
                                                              <input type="text" class="form-control btn-rounded" style="height: 50px; text-transform:uppercase;" value="{{auth()->user()->first_name}}" readonly>
                                                            </div>
                                                          </div>
                                                          <div class="col-12 col-sm-6">
                                                            <div class=" input-group">
                                                              <div class="col-md-4 input-group-text justify-content-center btn-rounded">Last Name</div>
                                                              <input type="text" class="form-control btn-rounded" style="height: 50px; text-transform:uppercase;" value="{{auth()->user()->last_name}}" readonly>
                                                            </div>
                                                          </div>
                                                          <div class="col-12 col-sm-4">
                                                            <div class=" input-group">
                                                              <div class="col-md-4 input-group-text justify-content-center btn-rounded">Contact</div>
                                                              <input type="text" class="form-control btn-rounded" maxlength="11" style="height: 50px; text-transform:uppercase;" value="{{auth()->user()->phone}}" readonly>
                                                            </div>
                                                          </div>
                                                        <div class="col-12 col-sm-4">
                                                            <div class=" input-group">
                                                                <div class="col-md-5 input-group-text justify-content-center btn-rounded">Year</div>
                                                                <input type="text" class="form-control btn-rounded" style="height: 55px; text-transform:uppercase;">
                                                            </div>
                                                        </div>
                                                        <div class="col-12 col-sm-4">
                                                            <div class=" input-group">
                                                                <div class="col-md-5 input-group-text justify-content-center btn-rounded">Make</div>
                                                                <input type="text" class="form-control btn-rounded" style="height: 55px; text-transform:uppercase;">
                                                            </div>
                                                        </div>
                                                        <div class="col-12 col-sm-4">
                                                            <div class=" input-group">
                                                                <div class="col-md-5 input-group-text justify-content-center btn-rounded">Model</div>
                                                                <input type="text" class="form-control btn-rounded" style="height: 55px; text-transform:uppercase;">
                                                            </div>
                                                        </div>
                                                        <div class="col-12 col-sm-4">
                                                            <div class=" input-group">
                                                                <div class="col-md-5 input-group-text justify-content-center btn-rounded">Variant</div>
                                                                <input type="text" class="form-control btn-rounded" style="height: 55px; text-transform:uppercase;">
                                                            </div>
                                                        </div>
                                                        <div class="col-12 col-sm-4">
                                                            <div class=" input-group">
                                                                <div class="col-md-5 input-group-text justify-content-center btn-rounded">Plate No.</div>
                                                                <input type="text" class="form-control btn-rounded" style="height: 55px; text-transform:uppercase;">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                                <div class="col-md-12" id="datepicker2"></div>
                                                            </div>
                                                        <div class="col-lg-6">
                                                            <div class="row">
                                                                <div class="col-md-6 mb-3">
                                                                    <button id="btn7AM_2" class="btn btn-secondary btn-rounded w-100" onclick="selectTime('7:00 AM', 2)" type="button" disabled>7:00 AM</button>
                                                                </div>
                                                                <div class="col-md-6 mb-3">
                                                                    <button id="btn9AM_2" class="btn btn-secondary btn-rounded w-100" onclick="selectTime('9:00 AM', 2)" type="button" disabled>9:00 AM</button>
                                                                </div>
                                                                <div class="col-md-6 mb-3">
                                                                    <button id="btn11AM_2" class="btn btn-secondary btn-rounded w-100" onclick="selectTime('11:00 AM', 2)" type="button" disabled>11:00 AM</button>
                                                                </div>
                                                                <div class="col-md-6 mb-3">
                                                                    <button id="btn1PM_2" class="btn btn-secondary btn-rounded w-100" onclick="selectTime('1:00 PM', 2)" type="button" disabled>1:00 PM</button>
                                                                </div>
                                                                <div class="col-md-6 mb-3">
                                                                    <button id="btn3PM_2" class="btn btn-secondary btn-rounded w-100" onclick="selectTime('3:00 PM', 2)" type="button" disabled>3:00 PM</button>
                                                                </div>
                                                                <div class="col-md-6 mb-3">
                                                                    <button id="btn5PM_2" class="btn btn-secondary btn-rounded w-100" onclick="selectTime('5:00 PM', 2)" type="button" disabled>5:00 PM</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12 hidden" id="selectedDateTime_2">
                                                            <div class="card bg-blue btn-rounded justify-content-center text-white" style="height: 35px;">
                                                                <div class="card-body row ">
                                                                    <div class="col-md-11">
                                                                    <span><i class="fa-regular fa-calendar-days"></i> You've selected <label id="selectedTime_2"></label> on <label  id="selectedDate_2"></label><span>
                                                                    </div>
                                                                    <div class="col-md-1 justify-content-end">
                                                                    <i class="fa-solid fa-circle-xmark" type="button" onclick="closeDateTime(2)"></i>
                                                                    </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-12">
                                                                <textarea class="form-control btn-rounded" maxlength="250" placeholder="Special Request"></textarea>
                                                            </div>
                                                            <div class="col-12 col-sm-12 d-grid gap-2 d-md-flex">
                                                                <input type="file" class="form-control btn-rounded" id="inputGroupFile02">
                                                            </div>
                                                            <div class="col-12">
                                                                <button class="btn btn-secondary w-100 py-3 btn-rounded" type="submit">Book Now</button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="tab-pane-3" >
                                            <div class="row g-4">
                                            <div class="bg-primary h-100 d-flex flex-column justify-content-center text-center p-5">
                                                    <h1 class="text-white mb-4">Paint Job Form</h1>
                                                    <form action="" method="POST">
                                                    <div class="row g-3">
                                                        <div class="col-12 col-sm-6">
                                                            <div class=" input-group">
                                                              <div class="col-md-4 input-group-text justify-content-center btn-rounded">First Name</div>
                                                              <input type="text" class="form-control btn-rounded" style="height: 50px; text-transform:uppercase;" value="{{auth()->user()->first_name}}" readonly>
                                                            </div>
                                                          </div>
                                                          <div class="col-12 col-sm-6">
                                                            <div class=" input-group">
                                                              <div class="col-md-4 input-group-text justify-content-center btn-rounded">Last Name</div>
                                                              <input type="text" class="form-control btn-rounded" style="height: 50px; text-transform:uppercase;" value="{{auth()->user()->last_name}}" readonly>
                                                            </div>
                                                          </div>
                                                          <div class="col-12 col-sm-4">
                                                            <div class=" input-group">
                                                              <div class="col-md-4 input-group-text justify-content-center btn-rounded">Contact</div>
                                                              <input type="text" class="form-control btn-rounded" maxlength="11" style="height: 50px; text-transform:uppercase;" value="{{auth()->user()->phone}}" readonly>
                                                            </div>
                                                          </div>
                                                        <div class="col-12 col-sm-4">
                                                            <div class=" input-group">
                                                                <div class="col-md-5 input-group-text justify-content-center btn-rounded">Year</div>
                                                                <input type="text" class="form-control btn-rounded" style="height: 55px; text-transform:uppercase;">
                                                            </div>
                                                        </div>
                                                        <div class="col-12 col-sm-4">
                                                            <div class=" input-group">
                                                                <div class="col-md-5 input-group-text justify-content-center btn-rounded">Make</div>
                                                                <input type="text" class="form-control btn-rounded" style="height: 55px; text-transform:uppercase;">
                                                            </div>
                                                        </div>
                                                        <div class="col-12 col-sm-4">
                                                            <div class=" input-group">
                                                                <div class="col-md-5 input-group-text justify-content-center btn-rounded">Model</div>
                                                                <input type="text" class="form-control btn-rounded" style="height: 55px; text-transform:uppercase;">
                                                            </div>
                                                        </div>
                                                        <div class="col-12 col-sm-4">
                                                            <div class=" input-group">
                                                                <div class="col-md-5 input-group-text justify-content-center btn-rounded">Variant</div>
                                                                <input type="text" class="form-control btn-rounded" style="height: 55px; text-transform:uppercase;">
                                                            </div>
                                                        </div>
                                                        <div class="col-12 col-sm-4">
                                                            <div class=" input-group">
                                                                <div class="col-md-5 input-group-text justify-content-center btn-rounded">Plate No.</div>
                                                                <input type="text" class="form-control btn-rounded" style="height: 55px; text-transform:uppercase;">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                                <div class="col-md-12" id="datepicker3"></div>
                                                            </div>
                                                        <div class="col-lg-6">
                                                            <div class="row">
                                                                <div class="col-md-6 mb-3">
                                                                    <button id="btn7AM_3" class="btn btn-secondary btn-rounded w-100" onclick="selectTime('7:00 AM', 3)" type="button" disabled>7:00 AM</button>
                                                                </div>
                                                                <div class="col-md-6 mb-3">
                                                                    <button id="btn9AM_3" class="btn btn-secondary btn-rounded w-100" onclick="selectTime('9:00 AM', 3)" type="button" disabled>9:00 AM</button>
                                                                </div>
                                                                <div class="col-md-6 mb-3">
                                                                    <button id="btn11AM_3" class="btn btn-secondary btn-rounded w-100" onclick="selectTime('11:00 AM', 3)" type="button" disabled>11:00 AM</button>
                                                                </div>
                                                                <div class="col-md-6 mb-3">
                                                                    <button id="btn1PM_3" class="btn btn-secondary btn-rounded w-100" onclick="selectTime('1:00 PM', 3)" type="button" disabled>1:00 PM</button>
                                                                </div>
                                                                <div class="col-md-6 mb-3">
                                                                    <button id="btn3PM_3" class="btn btn-secondary btn-rounded w-100" onclick="selectTime('3:00 PM', 3)" type="button" disabled>3:00 PM</button>
                                                                </div>
                                                                <div class="col-md-6 mb-3">
                                                                    <button id="btn5PM_3" class="btn btn-secondary btn-rounded w-100" onclick="selectTime('5:00 PM', 3)" type="button" disabled>5:00 PM</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12 hidden" id="selectedDateTime_3">
                                                            <div class="card bg-blue btn-rounded justify-content-center text-white" style="height: 35px;">
                                                                <div class="card-body row ">
                                                                    <div class="col-md-11">
                                                                    <span><i class="fa-regular fa-calendar-days"></i> You've selected <label id="selectedTime_3"></label> on <label  id="selectedDate_3"></label><span>
                                                                    </div>
                                                                    <div class="col-md-1 justify-content-end">
                                                                    <i class="fa-solid fa-circle-xmark" type="button" onclick="closeDateTime(3)"></i>
                                                                    </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-12">
                                                                <textarea class="form-control btn-rounded" maxlength="250" placeholder="Special Request"></textarea>
                                                            </div>
                                                            <div class="col-12 col-sm-12 d-grid gap-2 d-md-flex">
                                                                <input type="file" class="form-control btn-rounded" id="inputGroupFile02">
                                                            </div>
                                                            <div class="col-12">
                                                                <button class="btn btn-secondary w-100 py-3 btn-rounded" type="submit">Book Now</button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                
            </div>
        </div>
    </div>
    <!-- Booking End -->

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

  var selectedDate = []; // Global variable to store the selected date
  var selectedButton = []; // Global variable to store the selected button
  var datePickerInstance = []; // Reference to the Flatpickr instance
  
  function selectDate(selectedDates, dateStr) {
    selectedDate = dateStr;
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
    document.getElementById("btn7AM_").removeAttribute("disabled");
    document.getElementById("btn9AM_").removeAttribute("disabled");
    document.getElementById("btn11AM_").removeAttribute("disabled");
    document.getElementById("btn1PM_").removeAttribute("disabled");
    document.getElementById("btn3PM_").removeAttribute("disabled");
    document.getElementById("btn5PM_").removeAttribute("disabled");
  }
  flatpickr("#datepicker", {
    inline: true,
    defaultDate: new Date().fp_incr(1),
    minDate: "today",
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

  flatpickr("#datepicker", {
    inline: true,
    defaultDate: new Date().fp_incr(1),
    minDate: "today",
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

  flatpickr("#datepicker2", {
    inline: true,
    defaultDate: new Date().fp_incr(1),
    minDate: "today",
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


  flatpickr("#datepicker3", {
    inline: true,
    defaultDate: new Date().fp_incr(1),
    minDate: "today",
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
    selectedDate = "";
    disableTimeButtons();
  }

  function disableTimeButtons() {
    document.getElementById("btn7AM_").setAttribute("disabled", "disabled");
    document.getElementById("btn9AM_").setAttribute("disabled", "disabled");
    document.getElementById("btn11AM_").setAttribute("disabled", "disabled");
    document.getElementById("btn1PM_").setAttribute("disabled", "disabled");
    document.getElementById("btn3PM_").setAttribute("disabled", "disabled");
    document.getElementById("btn5PM_").setAttribute("disabled", "disabled");
  }

  </script>
    
    
