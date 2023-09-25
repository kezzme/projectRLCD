<x-system-layout>

<main id="main" class="main">
  <div class="row g-3" >
    <div class="pagetitle col-md-5">
          <h1>Traded Units</h1>
            <nav>
                <ol class="breadcrumb">
                  <li class="breadcrumb-item">Home</li>
                  <li class="breadcrumb-item">Trade-in</li>
                  <li class="breadcrumb-item active">Traded Units</li>
                </ol>
              </nav>
            </div>
              <div class="col-md-7">
                <div class="col-md-12 mb-3">
                  <div class="input-group search-bar">
                    <input type="text" class="form-control rounded-5" placeholder="Search...">
                    <div class="input-group-prepend">
                      <span class="input-group-text bg-transparent border-0" style="position: absolute; right: 0; top: 0; bottom: 0; padding: 0.375rem;">
                        <i class="fas fa-search"></i>
                      </span>
                    </div>
                  </div>
                </div>
             </div>
          </div><!-- End Page Title -->

    <section class="section">

      <div class="col-12">
        <div class="card recent-sales overflow-auto rounded-5">

          <div class="card-body table-responsive">
            <h5 class="card-title card-header">Client Records</h5>
            @if ($tradedUnits->isEmpty())
            <p>No Listings</p>
              @else
            <table id="dtHorizontalExample" class="table table-condensed table-hover" cellspacing="0" width="100%" >
              <thead class="table-success">
                <tr>
                  <th scope="col" class="align-middle">ID</th>
                  <th scope="col" class="align-middle">Name</th>
                  <th scope="col" class="align-middle">Phone</th>
                  <th scope="col" class="align-middle">Client's Request</th>
                  <th scope="col" class="align-middle">Plate No.</th>
                  <th scope="col" class="align-middle">Price</th>
                  <th scope="col" class="align-middle">Client's Offer</th>
                  <th scope="col" class="align-middle">Plate No.</th>
                  <th scope="col" class="align-middle">Price</th>
                  <th scope="col" class="align-middle">Date of Acquired</th>
                  <th scope="col" class="align-middle">Images</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($tradedUnits as $traded)
                  <tr>
                    <th scope="row"><a href="#">{{$traded->user_id}}</a></th>
                    <td>{{$traded->first_name}} {{$traded->last_name}}</td>
                    <td>{{$traded->contact}}</td>
                    <td>{{$traded->car_year}} {{$traded->car_make}} {{$traded->car_model}} {{$traded->car_variant}}</td>
                    <td>{{$traded->car_plate_no}}</td>
                    <td>₱{{ number_format($traded->car_price, 0, '.', ',') }}</td>
                    <td style="text-transform: capitalize">{{$traded->unit_year}} {{$traded->unit_make}} {{$traded->unit_model}} {{$traded->unit_variant}}</td>
                    <td style="text-transform: uppercase">{{$traded->unit_plate_no}}</td>
                    <td>₱{{ number_format($traded->unit_price, 0, '.', ',') }}</td>
                    <td>{{ strtoupper(\Carbon\Carbon::parse($traded->date)->format('F-d-Y')) }}</td>
                    <td class="text-center">@if ($traded->images && count($traded->images) > 0)
                      <button type="button" class="btn btn-primary show-images-btn" data-bs-toggle="modal" data-bs-target="#imagesModal" data-images="{{ json_encode($traded->images) }}">
                          <i class="fa-solid fa-image"></i>
                      </button>
                  @endif
                    </td>
                  </tr>
                  @endforeach
              </tbody>
            </table>
       
          </div>
          @endif
        </div>
      </div><!-- End Recent Sales -->
    </section>

  </main><!-- End #main -->


 {{-- Modal for view Images --}}
<div class="modal fade" id="imagesModal" tabindex="-1" role="dialog" aria-labelledby="imagesModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="imagesModalLabel">Trade Request Images</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div id="carouselTradeImages" class="carousel slide" data-bs-ride="carousel">
          <div class="carousel-inner">
            <!-- The images will be dynamically inserted here -->
          </div>
          <a class="carousel-control-prev" href="#carouselTradeImages" role="button" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselTradeImages" role="button" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </a>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

</x-system-layout>

<script>
   // Function to show the images modal with the provided image URLs
   function showImagesModal(images) {
      const modalBody = document.querySelector('.modal-body .carousel-inner');
      modalBody.innerHTML = ''; // Clear existing images

      images.forEach((imageURL, index) => {
          const imageElement = document.createElement('img');
          imageElement.className = 'd-block w-100';
          imageElement.src = imageURL;

          const carouselItem = document.createElement('div');
          carouselItem.className = index === 0 ? 'carousel-item active' : 'carousel-item';
          carouselItem.appendChild(imageElement);

          modalBody.appendChild(carouselItem);
      });

      // Show the modal
      $('#imagesModal').modal('show');
  }

  // Attach click event handler to the "Show Images" buttons
  $('.show-images-btn').on('click', function() {
      const imagesData = $(this).data('images');
      console.log(imagesData); // Log the imagesData to the console for debugging

      let images;
      if (typeof imagesData === 'string') {
        // If it's a string, parse it as JSON
        try {
          images = JSON.parse(imagesData);
        } catch (error) {
          console.error('Error parsing JSON:', error);
          images = []; // Set images as an empty array in case of error
        }
      } else if (Array.isArray(imagesData)) {
        // If it's already an array, use it directly
        images = imagesData;
      } else {
        images = []; // Set images as an empty array if it's neither a string nor an array
      }

      showImagesModal(images);
  });
</script>
