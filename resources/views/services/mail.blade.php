@component('mail::message')
{{ $details['title'] }}

ID: {{ $details['user_id'] }} <br>
Name: {{ $details['first_name'] }} {{ $details['last_name'] }} <br>
Make: {{ $details['car_make'] }} <br>
Model: {{ $details['car_model'] }} <br>
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
