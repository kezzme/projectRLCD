<x-system-layout>

  <main id="main" class="main">
    <div class="cal-container">
      <div class="left">
        <div class="calendar">
          <div class="month">
            <i class="fas fa-angle-left prev"></i>
            <div class="date">december 2015</div>
            <i class="fas fa-angle-right next"></i>
          </div>
          <div class="weekdays">
            <div>Sun</div>
            <div>Mon</div>
            <div>Tue</div>
            <div>Wed</div>
            <div>Thu</div>
            <div>Fri</div>
            <div>Sat</div>
          </div>
          <div class="days"></div>
          <div class="goto-today">
            <div class="goto">
              <input type="text" placeholder="mm/yyyy" class="date-input" />
              <button class="goto-btn">Go</button>
            </div>
            <button class="today-btn">Today</button>
          </div>
        </div>
      </div>
      <div class="right">
        <div class="today-date">
          <div class="event-day">wed</div>
          <div class="event-date">12th december 2022</div>
        </div>
        <div class="events"></div>
        <div class="add-event-wrapper">
          <div class="add-event-header">
            <div class="title">Add Event</div>
            <i class="fas fa-times close"></i>
          </div>
          <div class="add-event-body">
            <div class="add-event-input">
              <input type="text" placeholder="Event" class="event-title" />
            </div>
            <div class="add-event-input">
              <input type="text" placeholder="Full Name" class="event-name" />
            </div>
            <div class="add-event-input">
              <input type="text" placeholder="Event Time" class="event-time" />
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>
  </x-system-layout>
  
  <script>
     const eventsArr = {!! json_encode($eventsArr) !!};
       console.log(eventsArr);
 </script>
  
  <script src="{{ asset('assets/js/calendar.js')}}"></script>

  
  
  
  