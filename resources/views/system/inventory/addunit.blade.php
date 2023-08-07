
<x-system-layout>
<main id="main" class="main">
    <div class="row g-3" >
      <div class="pagetitle col-md-10">
        <h1>Add Unit</h1>
          <nav>
              <ol class="breadcrumb">
                <li class="breadcrumb-item">Home</li>
                <li class="breadcrumb-item">Inventory</li>
                <li class="breadcrumb-item active">Add Unit</li>
              </ol>
            </nav>
       </div>
      <!-- <div class=" col-md-2 justify-content-md-end">
        <a class="col-md-12 btn btn-warning" href="showroom-records.html" type="button">View Inventory<i class="bi bi-box-arrow-up-right"></i></a>
      </div> -->
  </div><!-- End Page Title -->

    <section class="section">

      <div class="col-12">

        <div class="card recent-sales overflow-auto rounded-4">
          <div class="card-body table-responsive">
            <h3 class="card-title text-center" style="font-size: 30px;">Unit Details</h3>

             <form class="row g-3" action="" method="POST">
              <div class="col-md-2">
                <div class="input-group">
                  <div class="input-group-text">UID:</div>
                  <input type="text" class="form-control" disabled>
                </div>
              </div>
              <div class="col-md-10">
              </div>
              
      <div class="col-md-3">
        <div class=" input-group">
          <div class="col-md-3 input-group-text justify-content-center">Year</div>
          <input type="text" class="form-control">
        </div>
      </div>
      <div class="col-md-3">
        <div class=" input-group">
          <div class="col-md-3 input-group-text justify-content-center">Make</div>
          <input type="text" class="form-control">
        </div>
      </div>
      <div class="col-md-3">
        <div class=" input-group">
          <div class="col-md-3 input-group-text justify-content-center">Model</div>
          <input type="text" class="form-control">
        </div>
      </div>
      <div class="col-md-3">
        <div class=" input-group">
          <div class="col-md-4 input-group-text justify-content-center">Variant</div>
          <input type="text" class="form-control">
        </div>
      </div>
      
      <div class="col-md-2">
        <div class=" input-group">
          <div class="col-md-6 input-group-text justify-content-center">Engine</div>
          <input type="text" class="form-control">
        </div>
      </div>
      <div class="col-md-3">
        <div class=" input-group">
          <div class="col-md-6 input-group-text justify-content-center">Transmission</div>
          <input type="text" class="form-control">
        </div>
      </div>
      <div class="col-md-3">
        <div class=" input-group">
            <div class="col-md-6 input-group-text justify-content-center">Fuel Type</div>
          <input type="text" class="form-control">
        </div>
      </div>
      <div class="col-md-2">
        <div class=" input-group">
            <div class="col-md-7 input-group-text justify-content-center">Odometer</div>
          <input type="text" class="form-control">
        </div>
      </div>
      <div class="col-md-2">
        <div class=" input-group">
            <div class="col-md-9 input-group-text justify-content-center">No. of Owners</div>
          <input type="text" class="form-control">
        </div>
      </div>
      
      <div class="col-md-4">
        <div class=" input-group">
          <div class="col-md-5 input-group-text justify-content-center">Interior Color</div>
          <input type="text" class="form-control">
        </div>
      </div>
      <div class="col-md-4">
        <div class=" input-group">
          <div class="col-md-5 input-group-text justify-content-center">Exterior Color</div>
          <input type="text" class="form-control">
        </div>
      </div>
      <div class="col-md-4">
        <div class=" input-group">
          <div class="col-md-4 input-group-text justify-content-center">Drive Train</div>
          <input type="text" class="form-control">
        </div>
      </div>
      <div class="col-md-3">
        <div class=" input-group">
            <div class="col-md-5 input-group-text justify-content-center">Body Type</div>
          <input type="text" class="form-control">
        </div>
      </div>
      <div class="col-md-3">
        <div class=" input-group">
          <label for="amount" class="input-group-text justify-content-center">Unit Price</label>
          <input id="amount" name="amount" type="text" maxlength="9" class="form-control" >
        </div>
      </div>
      <div class="col-md-3">
        <div class=" input-group">
          <div class="col-md-6 input-group-text justify-content-center">Plate Number</div>
          <input type="text" class="form-control">
        </div>
      </div>
      <div class="col-md-3 d-grid gap-2 d-md-flex justify-content-md-end">
        <input type="file" class="form-control" id="inputGroupFile02">
      </div>

      <div class="col-md-12">
        <label>Gallery:</label>
      </div>

      <div class="col-md-3">
        <label>Front-right</label>
        <input type="file" class="form-control" id="inputGroupFile02">
      </div>
      <div class="col-md-3">
        <label>Front-left</label>
        <input type="file" class="form-control" id="inputGroupFile02">
      </div>
      <div class="col-md-3">
        <label>Rear-right</label>
        <input type="file" class="form-control" id="inputGroupFile02">
      </div>
      <div class="col-md-3">
        <label>Rear-left</label>
        <input type="file" class="form-control" id="inputGroupFile02">
      </div>
      <div class="col-md-3">
        <label>Dashboard</label>
        <input type="file" class="form-control" id="inputGroupFile02">
      </div>
      <div class="col-md-3">
        <label>Front Seats</label>
        <input type="file" class="form-control" id="inputGroupFile02">
      </div>
      <div class="col-md-3">
        <label>Rear Seats</label>
        <input type="file" class="form-control" id="inputGroupFile02">
      </div>
      <div class="col-md-3">
        <label>Engine Bay</label>
        <input type="file" class="form-control" id="inputGroupFile02">
      </div>     
      <div class="col-md-3">
        <label>Tires</label>
        <input type="file" class="form-control" id="inputGroupFile02">
      </div>   


      <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">Description:</label>
        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
      </div>


        <!-- <div class="col-md-4 text-center">
          <label class="form-label ">&nbsp;</label>
        </div>
        <div class="col-md-4 text-center">
          <label class="form-label ">&nbsp;</label>
        </div> -->
        <div class="col-md-12 d-grid gap-2 d-md-flex justify-content-md-end">
          <button class="btn btn-danger me-md-2 rounded-5" type="button">CANCEL</button>
          <button class="btn btn-success me-md-2  rounded-5" type="button">SAVE</button>
        </div>
        
      </form>
                  </div>
                </div>
              </div>
            </div><!-- End Recent Sales -->
          </section>

        </main><!-- End #main -->

</x-system-layout>


        