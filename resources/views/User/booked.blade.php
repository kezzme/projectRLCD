<x-landing-layout>
    @include('home.nav-bar')


    <!-- Service Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-4">
                <div class="card col-lg-12 wow fadeInUp card-rounded" data-wow-delay="0.1s">
                    <div class="card-body d-flex py-5 px-4">
                        <i class="fa fa-certificate fa-3x text-primary flex-shrink-0"></i>
                        <div class="ps-4">
                            <h5 class="mb-3">Quality Servicing</h5>
                            <p>Experience top-notch quality service in car services, where our dedicated team of skilled technicians provides prompt and courteous customer assistance, ensuring expert repairs and maintenance for unrivaled vehicle performance and utmost customer satisfaction.</p>
                        </div>
                        <div class="flex-grow-1 text-end">
                            <img src="{{asset('img/carousel-bg-14.jpg')}}" alt="Quality Servicing Image" class="img-fluid">
                        </div>
                    </div>
                </div>
                <div class="card col-lg-12 wow fadeInUp card-rounded" data-wow-delay="0.1s">
                    <div class="card-body d-flex py-5 px-4">
                        <i class="fa fa-certificate fa-3x text-primary flex-shrink-0"></i>
                        <div class="ps-4">
                            <h5 class="mb-3">Quality Servicing</h5>
                            <p>Experience top-notch quality service in car services, where our dedicated team of skilled technicians provides prompt and courteous customer assistance, ensuring expert repairs and maintenance for unrivaled vehicle performance and utmost customer satisfaction.</p>
                        </div>
                        <div class="flex-grow-1 text-end">
                            <img src="path_to_your_image" alt="Quality Servicing Image">
                        </div>
                    </div>
                </div>
                <div class="card col-lg-12 wow fadeInUp card-rounded" data-wow-delay="0.1s">
                    <div class="card-body d-flex py-5 px-4">
                        <i class="fa fa-certificate fa-3x text-primary flex-shrink-0"></i>
                        <div class="ps-4">
                            <h5 class="mb-3">Quality Servicing</h5>
                            <p>Experience top-notch quality service in car services, where our dedicated team of skilled technicians provides prompt and courteous customer assistance, ensuring expert repairs and maintenance for unrivaled vehicle performance and utmost customer satisfaction.</p>
                        </div>
                        <div class="flex-grow-1 text-end">
                            <img src="path_to_your_image" alt="Quality Servicing Image">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Service End -->

    {{$bookedCarWash->first_name}}
    {{$bookedCarWash->last_name}}
    {{$bookedCarWash->car_make}}
    {{$bookedCarWash->car_model}}

    @include('home.footer')
</x-landing-layout>
