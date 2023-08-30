@component('mail::message')
{{  $appointDetails['title'] }}

Details: <br>
ID: {{$appointDetails['user_id']}} <br>
Name: {{$appointDetails['first_name']}} {{$appointDetails['last_name']}} <br>
Year: {{$appointDetails['car_year']}} <br>
Make: {{$appointDetails['car_make']}} <br>
Model: {{$appointDetails['car_model']}} <br>
Variant: {{$appointDetails['car_variant']}} <br>
Price: ₱{{ number_format($appointDetails['car_price'], 0, '.', ',') }} <br>
Expected Time: {{$appointDetails['time']}} <br>
Appointed Date: {{$appointDetails['date']}}

{{  $appointDetails['body'] }}
@endcomponent