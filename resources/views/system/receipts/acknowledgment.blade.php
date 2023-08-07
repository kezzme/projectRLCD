<x-system-layout>

<main id="main" class="main">
    <div class="row">
      <div class="pagetitle col-md-8">
        <h1>Acknowledgment Receipt</h1>
          <nav>
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item">Receipts</li>
                <li class="breadcrumb-item active">Acknowledgment Receipt</li>
              </ol>
            </nav>
       </div>
      </div> 
  </div><!-- End Page Title -->

    <section class="section">

      <div class="col-12">
        <div class="card recent-sales overflow-auto rounded-5">
          <div class="card-body table-responsive">
            <h3 class="card-title text-center" style="font-size: 30px;">ACKNOWLEDGMENT RECEIPT</h3>
             <form class="row g-3">
              <div class="col-md-3">
                <div class=" input-group">
                  <div class="input-group-text">TNX No:</div>
                  <input type="text" name="TNX_No" class="form-control" value="{{$nextTnxNo}}" readonly>
                </div>
              </div>
              <div class="col-md-6">
                <label class="form-label">&nbsp;</label>
              </div>
              <div class="col-md-3">
                <div class="input-group">
                  <div class="input-group-text">Date:</div>
                  <input type="text" id="dateInput" name="date" class="form-control" readonly>
                </div>
              </div>              
 
  <div class="col-md-12">
    <div class="input-group">
      <label class="col-md-3 input-group-text ">Received from Mr./Mrs.</label>
      <input type="text" name="receive_from" class="form-control">
    </div>
  </div>
  <div class="col-md-12">
    <div class="input-group">
      <label class="col-md-3 input-group-text ">with postal address at</label>
      <input type="text" name="postal_address" class="form-control">
    </div>
  </div>
  <div class="col-md-12">
    <div class="input-group">
      <label class="col-md-2 input-group-text ">The amount of</label>
      <input type="text" name="amount" id="amount" class="form-control" readonly>
    </div>
  </div>
  <div class="col-md-2">
  <div class=" input-group">
    <label class="input-group-text">₱</label>
    <input type="text" name="price" id="price" class="form-control totalPrice" maxlength="7">
  </div>
</div>
<div class="col-md-10">
  <div>
    <label style="font-size: 16 px; ">as deposit / earnest / full payment for one unit of used motor vehicle more particularly described as follows:</label>
  </div>
</div>
<div class="col-md-6">
  <div class=" input-group">
    <label class="col-md-3 input-group-text justify-content-center">Year</label>
    <input type="text" name="car_year" id="car_year" class="form-control">
  </div>
</div>
<div class="col-md-6">
  <div class=" input-group">
    <label class="col-md-3 input-group-text justify-content-center">Make</label>
    <input type="text" name="car_make" id="car_make" class="form-control">
  </div>
</div>
<div class="col-md-6">
  <div class=" input-group">
    <label class="col-md-3 input-group-text justify-content-center">Model</label>
    <input type="text" name="car_model" id="car_model" class="form-control">
  </div>
</div>
<div class="col-md-6">
  <div class=" input-group">
    <label class="col-md-3 input-group-text justify-content-center">Variant</label>
    <input type="text" name="car_variant" id="car_variant" class="form-control">
  </div>
</div>
<div class="col-md-6">
  <div class=" input-group">
    <label class="col-md-3 input-group-text justify-content-center">Color</label>
    <input type="text" name="exterior_color" id="exterior_color" class="form-control">
  </div>
</div>
<div class="col-md-6">
  <div class=" input-group">
    <label class="col-md-3 input-group-text justify-content-center">Plate No.</label>
    <input type="text" name="car_plate_no" id="car_plate_no" class="form-control">
  </div>
</div>
<div class="col-md-6">
  <div class=" input-group">
    <label class="col-md-3 input-group-text justify-content-center">Agreed Price</label>
    <input type="text" name="agreed_price" class="form-control total_price" maxlength="7">
  </div>
</div>
<div class="col-md-6">
  <div class=" input-group">
      <div class="col-md-3 input-group-text justify-content-center">Balance</div>
    <input type="text" name="balance" class="form-control total_price" maxlength="7">
  </div>
</div>
<div class="col-md-6">
  <div class=" input-group">
      <label class="col-md-3 input-group-text justify-content-center">Deposit</label>
    <input type="text" name="deposit" class="form-control total_price" maxlength="7">
  </div>
</div>
<div class="col-md-6">
  <div class=" input-group">
    <label class="col-md-3 input-group-text justify-content-center">Due Date</label>
    <input type="date" name="due_date" class="form-control" >
  </div>
</div>
<div class="col-md-12">
  <div>
    <label style="font-size: 16 px; ">The Deposit / Earnest Money is subject to full forfeiture if the buyer failes to pay the balance on the last working hour of the stated due date,</label>
  </div>
