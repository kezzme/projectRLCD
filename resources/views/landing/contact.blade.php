<x-landing-layout>

    @include('home.nav-bar')


 <!-- Page Header Start -->
 <div class="container-fluid page-header mb-5 p-0" style="background-image: url(img/carousel-bg-7.jpg);">
        <div class="container-fluid page-header-inner py-5">
            <div class="container text-center">
                <h1 class="display-3 text-white mb-3 animated slideInDown">Contact Us</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center text-uppercase">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Pages</a></li>
                        <li class="breadcrumb-item text-white active" aria-current="page">Contact</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- Contact Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="text-primary text-uppercase">// Contact Us //</h6>
                <h1 class="mb-5">Contact For Any Query</h1>
            </div>
            <div class="row g-4">
                <div class="col-12">
                    <div class="row gy-4">
                        <div class="col-md-4">
                            <div class="bg-light d-flex flex-column justify-content-center p-4">
                                <h5 class="text-uppercase">// Facebook //</h5>
                                <p class="m-0"><i class="bi bi-facebook text-primary me-2"></i>facebook.com/RLADACDC</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="bg-light d-flex flex-column justify-content-center p-4">
                                <h5 class="text-uppercase">// Phone Number //</h5>
                                <p class="m-0"><i class="bi bi-telephone-fill text-primary me-2"></i>0921-331-5545</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="bg-light d-flex flex-column justify-content-center p-4">
                                <h5 class="text-uppercase">// Telephone //</h5>
                                <p class="m-0"><i class="bi bi-telephone-fill text-primary me-2"></i>045-609-8355</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 wow fadeIn" data-wow-delay="0.1s">
                    <iframe class="position-relative rounded w-100 h-100"
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3845.4162158740205!2d120.59591877603317!3d15.46202838513293!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3396c79f113fa03b%3A0x93ae318851a06dd0!2sRL%20Auto%20Detailing%20%26%20Car%20Display%20Center!5e0!3m2!1sen!2sph!4v1668774245844!5m2!1sen!2sph" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"
                        frameborder="0" style="min-height: 350px; border:0;" allowfullscreen="" aria-hidden="false"
                        tabindex="0"></iframe>
                </div>

            </div>
        </div>
    </div>
    <!-- Contact End -->






    @include('home.footer')
</x-landing-layout>