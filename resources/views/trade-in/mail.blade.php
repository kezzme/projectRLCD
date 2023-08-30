@component('mail::message')
{{ $tradeDetails['title'] }}


ID: {{$appointDetails['user_id']}} <br>
Name: {{$appointDetails['first_name']}} {{$appointDetails['last_name']}} <br>

Your Unit: <br>
Year: {{$appointDetails['unit_year']}} <br>
Make: {{$appointDetails['unit_make']}} <br>
Model: {{$appointDetails['unit_model']}} <br>
Variant: {{$appointDetails['unit_variant']}} <br>
Plate No: {{$appointDetails['unit_plate_no']}} <br>
Price: ₱{{ number_format($appointDetails['unit_price'], 0, '.', ',') }} <br>

Your Request: <br>
Year: {{$appointDetails['car_year']}} <br>
Make: {{$appointDetails['car_make']}} <br>
Model: {{$appointDetails['car_model']}} <br>
Variant: {{$appointDetails['car_variant']}} <br>
Price: ₱{{ number_format($appointDetails['car_price'], 0, '.', ',') }} <br>

Expected Time: {{$appointDetails['time']}} <br>
Appointed Date: {{$appointDetails['date']}}

{{ $tradeDetails['body'] }}
@endcomponent