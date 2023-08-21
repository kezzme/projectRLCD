<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

<ul class="sidebar-nav" id="sidebar-nav">

  <li class="nav-item">
    <a class="nav-link {{ is_active_route(['system.home'], 'collapsed') }}" href="{{ route('system.home') }}">
        <i class="fa-solid fa-chart-simple"></i>
        <span>Dashboard</span>
    </a>
</li><!-- End Dashboard Nav -->


  <li class="nav-item">
    <a class="nav-link {{ is_active_route(['system.inventory.addUnit', 'system.inventory.showroom', 'system.inventory.soldUnits'], 'collapsed') }}" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
        <i class="fa-solid fa-box-open"></i><span>Inventory</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="components-nav" class="nav-content collapse {{ is_active_route(['system.inventory.addUnit', 'system.inventory.showroom', 'system.inventory.soldUnits']) ? 'show' : '' }}" data-bs-parent="#sidebar-nav">
        <li>
            <a class="{{ is_active_route('system.inventory.addUnit') }}" href="{{ route('system.inventory.addUnit') }}">
                <i class="fa-regular fa-circle"></i><span>Add Unit</span>
            </a>
        </li>
        <li>
            <a class="{{ is_active_route('system.inventory.showroom') }}" href="{{ route('system.inventory.showroom') }}">
                <i class="fa-regular fa-circle"></i><span>Showroom</span>
            </a>
        </li>
        <li>
            <a class="{{ is_active_route('system.inventory.soldUnits') }}" href="{{ route('system.inventory.soldUnits') }}">
                <i class="fa-regular fa-circle"></i><span>Sold Units</span>
            </a>
        </li>
    </ul>
