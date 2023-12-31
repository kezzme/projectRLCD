@component('mail::message')
{{ $details['title'] }}

ID: {{ $details['user_id'] }} <br>
Name: {{ ucfirst(strtolower($details['first_name'])) }} {{ ucfirst(strtolower($details['last_name'])) }} <br>
Make: {{ ucfirst(strtolower($details['car_make'])) }} <br>
Model: {{ ucfirst(strtolower($details['car_model'])) }} <br>
Plate No: {{ strtoupper($details['unit_plate_no']) }} <br>
Body Type: {{ $details['body_type'] }} <br>
Amount: ₱{{ $details['amount'] }} <br>
Special Request: @if ($details['special_request'])
{{ $details['special_request'] }} <br>
@else
No Special Request <br>
@endif
Time: {{ $details['time'] }} <br>
Date: {{ $details['date'] }} <br>

{{ $details['body'] }}
@endcomponent
