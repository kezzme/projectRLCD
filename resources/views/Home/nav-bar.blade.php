
    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg bg-white navbar-light shadow sticky-top p-0">
        <a href="index.html" class="navbar-brand d-flex align-items-center px-4 px-lg-5">
        <img src="{{ asset('img/logo.png')}}" class="navbar-brand d-flex">
            <h2 class="m-0 text-primary">RL Car Dealer</h2>
        </a>
        <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto p-4 p-lg-0">
                <a class="nav-item nav-link @if(Route::currentRouteName() == 'home') active @endif" href="{{ route('home') }}">Home</a>
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Services</a>
                    <div class="dropdown-menu fade-up m-0">
                        @auth
                        <a class="dropdown-item @if(Route::currentRouteName() == 'carwash') active @endif" href="{{ route('services.carwash') }}">Carwash</a>
                        <a class="dropdown-item @if(Route::currentRouteName() == 'auto-detailing') active @endif" href="{{ route('services.auto-detailing') }}">Auto Detailing</a>
                        <a class="dropdown-item @if(Route::currentRouteName() == 'paintjob') active @endif" href="{{ route('services.paintjob') }}">Paint Job</a>
                        @else
                        <a class="dropdown-item" data-bs-toggle="modal" href="#ServiceModalToggle">Carwash</a>
                        <a class="dropdown-item" data-bs-toggle="modal" href="#ServiceModalToggle">Auto Detailing</a>
                        <a class="dropdown-item" data-bs-toggle="modal" href="#ServiceModalToggle">Paint Job</a>
                        @endauth
                    </div>
                </div>
                
                <a class="nav-item nav-link @if(Route::currentRouteName() == 'vehicles') active @endif" href="{{ route('vehicles') }}">Vehicles</a>
                
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Pages</a>
                    <div class="dropdown-menu fade-up m-0">
                        <a class="dropdown-item @if(Route::currentRouteName() == 'new-arrival') active @endif" href="{{ route('new-arrival') }}" >New Arrival</a>
                        <a class="dropdown-item @if(Route::currentRouteName() == 'financing-calculator') active @endif" href="{{ route('financing-calculator') }}">Financing Calculator</a>
                        <a class="dropdown-item @if(Route::currentRouteName() == 'about') active @endif" href="{{ route('about') }}">About</a>
                       
                    </div>
                </div>
                <a class="nav-item nav-link @if(Route::currentRouteName() == 'contact') active @endif" href="{{ route('contact') }}">Contact</a>
            </div>


            @auth
            <div class="nav-item dropdown">
            <a class="btn btn-primary py-4 px-lg-5 d-none d-lg-block" data-bs-toggle="dropdown">Hi, {{auth()->user()->first_name}}</a>
            <div class="dropdown-menu fade-up w-100 ">
                    
                        <button class="dropdown-item @if(Route::currentRouteName() == 'booked') active @endif"><i class="fa-solid fa-bookmark"></i> Booked Services</button>
                        <button class="dropdown-item @if(Route::currentRouteName() == 'trade-in-request') active @endif"><i class="fa-solid fa-right-left"></i> Trade-in Request</button>
                        <button class="dropdown-item @if(Route::currentRouteName() == 'appointment') active @endif"><i class="fa-solid fa-calendar-check"></i> Appointment</button>
                        <form action="/logout" method="POST">
                            @csrf
                        <button class="dropdown-item @if(Route::currentRouteName() == 'logout') active @endif"><i class="fa-solid fa-right-from-bracket"></i> Logout</button>
                    </form>
                </div>  
            </div>
            @else 
            <!-- Form fields -->
                <a class="btn btn-primary py-4 px-lg-5 d-none d-lg-block" href="{{ route('login') }}">login<i class="fa fa-arrow-right ms-3"></i></a>
            @endauth
            
        </div>
    </nav>
    <!-- Navbar End -->
 {{-- Modal Start --}}
 <div class="modal fade" id="ServiceModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="exampleModalToggleLabel">Login Prompt</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
        To continue with <b>Services</b>, please Login.
        </div>
        <div class="modal-footer">
        <a class="btn btn-primary btn-rounded" type="button" href="{{ route('login')}}">Login</a>
        </div>
    </div>
    </div>
</div>

{{-- Modal End --}}
   