</li><!-- End Inventory Nav -->


  <li class="nav-item">
    <a class="nav-link  {{ is_active_route(['system.calendar'], 'collapsed') }}" href="{{ route('system.calendar') }}">
    <i class="fa-solid fa-calendar-days"></i>
      <span>Calendar</span>
    </a>
  </li><!-- End Calendar Nav -->

  <li class="nav-item">
    <a class="nav-link {{ is_active_route(['system.appointments.appointments'], 'collapsed') }}" href="{{ route('system.appointments.appointments') }}">
    <i class="fa-solid fa-calendar-check"></i>
      <span>Appointment</span>
    </a>
  </li><!-- End Appointment Nav -->

  <li class="nav-item">
    <a class="nav-link {{ is_active_route(['system.appointments.appointments'], 'collapsed') }}" href="{{ route('system.appointments.appointments') }}">
      <i class="fa-solid fa-file-circle-check"></i>
      <span>Reservation</span>
    </a>
  </li><!-- End Reservation Nav -->

  <li class="nav-item">
    <a class="nav-link {{ is_active_route(['system.financing.confirmation', 'system.financing.status'], 'collapsed') }}" data-bs-target="#financing-nav" data-bs-toggle="collapse" href="#">
    <i class="fa-solid fa-credit-card"></i><span>Financing</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="financing-nav" class="nav-content collapse {{ is_active_route(['system.financing.confirmation', 'system.financing.status']) ? 'show' : '' }}" data-bs-parent="#sidebar-nav">
      <li>
        <a  class="{{ is_active_route('system.financing.confirmation') }}" href="{{ route('system.financing.confirmation') }}">
          <i class="fa-regular fa-circle"></i><span>Confirmation</span>
        </a>
      </li>
      <li>
        <a class="{{ is_active_route('system.financing.status') }}" href="{{ route('system.financing.status') }}">
          <i class="fa-regular fa-circle"></i><span>Status</span>
        </a>
      </li>
    </ul>
  </li><!-- End Financing Nav -->

  <li class="nav-item">
    <a class="nav-link {{ is_active_route(['system.trade_in.requests', 'system.trade_in.status', 'system.trade_in.traded'], 'collapsed') }}" data-bs-target="#trade-in-nav" data-bs-toggle="collapse" href="#">
    <i class="fa-solid fa-handshake-simple"></i><span>Trade-in</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="trade-in-nav" class="nav-content collapse {{ is_active_route(['system.trade_in.requests', 'system.trade_in.status', 'system.trade_in.traded']) ? 'show' : '' }}" data-bs-parent="#sidebar-nav">
      <li>
        <a class="{{ is_active_route('system.trade_in.requests') }}" href="{{ route('system.trade_in.requests') }}">
          <i class="fa-regular fa-circle"></i><span>Trade Requests</span>
        </a>
      </li>
      <li>
        <a class="{{ is_active_route('system.trade_in.status') }}" href="{{ route('system.trade_in.status') }}">
          <i class="fa-regular fa-circle"></i><span>Trade-in Status</span>
        </a>
      </li>
      <li>
        <a class="{{ is_active_route('system.trade_in.traded') }}" href="{{ route('system.trade_in.traded') }}">
          <i class="fa-regular fa-circle"></i><span>Traded Units</span>
        </a>
      </li>
    </ul>
  </li><!-- End Trade-in Nav -->

  <li class="nav-item">
    <a class="nav-link {{ is_active_route(['system.receipts.acknowledgment', 'system.receipts.records'], 'collapsed') }}" data-bs-target="#receipts-nav" data-bs-toggle="collapse" href="#">
    <i class="fa-solid fa-file-pen"></i><span>Receipts</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="receipts-nav" class="nav-content collapse {{ is_active_route(['system.receipts.acknowledgment', 'system.receipts.records']) ? 'show' : '' }}" data-bs-parent="#sidebar-nav">
      <li>
        <a class="{{ is_active_route('system.receipts.acknowledgment') }}" href="{{ route('system.receipts.acknowledgment') }}">
          <i class="fa-regular fa-circle"></i><span>Acknowledgment Receipt</span>
        </a>
      </li>
      <li>
        <a class="{{ is_active_route('system.receipts.records') }}" href="{{ route('system.receipts.records') }}">
          <i class="fa-regular fa-circle"></i><span>Records</span>
        </a>
      </li>
    </ul>
  </li><!-- End Receipts Nav -->

  <li class="nav-item">
    <a class="nav-link {{ is_active_route(['system.walk_in.trades', 'system.walk_in.carwash', 'system.walk_in.detailing', 'system.walk_in.paintjob'], 'collapsed') }}" data-bs-target="#walkin-nav" data-bs-toggle="collapse" href="#">
    <i class="fa-solid fa-shoe-prints"></i><span>Walk-in</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="walkin-nav" class="nav-content collapse {{ is_active_route(['system.walk_in.trades', 'system.walk_in.carwash', 'system.walk_in.detailing', 'system.walk_in.paintjob']) ? 'show' : '' }}" data-bs-parent="#sidebar-nav">
      <li>
        <a class="{{ is_active_route('system.walk_in.trades') }}" href="{{ route('system.walk_in.trades') }}">
          <i class="fa-regular fa-circle"></i><span>Trade-in</span>
        </a>
      </li>
      <li>
        <a class="{{ is_active_route('system.walk_in.carwash') }}" href="{{ route('system.walk_in.carwash') }}">
          <i class="fa-regular fa-circle"></i><span>Car Wash</span>
        </a>
      </li>
      <li>
        <a class="{{ is_active_route('system.walk_in.detailing') }}" href="{{ route('system.walk_in.detailing') }}">
          <i class="fa-regular fa-circle"></i><span>Auto Detailing</span>
        </a>
      </li>
      <li>
      <a class="{{ is_active_route('system.walk_in.paintjob') }}" href="{{ route('system.walk_in.paintjob') }}">
          <i class="fa-regular fa-circle"></i><span>Paint Job</span>
        </a>
      </li>
    </ul>
  </li><!-- End Walk-in Nav -->


  <li class="nav-heading">Services</li>

  <li class="nav-item">
    <a class="nav-link {{ is_active_route(['system.carwash.confirmation', 'system.carwash.records'], 'collapsed') }}" data-bs-target="#car-wash-nav" data-bs-toggle="collapse" href="#">
      <i class="bi bi-droplet-fill"></i><span>Car Wash</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="car-wash-nav" class="nav-content collapse {{ is_active_route(['system.carwash.confirmation', 'system.carwash.records']) ? 'show' : '' }}" data-bs-parent="#sidebar-nav">
      <li>
      <a class="{{ is_active_route('system.carwash.confirmation') }}" href="{{ route('system.carwash.confirmation') }}">
          <i class="fa-regular fa-circle"></i><span>Confirmation</span>
        </a>
      </li>
      <li>
      <a class="{{ is_active_route('system.carwash.records') }}" href="{{ route('system.carwash.records') }}">
          <i class="fa-regular fa-circle"></i><span>Records</span>
        </a>
      </li>
    </ul>
  </li><!-- End Car Wash Nav -->

  <li class="nav-item">
    <a class="nav-link {{ is_active_route(['system.auto_detailing.confirmation', 'system.auto_detailing.payment', 'system.auto_detailing.records'], 'collapsed') }}" data-bs-target="#auto-detailing-nav" data-bs-toggle="collapse" href="#">
    <i class="fa-solid fa-screwdriver-wrench"></i><span>Auto Detailing</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="auto-detailing-nav" class="nav-content collapse {{ is_active_route(['system.auto_detailing.confirmation', 'system.auto_detailing.payment', 'system.auto_detailing.records']) ? 'show' : '' }}" data-bs-parent="#sidebar-nav">
      <li>
        <a class="{{ is_active_route('system.auto_detailing.confirmation') }}" href="{{ route('system.auto_detailing.confirmation') }}">
          <i class="fa-regular fa-circle"></i><span>Confirmation</span>
        </a>
      </li>
      <li>
        <a class="{{ is_active_route('system.auto_detailing.payment') }}" href="{{ route('system.auto_detailing.payment') }}">
          <i class="fa-regular fa-circle"></i><span>Payment</span>
        </a>
      </li>
      <li>
        <a class="{{ is_active_route('system.auto_detailing.records') }}" href="{{ route('system.auto_detailing.records') }}">
          <i class="fa-regular fa-circle"></i><span>Records</span>
        </a>
      </li>
    </ul>
  </li><!-- End Auto Detailing Nav -->

  <li class="nav-item">
    <a class="nav-link {{ is_active_route(['system.paintjob.confirmation', 'system.paintjob.payment', 'system.paintjob.records'], 'collapsed') }}" data-bs-target="#paint-job-nav" data-bs-toggle="collapse" href="#">
    <i class="fa-solid fa-spray-can"></i><span>Paint Job</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="paint-job-nav" class="nav-content collapse {{ is_active_route(['system.paintjob.confirmation', 'system.paintjob.payment', 'system.paintjob.records']) ? 'show' : '' }}" data-bs-parent="#sidebar-nav">
      <li>
        <a class="{{ is_active_route('system.paintjob.confirmation') }}" href="{{ route('system.paintjob.confirmation') }}">
          <i class="fa-regular fa-circle"></i><span>Confirmation</span>
        </a>
      </li>
      <li>
        <a class="{{ is_active_route('system.paintjob.payment') }}" href="{{ route('system.paintjob.payment') }}">
          <i class="fa-regular fa-circle"></i><span>Payment</span>
        </a>
      </li>
      <li>
        <a class="{{ is_active_route('system.paintjob.records') }}" href="{{ route('system.paintjob.records') }}">
          <i class="fa-regular fa-circle"></i><span>Records</span>
        </a>
      </li>
    </ul>
  </li><!-- End Paint Job Nav -->

</ul>

</aside><!-- End Sidebar-->