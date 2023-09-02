<x-system-layout>

<main id="main" class="main">

    <div class="pagetitle">
     
      <h1>Trade-in Status</h1>
      
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Trade-in</li>
          <li class="breadcrumb-item active">Status</li>
        </ol>
      </nav>
      
    </div><!-- End Page Title -->

    

    <section class="section">
      <div class="col-12">
        <div class="card recent-sales overflow-auto rounded-5">

          <div class="card-body table-responsive">
            <h5 class="card-title">Client List</h5>
            @if ($tiStatuses->isEmpty())
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
                      <th scope="col" class="align-middle">Appointed Date</th>
                      <th scope="col" class="align-middle">Expected Time</th>
                      <th scope="col" class="align-middle">Images</th>
                      <th colspan="2" style="text-align: center;" class="align-middle">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($tiStatuses as $status)
                    <tr>
                      <th scope="row"><a href="#">{{$status->user_id}}</a></th>
                      <td>{{$status->first_name}} {{$status->last_name}}</td>
                      <td>{{$status->contact}}</td>
                      <td>{{$status->car_year}} {{$status->car_make}} {{$status->car_model}} {{$status->car_variant}}</td>
                      <td>{{$status->car_plate_no}}</td>
                      <td>₱{{ number_format($status->car_price, 0, '.', ',') }}</td>
                      <td style="text-transform: capitalize">{{$status->unit_year}} {{$status->unit_make}} {{$status->unit_model}} {{$status->unit_variant}}</td>
                      <td style="text-transform: uppercase">{{$status->unit_plate_no}}</td>
                      <td>₱{{ number_format($status->unit_price, 0, '.', ',') }}</td>
                      <td>{{ strtoupper(\Carbon\Carbon::parse($status->date)->format('F-d-Y')) }}</td>
                      <td>{{$status->time}}</td>
                      <td class="text-center">@if ($status->images && count($status->images) > 0)
                        <button type="button" class="btn btn-primary show-images-btn" data-bs-toggle="modal" data-bs-target="#imagesModal" data-images="{{ json_encode($status->images) }}">
                            <i class="fa-solid fa-image"></i>
                        </button>
                    @endif
                      </td>
                      <td><button type="button" class="btn btn-danger" onclick="showConfirmationModal('Reject', {{$status->id}})"><i class="fa-solid fa-user-xmark"></i></button></td>
                        <td><button type="button" class="btn btn-success" onclick="showConfirmationModal('Approve', {{$status->id}})"><i class="fa-solid fa-file-circle-plus"></i></button>
                        <form id="confirmForm_{{$status->id}}" action="" method="POST" style="display: none;">
                            @csrf
                            @method('POST')
                        </form>
                      </td>
                    </tr>
                    @endforeach
                </tbody>
              </table>
              <div class="d-flex justify-content-center">
                {{ $tiStatuses->links() }}
              </div>
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

<!-- Modal for Confirmation -->
<div class="modal fade" id="confirmationModal" tabindex="-1" role="dialog" aria-labelledby="confirmationModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="confirmationModalLabel">Confirmation</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Are you sure you want to <span class="font-weight-bold" id="actionType"></span> this trade?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="confirmAction">Confirm</button>
      </div>
    </div>
  </div>
</div>

@if(session('success'))
<div class="position-fixed bottom-0 end-0 w-40 mx-3 mb-3">
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <i class="fa-solid fa-circle-check"></i> {{ session('success') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
    </div>
</div>
@endif

</x-system-layout>


<script>
     function showConfirmationModal(action, id) {
      // Get the form element
      const form = document.getElementById(`confirmForm_${id}`);
  
      // Set the action type in the confirmation modal
      document.getElementById('actionType').innerText = action;
  
      // Update the form action based on the selected action
      const formAction = action === 'Approve'
          ? "{{ route('system.trade_in.totiReceipt', ['id' => ':id']) }}".replace(':id', id)
          : "{{ route('system.trade_in.phase2', ['id' => ':id']) }}".replace(':id', id);
      form.action = formAction;
  
      // Show the confirmation modal
      $('#confirmationModal').modal('show');
  
      // Set up a click event listener on the "Confirm" button in the modal
      $('#confirmAction').off('click').on('click', function () {
          // Submit the form
          form.submit();
  
          // Close the modal
          $('#confirmationModal').modal('hide');
      });
  }

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

  $(document).ready(function() {
      setTimeout(function() {
          $(".alert").alert('close');
      }, 3000);
  });
</script>