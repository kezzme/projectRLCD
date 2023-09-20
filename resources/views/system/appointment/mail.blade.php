@component('mail::message')

Dear {{ (ucwords($appointVoidDetails['first_name'])) }} {{ (ucwords($appointVoidDetails['last_name'])) }},

We regret to inform you that your scheduled appointment for {{ (ucwords(\Carbon\Carbon::parse($appointVoidDetails['date'])->format('F d, Y'))) }} at {{ $appointVoidDetails['time'] }} has been canceled due to your absence.

Appointment Details:

Name: {{ (ucwords($appointVoidDetails['first_name'])) }} {{ (ucwords($appointVoidDetails['last_name'])) }} <br>
Year: {{ ($appointVoidDetails['car_year']) }} <br>
Make: {{ (ucwords($appointVoidDetails['car_make'])) }} <br>
Model: {{ (ucwords($appointVoidDetails['car_model'])) }} <br>
Variant: {{ (strtoupper($appointVoidDetails['car_variant'])) }} <br>
Price: ₱{{ number_format($appointVoidDetails['car_price'], 0, '.', ',') }} <br>
Date: {{ (ucwords(\Carbon\Carbon::parse($appointVoidDetails['date'])->format('F d, Y'))) }} <br>
Time: {{ $appointVoidDetails['time'] }} <br>

We understand that unforeseen circumstances may have prevented you from attending. We value your time and are eager to assist you in your car-buying journey.

At RL Car Dealer, your satisfaction is our priority, and we are committed to ensuring your experience with us is both convenient and enjoyable.

Thank you for choosing us, we look forward to serving you soon!
@endcomponent
