<x-system-layout>

<main id="main" class="main">
    <div class="row g-3">
      <div class="pagetitle col-md-10">
        <h1>Walk-in</h1>
          <nav>
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item">Receipts</li>
                <li class="breadcrumb-item active">Walk-in</li>
              </ol>
            </nav>
       </div>
  </div><!-- End Page Title -->

    <section class="section">
      <div class="col-12">
        <div class="card recent-sales overflow-auto rounded-5">
          <div class="card-body table-responsive">
            <h3 class="card-title text-center" style="font-size: 30px;">CAR WASH FORM</h3>
             <form class="row g-3">
              <div class="col-md-9">
                <label class="form-label">&nbsp;</label>
              </div>
              <div class="col-md-3">
                <div class="input-group">
                  <div class="input-group-text">Date:</div>
                  <input type="text" id="dateInput" name="date" class="form-control text-center" readonly>
                </div>
              </div>   
              
 
  <div class="col-md-4">
    <div class="input-group">
      <div class="col-md-4 input-group-text ">First Name</div>
      <input type="text" name="first_name" class="form-control">
    </div>
  </div>
  <div class="col-md-4">
    <div class="input-group">
      <div class="col-md-4 input-group-text ">Last Name</div>
      <input type="text" name="last_name" class="form-control">
    </div>
  </div>
  <div class="col-md-4">
    <div class="input-group">
      <div class="col-md-3 input-group-text ">Phone</div>
      <input type="text" name="contact" class="form-control">
    </div>
  </div>
 
  <div class="col-md-3">
    <div class="input-group">
      <div class="input-group-text ">Year</div>
      <input type="text" name="car_year" class="form-control">
    </div>
  </div>
  <div class="col-md-3">
    <div class="input-group">
      <div class="input-group-text ">Make</div>
      <input type="text" name="car_make" class="form-control">
    </div>
  </div>
  <div class="col-md-3">
    <div class="input-group">
      <div class="input-group-text ">Model</div>
      <input type="text" name="car_model" class="form-control">
    </div>
  </div>
  <div class="col-md-3">
    <div class="input-group">
      <div class="input-group-text ">Variant</div>
      <input type="text" name="car_variant" class="form-control">
    </div>
  </div>
  <div class="col-md-4">
    <div class="input-group">
      <div class="input-group-text ">Plate No.</div>
      <input type="text" name="unit_plate_no" class="form-control">
    </div>
  </div>

  <div class="col-md-4">
    <div class=" input-group">
        <label class="col-md-5 input-group-text justify-content-center btn-rounded">Body Type</label>
        <select class="form-select btn-rounded" name="body_type" id="dropdownList" value="{{ old('body_type') }}" required>
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
 
  <div class="col-md-4">
    <div class=" input-group">
        <label class="col-md-5 input-group-text justify-content-center btn-rounded">Amount</label>
        <input type="text" name="" class="form-control btn-rounded" name="amount" id="outputInput" value="90.00" readonly required>
    </div>
</div>

  
  <div class="col-md-8 text-center">
    <label class="form-label ">&nbsp;</label>
  </div>
  <div class="col-md-4 d-grid gap-2 d-md-flex justify-content-md-end">
    <button class="btn btn-danger me-md-2" type="button">CANCEL</button>
    <button class="btn btn-success" type="button">SAVE</button>
  </div>
  
</form>
            </div>
          </div>
        </div>
      </div><!-- End Recent Sales -->
    </section>

  </main><!-- End #main -->
</x-system-layout>

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
</script>