</div>
<div class="col-md-12">
  <div>
    <label style="font-size: 16 px; ">"Received the unit in good running condition, as is where is"</label>
  </div>
</div>
<div class="col-md-12">
  <div>
    <label style="font-size: 16 px; ">"Received the original copies of the following:</label>
  </div>
</div>
@foreach ($checkboxes as $checkbox)
<div class="col-md-6">
  <div class="form-check">
      <input class="form-check-input" type="checkbox" name="required_docs[]" value="{{ $checkbox }}">
      <label class="form-check-label">{{ $checkbox }}</label>
  </div>
</div>
@endforeach

  <input type="text" class="" id="uid" name="uid">
  <input type="text" class="" id="image" name="image">
  <input type="text" class="" id="car_price" name="car_price">
  
  <input type="text" class="" name="user_id" value="{{$nextidNumber}}">

 


  <div class="col-md-4">
    <label class="form-label">Conforme:</label>
    <div class="input-group">
      <input type="text" name="first_name" class="form-control" style="text-transform: capitalize">
      <input type="text" name="last_name" class="form-control" style="text-transform: capitalize">
    </div>
    <div class="text-center">
    <label class="form-label text-center">Buyer's Printed Name/Signature</label>
    </div>
    <div>
      <div class=" input-group">
        <div class="input-group-text">Contact No:</div>
        <input type="text" name="contact" class="form-control">
      </div>
    </div>
  </div>
  <div class="col-md-4">
    <label class="form-label">&nbsp;</label>
    <input type="text" name="witness" class="form-control" style="text-transform: capitalize">
    <div class="text-center">
    <label class="form-label">Witness</label>
    </div>
  </div>
  <div class="col-md-4">
    <label class="form-label">Received By:</label>
    <input type="text" name="client_name" class="form-control" style="text-transform: capitalize">
    <div class="text-center">
      <label class="form-label">Seller's Printed Name/Signature</label>
    </div>
    <div>
      <div class=" input-group">
        <div class="input-group-text">Contact No:</div>
        <input type="text" name="client_contact" class="form-control">
      </div>
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

<!-- The Modal (Bootstrap modal) -->
<div id="myModal" class="modal fade">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Unit List</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <ul id="unitList" class="list-group">
          <input type="text" id="searchInput" class="form-control mb-3" placeholder="Search...">
          @foreach ($units as $unit)
          <li class="list-group-item" data-uid="{{$unit->uid}}" data-image="{{$unit->image}}" data-year="{{$unit->car_year}}" data-make="{{$unit->car_make}}" data-model="{{$unit->car_model}}" data-variant="{{$unit->car_variant}}" 
            data-color="{{$unit->exterior_color}}" data-plate="{{$unit->plate_no}}" data-price="{{$unit->price}}">
            <img src="{{asset('img/'.$unit->image)}}" class="car-image">
            {{$unit->car_year}} {{$unit->car_make}} {{$unit->car_model}} {{$unit->car_variant}}
          </li>
          @endforeach
        </ul>
      </div>
    </div>
  </div>
</div>




</x-system-layout>


<script>
  document.addEventListener('DOMContentLoaded', function () {
    const searchInput = document.getElementById('searchInput');
    const listItems = document.querySelectorAll('#unitList li');

    // Event listener for the search input
    searchInput.addEventListener('click', function (e) {
      e.stopPropagation(); // Prevent click event from propagating to the modal's backdrop
    });

    // Event listener for the keyup event on the search input
    searchInput.addEventListener('keyup', function (e) {
      const searchTerm = e.target.value.toLowerCase();

      listItems.forEach(item => {
        const text = item.textContent.toLowerCase();
        // Check if the item's text contains the search term
        if (text.includes(searchTerm)) {
          item.style.display = 'block'; // Show the item if it matches the search term
        } else {
          item.style.display = 'none'; // Hide the item if it doesn't match the search term
        }
      });
    });

    // Event listener for the modal's show.bs.modal event
    $('#myModal').on('shown.bs.modal', function () {
  $('#searchInput').focus();
});
  });

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


