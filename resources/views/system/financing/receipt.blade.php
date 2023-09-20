<x-system-layout>

    @if (session('error'))
      <div class="alert alert-danger">{{ session('error') }}</div>
    @endif
    
      <main id="main" class="main">
          <div class="row">
            <div class="pagetitle col-md-8">
              <h1>Acknowledgment Receipt</h1>
                <nav>
                    <ol class="breadcrumb">
                      <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                      <li class="breadcrumb-item">Appointment</li>
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
                  <form class="row g-3"  method="POST" onsubmit="return validateForm()">
                    @csrf
                    
                    <div class="col-md-9">
                      <label class="form-label">&nbsp;</label>
                    </div>
                    <div class="col-md-3">
                      <div class="input-group">
                        <div class="input-group-text">Date:</div>
                        <input type="text" id="dateInput" name="date" class="form-control text-center" readonly>
                      </div>
                    </div>              
    

        <div class="col-md-12">
          <div class="input-group">
            <label class="col-md-3 input-group-text ">Received from Mr./Mrs.</label>
            <input type="text" name="received_from" class="form-control" style="text-transform: capitalize" value="{{ $toReceipt->first_name }} {{ $toReceipt->last_name }}" readonly>
          </div>
        </div>
        <div class="col-md-12">
          <div class="input-group">
            <label class="col-md-3 input-group-text ">with postal address at</label>
            <input type="text" name="postal_address" class="form-control" style="text-transform: capitalize" value="{{$toReceipt->postal_address}}" readonly>
          </div>
        </div>
        <div class="col-md-12">
          <div class="input-group">
            <label class="col-md-2 input-group-text ">The amount of</label>
            <input type="text" name="amount" id="amount" class="form-control" style="text-transform: capitalize" readonly required>
          </div>
        </div>
        <div class="col-md-2">
        <div class=" input-group">
          <label class="input-group-text">₱ *</label>
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
          <input type="text" name="car_year" id="car_year" class="form-control" maxlength="4" value="{{$toReceipt->car_year}}" readonly>
        </div>
      </div>
      <div class="col-md-6">
        <div class=" input-group">
          <label class="col-md-3 input-group-text justify-content-center">Make</label>
          <input type="text" name="car_make" id="car_make" class="form-control" style="text-transform: capitalize" value="{{$toReceipt->car_make}}" readonly>
        </div>
      </div>
      <div class="col-md-6">
        <div class=" input-group">
          <label class="col-md-3 input-group-text justify-content-center">Model</label>
          <input type="text" name="car_model" id="car_model" class="form-control" style="text-transform: capitalize" value="{{$toReceipt->car_model}}" readonly>
        </div>
      </div>
      <div class="col-md-6">
        <div class=" input-group">
          <label class="col-md-3 input-group-text justify-content-center">Variant</label>
          <input type="text" name="car_variant" id="car_variant" class="form-control" style="text-transform: uppercase" value="{{$toReceipt->car_variant}}" readonly>
        </div>
      </div>
      <div class="col-md-6">
        <div class=" input-group">
          <label class="col-md-3 input-group-text justify-content-center">Color</label>
          <input type="text" name="exterior_color" id="exterior_color" class="form-control" style="text-transform: capitalize" value="{{$toReceipt->exterior_color}}" readonly>
        </div>
      </div>
      <div class="col-md-6">
        <div class=" input-group">
          <label class="col-md-3 input-group-text justify-content-center">Plate No.</label>
          <input type="text" name="car_plate_no" id="car_plate_no" class="form-control" style="text-transform: uppercase" value="{{$toReceipt->car_plate_no}}" readonly>
        </div>
      </div>
      <div class="col-md-6">
        <div class=" input-group">
          <label class="col-md-3 input-group-text justify-content-center">Agreed Price</label>
          <input type="text" id="agreed_price" name="agreed_price" class="form-control total_price" value="{{ number_format($toReceipt->agreed_price, 0, '.', ',') }}" readonly>
        </div>
      </div>
      <div class="col-md-6">
        <div class=" input-group">
            <div class="col-md-3 input-group-text justify-content-center">Balance</div>
          <input type="text" id="balance" name="balance" class="form-control total_price" maxlength="7" value="{{ number_format($toReceipt->balance, 0, '.', ',') }}" readonly>
        </div>
      </div>
      <div class="col-md-6">
        <div class="input-group">
          <label class="col-md-3 input-group-text justify-content-center">Deposit</label>
          <input type="text" id="deposit" name="deposit" class="form-control total_price" maxlength="7" value="0" readonly>
        </div>
      </div>
      <div class="col-md-6">
        <div class=" input-group">
          <label class="col-md-3 input-group-text justify-content-center">Due Date</label>
          <input type="date" name="due_date" class="form-control" value="{{$toReceipt->due_date}}" readonly>
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
        <input type="text" class="form-control hidden" name="id" value="{{$toReceipt->id}}">
        <input type="text" class="form-control hidden" name="user_id" value="{{$toReceipt->user_id}}">
        <input type="text" class="form-control hidden" name="uid" value="{{$toReceipt->uid}}">
        <input type="text" class="form-control hidden" name="image" value="{{$toReceipt->image}}">
        <input type="text" class="form-control hidden" name="car_price" value="{{$toReceipt->car_price}}">
        <input type="text" class="form-control hidden" name="financing_bank" value="{{$toStatus['financing_bank']}}">
        <input type="text" class="form-control hidden" name="status" value="{{$toStatus['status']}}">
        
        <div class="col-md-4">  
          <label class="form-label">Conforme:</label>
          <div class="input-group">
            <input type="text" name="first_name" class="form-control text-end" style="text-transform: capitalize" value="{{$toReceipt->first_name}}" readonly>
            <input type="text" name="last_name" class="form-control" style="text-transform: capitalize" value="{{$toReceipt->last_name}}" readonly>
          </div>
          <div class="text-center">
          <label class="form-label text-center">Buyer's Printed Name/Signature</label>
          </div>
          <div>
            <div class=" input-group">
              <div class="input-group-text">Contact No:</div>
              <input type="text" name="contact" class="form-control" value="{{$toReceipt->contact}}" readonly>
            </div>
          </div>
        </div>

        <div class="col-md-4">
          <label class="form-label">&nbsp;</label>
          <input type="text" name="witness" class="form-control text-center" style="text-transform: capitalize" required>
          <div class="text-center">
          <label class="form-label">Witness</label>
          </div>
        </div>
        <div class="col-md-4">
          <label class="form-label">Received By:</label>
          <input type="text" name="client_name" class="form-control text-center" style="text-transform: capitalize" value="{{ auth('system')->user()->first_name }} {{ auth('system')->user()->last_name }}" readonly>
          <div class="text-center">
            <label class="form-label">Seller's Printed Name/Signature</label>
          </div>
          <div>
            <div class=" input-group">
              <div class="input-group-text">Contact No:</div>
              <input type="text" name="client_contact" class="form-control" value="{{ auth('system')->user()->contact }}" readonly>
            </div>
          </div>
        </div>
    
        
        <div class="col-md-8 text-center">
          <label class="form-label ">&nbsp;</label>
        </div>
        <div class="col-md-4 d-grid gap-2 d-md-flex justify-content-md-end">
          <button class="btn btn-danger me-md-2" type="button">CANCEL</button>
          <div class="dropup-center dropup">
            <button class="btn btn-success dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
              Saved As
            </button>
            <ul class="dropdown-menu">
              <li>
                <button class="dropdown-item" type="button" onclick="showConfirmationModal('SOLD')">SOLD</button>
              </li>
            </ul>
            <input type="hidden" name="action" id="action" value="">
          </div>
          
          
      
        
      </form>
                  </div>
                </div>
              </div>
            </div><!-- End Recent Sales -->
          </section>
    
        </main><!-- End #main -->
    
    
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
            if (action === 'SOLD') {
              document.querySelector('form').action = "{{ route('system.financing.toSold', ['id'=>$toReceipt->id]) }}";
            }
        
            // Submit the form
            document.querySelector('form').submit();
          }
        }
        </script>
        
        
          <script>
    document.addEventListener('DOMContentLoaded', function () {
        const priceInput = document.getElementById("price");
        const balanceInput = document.getElementById("balance");

        // Store the initial balance value when the page loads
        const initialBalance = parseFloat(balanceInput.value.replace(/,/g, ""));

        // Event listener for price input value change
        priceInput.addEventListener("input", function () {
            const priceValue = parseFloat(priceInput.value.replace(/,/g, ""));
            const balanceValue = parseFloat(balanceInput.value.replace(/,/g, ""));

            if (!isNaN(priceValue)) {
                const formattedPrice = formatNumber(priceValue); // Format price with commas
                priceInput.value = formattedPrice.replace(".00", ""); // Remove .00 from formatted price
                if (priceValue === balanceValue) {
                    balanceInput.value = "0"; // Set balance to 0 if price matches balance
                }
            } else {
                priceInput.value = "";
                // Restore the initial balance value when price is cleared
                balanceInput.value = formatNumber(initialBalance, 0);
            }
        });

        // Function to format number with commas and optional decimal places
        function formatNumber(number, decimalPlaces = 2) {
            return number.toLocaleString(undefined, { minimumFractionDigits: decimalPlaces, maximumFractionDigits: decimalPlaces });
        }
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
             
            // const myModal = new bootstrap.Modal(document.getElementById("myModal"));
        
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
            const parts = number.toString().split(".");
            const integerPart = parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ",");
            const formattedNumber = parts.length > 1 ? integerPart + "." + parts[1] : integerPart;
            return formattedNumber;
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
            
            });
        
            $(document).ready(function() {
            setTimeout(function() {
                $(".alert").alert('close');
            }, 3000);
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