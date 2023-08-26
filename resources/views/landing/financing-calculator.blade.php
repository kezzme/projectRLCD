<x-landing-layout> 
  
  @include('home.nav-bar')

  <!-- Page Header Start -->
  <div class="container-fluid page-header mb-5 p-0" style="background-image: url(img/carousel-bg-12.jpg);">
    <div class="container-fluid page-header-inner py-5">
      <div class="container text-center">
        <h1 class="display-3 text-white mb-3 animated slideInDown">Financing Calculator</h1>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb justify-content-center text-uppercase">
            <li class="breadcrumb-item">
              <a href="#">Home</a>
            </li>
            <li class="breadcrumb-item">
              <a href="#">Pages</a>
            </li>
            <li class="breadcrumb-item text-white active" aria-current="page">Financing Calculator</li>
          </ol>
        </nav>
      </div>
    </div>
  </div>
  <!-- Page Header End -->

  <!-- Booking Start -->
  <div class="container-fluid bg-secondary finCal my-5 wow fadeInUp" data-wow-delay="0.1s">
    <div class="container">
      <div class="row gx-5">
        <div class="col-lg-12 py-3 row">
          <div class="col-md-3">
            <div class="input-group">
              <label for="totalPrice" class="input-group-text bg-secondary text-light btn-rounded" style="height: 45px;">Unit Price:</label>
              <input type="text" class="form-control btn-rounded" id="totalPrice" required>
            </div>
          </div>
          <div class="col-md-3">
            <div class="input-group">
              <label for="downPayment" class="input-group-text bg-secondary text-light btn-rounded" style="height: 45px;">Down Payment (%):</label for="">
              <input type="number" class="form-control btn-rounded" id="downPayment" min="30" max="100" step="0.01" required>
            </div>
          </div>
          <div class="col-md-3">
            <div class="input-group">
              <label for="interestRate" class="input-group-text bg-secondary text-light btn-rounded" style="height: 45px;">Choose Bank:</label>
              <select class="form-select btn-rounded" id="interestRate" required>
                <option value="1.5">JACCS - 1.5%</option>
                <option value="1.3">Global Dominion - 1.3%</option>
                <option value="1.3">Primary - 1.3%</option>
                <option value="1.4">Asialink - 1.4%</option>
              </select>
            </div>
          </div>
          <div class="col-md-3">
            <div class="input-group">
              <label for="terms" class="input-group-text bg-secondary text-light btn-rounded" style="height: 45px;">Select Terms:</label>
              <select class="form-select btn-rounded" id="terms" required>
                <option value="12">12 Months</option>
                <option value="24">24 Months</option>
                <option value="36">36 Months</option>
                <option value="48">48 Months</option>
              </select>
            </div>
          </div>
        </div>
        <div class="col-lg-12 py-3">
          <div class="col-3 container-xxl ">
            <div class="col-12">
              <button class="btn btn-secondary btn-rounded w-100" type="button" style="height: 45px;" onclick="calculate()">Calculate </a>
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Booking End -->

  <!-- Booking Start -->
  <div class="container-fluid bg-secondary booking my-5 wow fadeInUp" data-wow-delay="0.1s">
    <div class="container">
      <div class="row gx-5">
        <div class="col-lg-6 py-5">
          <div class="py-5">
            <h1 class="text-white mb-1">Disclaimer:</h1>
            <p class="text-white mb-0" style="font-size:x-large;"> The computation here is based on interest rate. Interest rates may differ depending on the loan provider (bank or in-house). The amounts listed don't represent any offer from RL Car Dealer or any of its Financing Partners. </p>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="bg-primary h-100 d-flex flex-column p-5 wow zoomIn" data-wow-delay="0.6s">
            <h1 class="text-white mb-4 justify-content-center text-center">Quotation</h1>
            <form>
              <div class="row g-3">
                <div class="col-md-12">
                  <div class="input-group">
                    <label class="col-md-5 justify-content-center input-group-text btn-rounded" style="height: 45px;">Down Payment Amount</label>
                    <input type="text" class="form-control btn-rounded" id="downPaymentAmount" readonly>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="input-group">
                    <div class="col-md-5 justify-content-center input-group-text btn-rounded" style="height: 45px;">Loan Amount</div>
                    <input type="text" class="form-control btn-rounded" id="amountFinanced" readonly>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="input-group">
                    <div class="col-md-5 justify-content-center input-group-text btn-rounded" style="height: 45px;">Monthly Payment</div>
                    <input type="text" class="form-control btn-rounded" id="monthlyPayment" readonly>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="input-group">
                    <div class="col-md-5 justify-content-center input-group-text btn-rounded" style="height: 45px;">Total Payments</div>
                    <input type="text" class="form-control btn-rounded" id="totalPayments" readonly>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Booking End -->

  <!-- Pop-up Message -->
  <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="myModalLabel">Invalid Down Payment</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body"> Minimum down payment is 30% of the total price. </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary btn-rounded" data-bs-dismiss="modal" data-dismiss="modal">OK</button>
        </div>
      </div>
    </div>

  </div> @include('home.footer')
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

  function calculate() {
    var totalPrice = parseFloat(document.getElementById("totalPrice").value.replace(/,/g, ""));
    var downPaymentPercent = parseFloat(document.getElementById("downPayment").value);
    var terms = parseInt(document.getElementById("terms").value);
    var annualInterestRate = parseFloat(document.getElementById("interestRate").value);
    if (downPaymentPercent < 30) {
      $('#myModal').modal('show');
      document.getElementById("downPayment").value = ""; // Clear the down payment field
      return;
    }
    var downPaymentAmount = totalPrice * (downPaymentPercent / 100);
    var amountFinanced = totalPrice - downPaymentAmount;
    var monthlyInterestRate = annualInterestRate / 12;
    var monthlyPayment = (amountFinanced + (amountFinanced * monthlyInterestRate)) / terms;
    var totalPayments = monthlyPayment * terms;
    document.getElementById("downPaymentAmount").value = formatNumber(downPaymentAmount.toFixed());
    document.getElementById("amountFinanced").value = formatNumber(amountFinanced.toFixed());
    document.getElementById("monthlyPayment").value = formatNumber(monthlyPayment.toFixed(2));
    document.getElementById("totalPayments").value = formatNumber(totalPayments.toFixed(2));
  }
</script>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>