<x-mail-layout>
    <div class="container-fluid bg-secondary py-5 my-5 wow fadeInUp justify-content-center" data-wow-delay="0.1s">
        <div class="container ">

    <div class="card text-center btn-rounded">
        <div class="card-header">
          Message
        </div>
        <div class="card-body">
            <h5 class="card-title">{{ $tradeDetails['title'] }}</h5>
            <p class="card-text">{{ $tradeDetails['body'] }}</p>
    </div>
  </div>
</div>
</div>

</x-mail-layout>