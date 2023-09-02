@component('mail::message')
{{ $tradeDetails['title'] }}


ID: {{$tradeDetails['user_id']}} <br>
Name: {{$tradeDetails['first_name']}} {{$tradeDetails['last_name']}} <br>

Your Unit: <br>
Year: {{$tradeDetails['unit_year']}} <br>
Make: {{$tradeDetails['unit_make']}} <br>
Model: {{$tradeDetails['unit_model']}} <br>
Variant: {{$tradeDetails['unit_variant']}} <br>
Plate No: {{$tradeDetails['unit_plate_no']}} <br>
Price: ₱{{ number_format($tradeDetails['unit_price'], 0, '.', ',') }} <br>

Your Request: <br>
Year: {{$tradeDetails['car_year']}} <br>
Make: {{$tradeDetails['car_make']}} <br>
Model: {{$tradeDetails['car_model']}} <br>
Variant: {{$tradeDetails['car_variant']}} <br>
Price: ₱{{ number_format($tradeDetails['car_price'], 0, '.', ',') }} <br>

Expected Time: {{$tradeDetails['time']}} <br>
Appointed Date: {{$tradeDetails['date']}}

{{ $tradeDetails['body'] }}
@endcomponent