document.addEventListener("DOMContentLoaded", function () {
    const unitList = document.getElementById("unitList");
    const uidInput = document.getElementById("uid");
    const car_yearInput = document.getElementById("car_year");
    const car_makeInput = document.getElementById("car_make");
    const car_modelInput = document.getElementById("car_model");
    const car_variantInput = document.getElementById("car_variant");
    const exterior_colorInput = document.getElementById("exterior_color");
    const car_priceInput = document.getElementById("car_price");
    const car_plate_noInput = document.getElementById("car_plate_no");
    const imageInput = document.getElementById("image");
    const myModal = new bootstrap.Modal(document.getElementById("myModal"));

    function populateInputForm(event) {
      const clickedUnit = event.target;
      const unitInfo = clickedUnit.textContent.trim().split(" ");
      car_yearInput.value = unitInfo[0]; 
      car_makeInput.value = unitInfo[1]; 
      car_modelInput.value = unitInfo[2]; 
      car_variantInput.value = unitInfo[3];
      uidInput.value = clickedUnit.dataset.uid;
      imageInput.value = clickedUnit.dataset.image;
      exterior_colorInput.value = clickedUnit.dataset.color;
      car_plate_noInput.value = clickedUnit.dataset.plate;
      car_priceInput.value = clickedUnit.dataset.price;
      myModal.hide();
    }

  var totalPrices = document.querySelectorAll(".totalPrice");
    totalPrices.forEach(function (totalPriceInput) {
      totalPriceInput.addEventListener("input", function () {
        var priceInput = document.getElementById("price");
        var amountInput = document.getElementById("amount");

        var priceValue = this.value.replace(/[^0-9.]/g, "");
        totalPriceInput.value = formatNumber(priceValue);

        var amountInWords = convertNumberToWords(priceValue);
        amountInput.value = amountInWords;
      });
    });

  var totalPrices = document.querySelectorAll(".total_price");
    totalPrices.forEach(function(totalPriceInput) {
      totalPriceInput.addEventListener("input", function() {
        totalPriceInput.value = formatNumber(this.value.replace(/[^0-9.]/g, ""));
      });
    });

    function formatNumber(number) {
      return number.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    }

    function convertNumberToWords(number) {
  var num = parseFloat(number);
  var numberWords = [
    "", // Add an empty string as the first element
    "one",
    "two",
    "three",
    "four",
    "five",
    "six",
    "seven",
    "eight",
    "nine",
  ];
  var tensWords = [
    "",
    "ten",
    "twenty",
    "thirty",
    "forty",
    "fifty",
    "sixty",
    "seventy",
    "eighty",
    "ninety",
  ];
  var teensWords = [
    "ten",
    "eleven",
    "twelve",
    "thirteen",
    "fourteen",
    "fifteen",
    "sixteen",
    "seventeen",
    "eighteen",
    "nineteen",
  ];

  // Helper function to convert a number less than 1000 to words
function convertLessThanThousand(num) {
  if (num >= 100) {
    var hundredPart = numberWords[Math.floor(num / 100)] + " hundred";
    var remainingPart = convertLessThanThousand(num % 100);
    return remainingPart ? hundredPart + " " + remainingPart : hundredPart;
  }
  if (num >= 20) {
    var tenPart = tensWords[Math.floor(num / 10)];
    var unitPart = numberWords[num % 10];
    // Check if the unit part is zero
    return unitPart !== "" ? tenPart + " " + unitPart : tenPart;
  }
  // Handle numbers between 10 and 19 separately
  if (num >= 10 && num <= 19) {
    return teensWords[num - 10];
  }
  // Handle single-digit and zero numbers separately
  return num > 0 ? numberWords[num] : "";
}

  // Helper function to convert a number less than a million to words
  function convertLessThanMillion(num) {
    if (num >= 1000000) {
      return (
        convertLessThanThousand(Math.floor(num / 1000000)) +
        " million " +
        convertLessThanThousand(num % 1000000)
      );
    }
    if (num >= 100000) {
      var hundredThousandPart = convertLessThanThousand(Math.floor(num / 1000));
      var remainingPart = convertLessThanThousand(num % 1000);
      var thousandStr = remainingPart ? " thousand " : " thousand";
      return hundredThousandPart + thousandStr + remainingPart;
    }
    if (num >= 1000) {
      return (
        convertLessThanThousand(Math.floor(num / 1000)) +
        " thousand " +
        convertLessThanThousand(num % 1000)
      );
    }
    return convertLessThanThousand(num);
  }

  // Edge case handling for zero
  if (num === 0 || isNaN(num)) {
    return ""; // If price is null or empty, return an empty string
  }

  // Convert the whole part of the number to words
  var wholePart = Math.floor(num);
  var wholePartWords = convertLessThanMillion(wholePart);

  // Construct the final result
  var result = wholePartWords + " pesos";
  return result;
}

    // Event listener for clicking on a unit in the list
    unitList.addEventListener("click", populateInputForm);

    // Event listener for keyboard shortcuts (Ctrl + Alt keys)
    document.addEventListener("keydown", function (event) {
      if (event.ctrlKey && event.altKey) {
        myModal.show(); // Show the modal
      }
    });

    // Event listener for submitting the form
    document.getElementById("unitInfoForm").addEventListener("submit", function (event) {
      event.preventDefault();
      // Handle form submission if needed
    });
  });
</script>